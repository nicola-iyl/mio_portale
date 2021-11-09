<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       //funzione custom per formattare il prezzo
       Blade::directive('money', function ($amount)
       {
          return "<?php echo '€ ' . number_format($amount, 2,',','.'); ?>";
       });

       Schema::defaultStringLength(191);

       $macrocategories = Category::whereNull('category_id')->get();
       view()->share('macrocategories',$macrocategories);
    }
}
