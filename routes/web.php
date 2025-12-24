<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AdminFaqCategoryController;
use App\Http\Controllers\AdminFaqItemController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;


Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// Views rutes voor niet ingelogde users zichtbaarheid en voor user's updates (avatar/profielfoto)
// Publiek profiel
Route::get('/users/{user}', [UserProfileController::class, 'show'])->name('profile.show');

// Eigen profiel bewerken
Route::get('/profile/edit-extra', [UserProfileController::class, 'edit'])
    ->middleware('auth')
    ->name('profile.edit.extra');

// Opslaan
Route::post('/profile/update-extra', [UserProfileController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update.extra');

require __DIR__.'/auth.php';

// Toon de news views
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

// CRUD routes voor admins-news
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/news', [NewsController::class, 'adminIndex'])->name('admin.news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::post('/news/{news}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::post('/news/{news}/delete', [NewsController::class, 'destroy'])->name('admin.news.destroy');
});

// Route naar FAQS view
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// Routes voor admins om met de FAQ's page te kunnen interageren
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // Categorieën
    Route::get('/faq/categories', [AdminFaqCategoryController::class, 'index'])->name('admin.faq.categories.index');
    Route::get('/faq/categories/create', [AdminFaqCategoryController::class, 'create'])->name('admin.faq.categories.create');
    Route::post('/faq/categories', [AdminFaqCategoryController::class, 'store'])->name('admin.faq.categories.store');
    Route::get('/faq/categories/{category}/edit', [AdminFaqCategoryController::class, 'edit'])->name('admin.faq.categories.edit');
    Route::post('/faq/categories/{category}', [AdminFaqCategoryController::class, 'update'])->name('admin.faq.categories.update');
    Route::post('/faq/categories/{category}/delete', [AdminFaqCategoryController::class, 'destroy'])->name('admin.faq.categories.destroy');

    // FAQ items
    Route::get('/faq/items', [AdminFaqItemController::class, 'index'])->name('admin.faq.items.index');
    Route::get('/faq/items/create', [AdminFaqItemController::class, 'create'])->name('admin.faq.items.create');
    Route::post('/faq/items', [AdminFaqItemController::class, 'store'])->name('admin.faq.items.store');
    Route::get('/faq/items/{item}/edit', [AdminFaqItemController::class, 'edit'])->name('admin.faq.items.edit');
    Route::post('/faq/items/{item}', [AdminFaqItemController::class, 'update'])->name('admin.faq.items.update');
    Route::post('/faq/items/{item}/delete', [AdminFaqItemController::class, 'destroy'])->name('admin.faq.items.destroy');
});

//Route voor ContactAdmin views
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Publiek view: producten bekijken
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

// Seller/Admin view: producten aanmaken
Route::middleware(['auth', 'seller'])->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('products.store');
});

//Bestellingen plaatsen
Route::middleware(['auth'])->group(function () {
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('orders.my');
});

// Seller/Admin kunnen verkopen bekijken
Route::middleware(['auth', 'seller'])->group(function () {
    Route::get('/my-sales', [OrderController::class, 'mySales'])->name('orders.sales');
});
