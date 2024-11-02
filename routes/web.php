<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AcceptController;
use App\Http\Controllers\RejectController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FundingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SelectedController;

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



//profile:-
Route::resource('profile', ProfileController::class);

   
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
   
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');
    //ideas:-
   

    //form
 //form:-
 Route::get('/form', [FormController::class, 'create'])->name('user.pages.form');
 Route::post('/form', [FormController::class, 'store'])->name('user.pages.store');

//status
Route::get('/ideas/status', [StatusController::class, 'showStatusForm'])->name('user.pages.status');
Route::post('/ideas/check-status', [StatusController::class, 'checkStatus'])->name('user.pages.checkStatus');
//fund

// صفحة تمويل الفكرة
Route::get('/fund-idea', [FundingController::class, 'index'])->name('user.pages.fund_idea');
Route::get('/funding/paypal/{id}', [FundingController::class, 'fundingPayPal'])->name('user.pages.funding_paypal');
Route::post('/reserve-idea/{id}', [FundingController::class, 'reserveIdea'])->name('reserve.idea');
Route::get('/user/{description}', [FundingController::class, 'show_user'])->name('user.pages.funding_pay_paypal');


});
   
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/home', [HomeController::class, 'dashboard'])->name('admin.home');
    //records:-
    Route::get('/ideas_records', [RecordController::class, 'idea'])->name('admin.record.idea');
    Route::get('/accepts_records', [RecordController::class, 'accept'])->name('admin.record.accept');
    Route::get('/rejects_records', [RecordController::class, 'select'])->name('admin.record.select');
    Route::get('/selects_records', [RecordController::class, 'reject'])->name('admin.record.reject');
    //idaes side:-
    
Route::get('/ideas', [IdeaController::class, 'index'])->name('admin.idea.index');
Route::get('/ideas/create', [IdeaController::class, 'create'])->name('admin.idea.create');
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('admin.idea.show');
Route::post('/ideas', [IdeaController::class, 'store'])->name('admin.idea.store');
Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('admin.idea.edit');
Route::put('/admin/idea/{id}', [IdeaController::class, 'update'])->name('admin.idea.update');
Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('admin.idea.destroy');

    // accept:-
    
    Route::get('/accepts', [AcceptController::class, 'index'])->name('admin.accept.index');
    Route::get('/accepts/create', [AcceptController::class, 'create'])->name('admin.accept.create');
    Route::get('/accepts/{accept}', [AcceptController::class, 'show'])->name('admin.accept.show');
    Route::post('/accepts', [AcceptController::class, 'store'])->name('admin.accept.store');
    Route::get('/accepts/{accept}/edit', [AcceptController::class, 'edit'])->name('admin.accept.edit');
    Route::put('/accepts/{accept}', [AcceptController::class, 'update'])->name('admin.accept.update');
    Route::delete('/accepts/{accept}', [AcceptController::class, 'destroy'])->name('admin.accept.destroy');

        //reject:-
    
        Route::get('/rejects', [RejectController::class, 'index'])->name('admin.reject.index');
        Route::get('/rejects/create', [RejectController::class, 'create'])->name('admin.reject.create');
        Route::get('/rejects/{reject}', [RejectController::class, 'show'])->name('admin.reject.show');
        Route::post('/rejects', [RejectController::class, 'store'])->name('admin.reject.store');
        Route::get('/rejects/{reject}/edit', [RejectController::class, 'edit'])->name('admin.reject.edit');
        Route::put('/rejects/{reject}', [RejectController::class, 'update'])->name('admin.reject.update');
        Route::delete('/rejects/{reject}', [RejectController::class, 'destroy'])->name('admin.reject.destroy');
        //selected
        Route::get('/select', [SelectedController::class, 'index'])->name('admin.select.index');
        Route::delete('/select/{select}', [SelectedController::class, 'destroy'])->name('admin.select.destroy');
        Route::get('/select/{select}', [SelectedController::class, 'show'])->name('admin.select.show');
});
 
   
//Admin Routes List
Route::middleware(['auth', 'user-access:manager'])->group(function () {
   
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manage.home');
});