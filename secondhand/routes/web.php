<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashBoardController;
use App\Http\Controllers\Admin\DashBoardAdm;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProductControllerUs;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CooperationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\YourOrderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ReviewConttroller;
use App\Http\Controllers\Admin\UserControllerAdm;
use App\Http\Controllers\User\CartControllerUs;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Đây là nơi bạn có thể đăng ký các route web cho ứng dụng của mình.
| Các route này được tải bởi RouteServiceProvider và tất cả chúng sẽ
| được gán vào nhóm middleware "web". Hãy tạo điều gì đó tuyệt vời!
|
*/

Route::get('/', [DashBoardController::class, 'home'])->name('User.home');
Route::post('/', [UserController::class, 'register'])->name('register');

/*login*/
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin']);

/*register*/
Route::get('/register', [UserController::class, 'register'])->name('User.register');
Route::post('/register', [UserController::class, 'postRegister']);

/*logout*/
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

/*search*/
Route::get('/search', [ProductControllerUs::class, 'search']);
Route::post('/search', [ProductControllerUs::class, 'search'])->name('search');
Route::post('/searchajax', [ProductControllerUs::class, 'suggestions']);


/*forget pass */
Route::get('/forgot_pass', [ForgotPasswordController::class, 'forgotpass'])->name('password.request');
Route::post('/forgot_pass', [ForgotPasswordController::class, 'checkforgotpass']);
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');




Route::prefix('user')->group(function () {
Route::get('/blog', [DashBoardController::class, 'blog'])->name('User.blog');
Route::get('/product', [ProductControllerUs::class, 'product'])->name('User.product');
Route::get('/products/{categoryId?}',  [ProductControllerUs::class, 'product'])->name('product');


Route::middleware('auth')->group(function () {
  /*contact*/
Route::get('/contact', [DashBoardController::class, 'contact'])->name('User.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*cart*/
Route::get('/cart', [CartControllerUs::class, 'index'])->name('cart.index');
Route::post('/cart', [CartControllerUs::class, 'store'])->name('cart.store');
Route::delete('/cart-delete/{id}', [CartControllerUs::class, 'delete'])->name('cart.delete');
Route::patch('/cart-update/{id}', [CartControllerUs::class, 'update'])->name('cart.update');

/*checkout*/
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

/*detail prd*/
Route::get('/detail/{title}', [DashBoardController::class, 'detail'])->name('User.detail');

/*review prd*/
Route::post('/detail/{title}', [ReviewController::class, 'store'])->name('reviewprd.store');
});








});
Route::prefix('admin')->group(function(){
  Route::middleware('role')->group(function () {

/*user*/
Route::resource('user', UserControllerAdm::class);
Route::post('/usersearch', [UserControllerAdm::class, 'search'])->name('usersearch');
Route::post('/usersearchajax', [UserControllerAdm::class, 'suggestions'])->name('usersearchajax');

/*contact*/
  Route::resource('contact', ContactController::class);

/*category*/
  Route::resource('category', CategoryController::class);
  Route::get('/addCategories', [CategoryController::class, 'addCategories'])->name('Admin.Addcategories');
  Route::post('/catesearch', [CategoryController::class, 'search'])->name('catesearch');
  Route::post('/catesearchajax', [CategoryController::class, 'suggestions'])->name('catesearchajax');

  /*product*/
  Route::resource('product', ProductController::class);
  Route::post('/prdsearch', [ProductController::class, 'search'])->name('prdsearch');
  Route::post('/prdsearchajax', [ProductController::class, 'suggestions'])->name('prdsearchajax');

  /*order*/

  Route::post('/update-order-status/{orderId}', [OrderController::class, 'updateOrderStatus'])
  ->name('update.orderStatus');
  Route::delete('/admin/orders/{order}',  [OrderController::class, 'deleteOrder'])->name('admin.orders.delete');
  Route::post('/ordersearch', [OrderController::class, 'search'])->name('ordersearch');
Route::post('/ordersearchajax', [OrderController::class, 'suggestions'])->name('ordersearchajax');

/*copperation*/
  Route::resource('cooperation', CooperationController::class);

/*review*/
 Route::resource('review', ReviewConttroller::class);
 Route::post('/update-review-display/{reviewId}', [ReviewConttroller::class, 'updateReviewDisplay'])
 ->name('update.ReviewDisplay');
 Route::post('/reviewsearch', [ReviewConttroller::class, 'search'])->name('reviewsearch');
 Route::post('/reviewsearchajax', [ReviewConttroller::class, 'suggestions'])->name('reviewsearchajax');
});

Route::middleware('auth')->group(function () {
  Route::resource('order', OrderController::class);
  Route::get('/', [InformationController::class, 'profile'])->name('Admin.information');
  Route::put('/update', [InformationController::class, 'updateProfile'])->name('Admin.update');

  Route::resource('YourOrder', YourOrderController::class);


});

 
});
