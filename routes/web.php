<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FromFieldController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\fronend\FrontendController;
use App\Http\Controllers\fronend\SubmissionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//frontend
Route::namespace('frontend')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/getCategories/{organization_id}', [FrontendController::class, 'categories'])->name('getCategories');
    Route::get('/getTemplate/{category_id}', [FrontendController::class, 'getTemplate'])->name('getTemplate');
    Route::get('/getField/{template_id}', [FrontendController::class, 'getField'])->name('getField');
    //submission
    Route::get('/submission/list', [SubmissionController::class, 'index'])->name('submission.list');
    Route::post('/submission/create/store', [SubmissionController::class, 'store'])->name('submission.store');
    // Route::get('/submission/edit/{id}', [SubmissionController::class, 'edit'])->name('submission.edit');
    // Route::put('/submission/update/{id}', [SubmissionController::class, 'update'])->name('submission.update');
    Route::get('/submission/delete/{id}', [SubmissionController::class, 'destroy'])->name('submission.delete');
});
// admin route
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    //admin dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard']);
    //organization
     Route::get('/organization/list', [OrganizationController::class, 'index'])->name('organization.list');
     Route::get('/organization/create', [OrganizationController::class, 'create'])->name('organization.create');
     Route::post('/organization/create/store', [OrganizationController::class, 'store'])->name('organization.store');
     Route::get('/organization/edit/{id}', [OrganizationController::class, 'edit'])->name('organization.edit');
     Route::put('/organization/update/{id}', [OrganizationController::class, 'update'])->name('organization.update');
     Route::get('/organization/delete/{id}', [OrganizationController::class, 'destroy'])->name('organization.delete');
    //category
     Route::get('/category/list', [CategoryController::class, 'index'])->name('category.list');
     Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
     Route::post('/category/create/store', [CategoryController::class, 'store'])->name('category.store');
     Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
     Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
     Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    //form tamp
     Route::get('/template/list', [TemplateController::class, 'index'])->name('template.list');
     Route::get('/template/create', [TemplateController::class, 'create'])->name('template.create');
     Route::post('/template/create/store', [TemplateController::class, 'store'])->name('template.store');
     Route::get('/template/edit/{id}', [TemplateController::class, 'edit'])->name('template.edit');
     Route::put('/template/update/{id}', [TemplateController::class, 'update'])->name('template.update');
     Route::get('/template/delete/{id}', [TemplateController::class, 'destroy'])->name('template.delete');
    //form field
     Route::get('/field/list', [FromFieldController::class, 'index'])->name('field.list');
     Route::get('/field/create', [FromFieldController::class, 'create'])->name('field.create');
     Route::post('/field/create/store', [FromFieldController::class, 'store'])->name('field.store');
     Route::get('/field/edit/{id}', [FromFieldController::class, 'edit'])->name('field.edit');
     Route::put('/field/update/{id}', [FromFieldController::class, 'update'])->name('field.update');
     Route::get('/field/delete/{id}', [FromFieldController::class, 'destroy'])->name('field.delete');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
