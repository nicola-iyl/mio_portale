<?php

use Illuminate\Support\Facades\Route;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Web\TagsController;
use App\Http\Controllers\Web\ScriptController;
use App\Http\Controllers\Web\LinkController;
use App\Http\Controllers\Web\VideoController;
use App\Http\Controllers\Web\CustomerController;
use App\Http\Controllers\Web\WorkController;
use App\Http\Controllers\Web\InvoiceController;
use App\Http\Controllers\Web\InvoiceItemController;
use App\Http\Controllers\Web\WorkHourController;
use App\Http\Controllers\Web\SyncController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.exec');
Route::get('logs', [LogViewerController::class, 'index'])->name('logs');

// SOLO AUTENTICATI
Route::group(['middleware' => ['auth']], function () {
   Route::get('/logout',  [AuthController::class, 'logout'])->name('logout');
   Route::get('/', [HomeController::class,'index'])->name('home');
   Route::get('/categories',[CategoryController::class,'index'])->name('categories');
   Route::get('/category/{id}',[CategoryController::class,'show'])->name('category');
   Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
   Route::post('category',[CategoryController::class,'store'])->name('category.store');
   Route::get('/posts',[PostController::class,'index'])->name('posts');
   Route::get('/post/create',[PostController::class,'create'])->name('post.create');
   Route::get('/post/delete/{id}',[PostController::class,'delete'])->name('post.delete');
   Route::get('/post/edit/{id}',[PostController::class,'edit'])->name('post.edit');
   Route::get('/post/{id}',[PostController::class,'show'])->name('post');
   Route::post('/post',[PostController::class,'store'])->name('post.store');
   Route::post('/post/update/{id}',[PostController::class,'update'])->name('post.update');
   Route::get('/tags',[TagsController::class,'index'])->name('tags');
   Route::get('/tags/create',[TagsController::class,'create'])->name('tags.create');
   Route::get('/tags/delete/{id}',[TagsController::class,'delete'])->name('tags.delete');
   Route::post('/tags',[TagsController::class,'store'])->name('tags.store');
   Route::get('/script/create/{post_id}',[ScriptController::class,'create'])->name('script.create');
   Route::post('/script',[ScriptController::class, 'store'])->name('script.store');
   Route::get('/script/delete/{id}',[ScriptController::class,'delete'])->name('script.delete');
   Route::get('/video/create/{post_id}',[VideoController::class,'create'])->name('video.create');
   Route::post('video',[VideoController::class, 'store'])->name('video.store');
   Route::get('/video/delete/{id}',[VideoController::class,'delete'])->name('video.delete');
   Route::get('/link/create/{post_id}',[LinkController::class,'create'])->name('link.create');
   Route::post('/link',[LinkController::class, 'store'])->name('link.store');
   Route::get('/link/delete/{id}',[LinkController::class,'delete'])->name('link.delete');
   Route::get('/customers',[CustomerController::class,'index'])->name('customers');
   Route::get('/customer/create',[CustomerController::class,'create'])->name('customer.create');
   Route::get('/customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');
   Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
   Route::get('/customer/{id}',[CustomerController::class,'show'])->name('customer');
   Route::post('/customer',[CustomerController::class,'store'])->name('customer.store');
   Route::post('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');
   Route::get('/works',[WorkController::class,'index'])->name('works');
   Route::get('/work/pdf_ore/{id}',[WorkController::class,'pdfOre'])->name('work.pdf_ore');
   Route::get('/work/create',[WorkController::class,'create'])->name('work.create');
   Route::get('/work/change_status/{work_id}/{value}',[WorkController::class,'changeStatus'])->name('work.change_status');
   Route::get('/work/delete/{id}',[WorkController::class,'delete'])->name('work.delete');
   Route::get('/work/edit/{id}',[WorkController::class,'edit'])->name('work.edit');
   Route::get('/work/{id}',[WorkController::class,'show'])->name('work');
   Route::post('/work',[WorkController::class,'store'])->name('work.store');
   Route::post('/work/update/{id}',[WorkController::class,'update'])->name('work.update');
   Route::get('/work_hours',[WorkHourController::class,'index'])->name('work_hours');
   Route::get('/work_hour/create/{work_id}',[WorkHourController::class,'create'])->name('work_hour.create');
   Route::get('/work_hour/delete/{id}',[WorkHourController::class,'delete'])->name('work_hour.delete');
   Route::get('/work_hour/edit/{id}',[WorkHourController::class,'edit'])->name('work_hour.edit');
   Route::get('/work_hour/{id}',[WorkHourController::class,'show'])->name('work_hour');
   Route::post('/work_hour',[WorkHourController::class,'store'])->name('work_hour.store');
   Route::post('/work_hour/update/{id}',[WorkHourController::class,'update'])->name('work_hour.update');
   Route::get('/invoices',[InvoiceController::class,'index'])->name('invoices');
   Route::get('/invoices/all',[InvoiceController::class,'all'])->name('invoices.all');
   Route::get('/invoice/create',[InvoiceController::class,'create'])->name('invoice.create');
   Route::get('/invoice/delete/{id}',[InvoiceController::class,'delete'])->name('invoice.delete');
   Route::get('/invoice/edit/{id}',[InvoiceController::class,'edit'])->name('invoice.edit');
   Route::get('/invoice/{id}',[InvoiceController::class,'show'])->name('invoice');
   Route::post('/invoice',[InvoiceController::class,'store'])->name('invoice.store');
   Route::get('/invoice/pdf/{id}',[InvoiceController::class,'pdf'])->name('invoice.pdf');
   Route::post('/invoice/update/{id}',[InvoiceController::class,'update'])->name('invoice.update');
   Route::get('/invoice_items',[InvoiceItemController::class,'index'])->name('invoice_items');
   Route::get('/invoice_item/create',[InvoiceItemController::class,'create'])->name('invoice_item.create');
   Route::get('/invoice_item/delete/{id}',[InvoiceItemController::class,'delete'])->name('invoice_item.delete');
   Route::post('/invoice_item/add',[InvoiceItemController::class,'additem'])->name('invoice_item.add');
   Route::get('/invoice_item/add_item',[InvoiceItemController::class,'showFormAddItem'])->name('invoice_item.add_item');

   Route::get('/invoice_item/edit/{id}',[InvoiceItemController::class,'edit'])->name('invoice_item.edit');
   Route::get('/invoice_item/{id}',[InvoiceItemController::class,'show'])->name('invoice_item');
   Route::post('/invoice_item',[InvoiceItemController::class,'store'])->name('invoice_item.store');
   Route::post('/invoice_item/update/{id}',[InvoiceItemController::class,'update'])->name('invoice_item.update');
   Route::get('/sync/sync_works', [SyncController::class,'syncWorks'])->name('sync.works');
   Route::get('/sync/sync_work_hours', [SyncController::class,'syncWorkHours'])->name('sync.work_hours');
   Route::get('/sync/sync_invoices', [SyncController::class,'syncInvoices'])->name('sync.invoices');
   Route::get('/sync/sync_invoice_items', [SyncController::class,'syncInvoiceItems'])->name('sync.invoice_items');
   Route::get('/sync/sync_customers', [SyncController::class,'syncCustomers'])->name('sync.customers');
});



