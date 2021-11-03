<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
   protected $maxAttempts = 5; // massimi tentativi di login
   protected $decayMinutes = 5; // lasso di tempo dopo il blocco

   public function login(Request $request): RedirectResponse
   {
      //faccio la validazione dei dati in arrivo
      $request->validate(['email' => 'required|string','password' => 'required|string']);

      //se checkato laravel creerà un token nel campo remember_token della tabella users_cms per mantenere l'utente sempre loggato
      $remember = $request->get('remember',false);

      //prendo le credenziali che arrivano dal form
      $credentials = $request->only('email', 'password');

      //controllo che non abbia effettuato troppi tentativi di login
      if($this->hasTooManyLoginAttempts($request))
      {
         $this->fireLockoutEvent($request);
         $seconds = $this->limiter()->availableIn($this->throttleKey($request));

         throw ValidationException::withMessages(['password' => [trans('auth.throttle', ['seconds' => $seconds])] ])->status(Response::HTTP_TOO_MANY_REQUESTS);
      }

      //chiamo il metodo per verificare le credenziali ed effettuare LOGIN
      if (Auth::guard()->attempt($credentials, $remember))
      {
         $request->session()->regenerate();
         //pulisco i tentativi di accesso
         $this->limiter()->clear($this->throttleKey($request));

         //se credenziali giuste vado alla route di atterraggio
         return redirect()->route('home');
      }

      //incremento i tentativi di access
      $this->incrementLoginAttempts($request);

      //torno alla pagina di login con il messaggio di errore
      return back()->withErrors(['password' => trans('auth.failed')]);
   }

   public function showLoginForm()
   {
      $params = [];
      return view('auth.login', $params);
   }

   public function logout(Request $request): RedirectResponse
   {
      Auth::guard()->logout();

      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect()->route('login');
   }

   //controlla se ha effettuato troppi tentativi di login
   protected function hasTooManyLoginAttempts(Request $request): bool
   {
      return $this->limiter()->tooManyAttempts($this->throttleKey($request), $this->maxAttempts);
   }

   protected function limiter()
   {
      return app(RateLimiter::class);
   }

   protected function throttleKey(Request $request): string
   {
      return Str::lower($request->input('email')).'|'.$request->ip();
   }

   protected function fireLockoutEvent(Request $request)
   {
      event(new Lockout($request));
   }

   //incrementa il numero di tentativi di login effettuati
   protected function incrementLoginAttempts(Request $request)
   {
      $this->limiter()->hit($this->throttleKey($request), $this->decayMinutes * 60);
   }
}
