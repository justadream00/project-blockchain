<?php

use Illuminate\Support\Facades\Route;

//project fake shopeee


Route::get('/', [\App\Http\Controllers\khuyencaoController::class, 'index']);
Route::group(['prefix'=>'/client'] ,function(){
    Route::get('/', [\App\Http\Controllers\HomePageController::class, 'index']);


});
    //view danh mục và sản phẩm ra trang chủ
    Route::get('/data-cart', [\App\Http\Controllers\ChiTietDonHangController::class, 'dataCart']);
    Route::post('/add-to-cart-update', [\App\Http\Controllers\ChiTietDonHangController::class, 'addToCartUpdate']);
    Route::post('/remove-cart', [\App\Http\Controllers\ChiTietDonHangController::class, 'removeCart']);
    Route::get('/cart', [\App\Http\Controllers\ChiTietDonHangController::class, 'index']);
    Route::get('/san-pham/{id}', [\App\Http\Controllers\HomePageController::class, 'viewSanPham']);
    Route::get('/danh-muc/{id}', [\App\Http\Controllers\HomePageController::class, 'viewDanhMuc']);
    Route::post('/add-to-cart', [\App\Http\Controllers\ChiTietDonHangController::class, 'addToCart']);
    Route::post('/your-cart-create', [\App\Http\Controllers\DonHangController::class, 'store']);
    Route::get('/your-cart', [\App\Http\Controllers\DonHangController::class, 'view']);
    Route::get('/dat-hang', [\App\Http\Controllers\DonHangController::class, 'dondathangView']);
    Route::get('/dat-hang-data', [\App\Http\Controllers\DonHangController::class, 'donhangManager']);



Route::group(['prefix' => '/admin'], function() {
    Route::group(['prefix' => '/danh-muc-san-pham'], function() {
        Route::get('/index', [\App\Http\Controllers\DanhMucSanPhamController::class, 'index_vue']);
        Route::post('/index', [\App\Http\Controllers\DanhMucSanPhamController::class, 'store']);
        Route::get('/data', [\App\Http\Controllers\DanhMucSanPhamController::class, 'getData']);

        Route::get('/doi-trang-thai/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'doiTrangThai']);

        Route::get('/delete/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'destroy']);
        Route::get('/edit/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\DanhMucSanPhamController::class, 'update']);

        Route::get('/edit-form/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'edit_form']);
        Route::post('/update-form', [\App\Http\Controllers\DanhMucSanPhamController::class, 'update_form']);


    });
    Route::group(['prefix' => '/san-pham'], function() {
        Route::get('/index', [\App\Http\Controllers\SanPhamVueController::class, 'index']);

        Route::get('/changeStatus/{id}', [\App\Http\Controllers\SanPhamVueController::class, 'changeStatus']);

        Route::get('/loadData', [\App\Http\Controllers\SanPhamVueController::class, 'loadData']);
        Route::post('/create', [\App\Http\Controllers\SanPhamVueController::class, 'store']);
        Route::post('/update', [\App\Http\Controllers\SanPhamVueController::class, 'update']);
        Route::get('/edit/{id}', [\App\Http\Controllers\SanPhamVueController::class, 'edit']);
        Route::get('/delete/{id}', [\App\Http\Controllers\SanPhamVueController::class, 'delete']);

        Route::post('/search', [\App\Http\Controllers\SanPhamVueController::class, 'search']);
    });

    Route::group(['prefix' => '/nhap-kho'], function() {
        Route::get('/index', [\App\Http\Controllers\KhoHangController::class, 'index']);

        Route::get('/loadData', [\App\Http\Controllers\KhoHangController::class, 'loadData']);
        Route::get('/add/{id}', [\App\Http\Controllers\KhoHangController::class, 'store']);

        Route::get('/remove/{id}', [\App\Http\Controllers\KhoHangController::class, 'destroy']);
        Route::post('/update', [\App\Http\Controllers\KhoHangController::class, 'update']);

        Route::get('/create', [\App\Http\Controllers\KhoHangController::class, 'create']);
    });

    Route::group(['prefix' => '/config-client'], function() {
        Route::get('/', [\App\Http\Controllers\ConfigController::class, 'index']);
        Route::post('/', [\App\Http\Controllers\ConfigController::class, 'store']);
    });

    Route::get('/login', [\App\Http\Controllers\AdminController::class, 'login']);
    Route::post('/loginTo', [\App\Http\Controllers\AdminController::class, 'loginsecurity']);
    Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'logout']);
    Route::get('/home', [\App\Http\Controllers\AdminController::class, 'homeview']);
    Route::get('/Error', [\App\Http\Controllers\AdminController::class, 'Error']);
    Route::get('/not-allow', [\App\Http\Controllers\AdminController::class, 'allow']);
    Route::get('/create', [\App\Http\Controllers\AdminController::class, 'index']);

    Route::get('/dataHang', [\App\Http\Controllers\DonHangController::class, 'dataDonHang']);
    Route::get('/quan-ly-don-hang', [\App\Http\Controllers\DonHangController::class, 'viewdonhang']);
    Route::get('/xac-nhan/{id}', [\App\Http\Controllers\DonHangController::class, 'changeSTT']);

});

Route::group(['prefix' => '/agent'], function() {
    Route::get('/register', [\App\Http\Controllers\AgentController::class, 'register']);
    Route::post('/register', [\App\Http\Controllers\AgentController::class, 'registerAction']);
    Route::get('/login', [\App\Http\Controllers\AgentController::class, 'login']);
    Route::get('/login-addtocart', [\App\Http\Controllers\AgentController::class, 'login_addtocart']);
    Route::get('/logout', [\App\Http\Controllers\AgentController::class, 'logout']);
    Route::post('/login', [\App\Http\Controllers\AgentController::class, 'loginAction']);
    Route::get('/editInfo', [\App\Http\Controllers\AgentController::class, 'editView']);
    Route::get('/idAgent/{id}', [\App\Http\Controllers\AgentController::class, 'editInfo']);
    Route::post('/Update', [\App\Http\Controllers\AgentController::class, 'UpdateInfo']);
    Route::get('/loadA', [\App\Http\Controllers\AgentController::class, 'dataA']);

    Route::get('/manager', [\App\Http\Controllers\AgentController::class, 'manager']);
    Route::get('/blocked/{id}', [\App\Http\Controllers\AgentController::class, 'lockAgent']);

    Route::get('/khai-tru/{id}', [\App\Http\Controllers\AgentController::class, 'khaitruAgent']);
    Route::get('/showdata', [\App\Http\Controllers\AgentController::class, 'showdataAgent']);


});

Route::group(['prefix' => '/ceo'], function() {

    Route::post('/create', [\App\Http\Controllers\AdminController::class, 'create']);
    Route::get('/quan-ly-admin', [\App\Http\Controllers\AdminController::class, 'view']);
    Route::get('/data', [\App\Http\Controllers\AdminController::class, 'showdata']);

    Route::get('/kich-hoat/{id}', [\App\Http\Controllers\AdminController::class, 'changeAllow']);
    Route::get('/block/{id}', [\App\Http\Controllers\AdminController::class, 'block']);
    Route::get('/khai-tru/{id}', [\App\Http\Controllers\AdminController::class, 'cancel']);



});

Route::group(['prefix' => '/user'], function() {
    // Route::get('/product', [\App\Http\Controllers\SanPhamController::class, 'viewProduct']);
    Route::get('/signup', [\App\Http\Controllers\ChapController::class, 'signupview']);
    Route::post('/signup', [\App\Http\Controllers\ChapController::class, 'createUser']);
    Route::get('/login', [\App\Http\Controllers\ChapController::class, 'login']);
    // Route::get('/login-addtocart', [\App\Http\Controllers\AgentController::class, 'login_addtocart']);
    Route::get('/logout', [\App\Http\Controllers\ChapController::class, 'logout']);
    Route::post('/loginStatus', [\App\Http\Controllers\ChapController::class, 'loginStatus']);
    Route::get('/showdata', [\App\Http\Controllers\ChapController::class, 'showdata']);

    Route::get('/manager', [\App\Http\Controllers\ChapController::class, 'manager']);
    Route::get('/blocked/{id}', [\App\Http\Controllers\ChapController::class, 'changeBlock']);
    Route::get('/destroy-access/{id}', [\App\Http\Controllers\ChapController::class, 'destroyID']);
});

Route::get('/active/agent/{hash}', [\App\Http\Controllers\AgentController::class, 'active']);

Route::get('/active/user/{hash}', [\App\Http\Controllers\ChapController::class, 'active']);


//web tự chế
Route::get('/he-mat-troi', [\App\Http\Controllers\CSScontroller::class, 'index']);


//app Note

Route::get('/note-app', [\App\Http\Controllers\AppController::class, 'index']);
Route::post('/note-app', [\App\Http\Controllers\AppController::class, 'create']);
Route::get('/note-data', [\App\Http\Controllers\AppController::class, 'noteData']);
Route::get('/delete-this-note/{id}', [\App\Http\Controllers\AppController::class, 'deleteNote']);
Route::get('/note-app/login', [\App\Http\Controllers\AppController::class, 'loginNote']);
Route::get('/note-app/loginView', [\App\Http\Controllers\AppController::class, 'loginView']);
Route::get('/note-app/signupView', [\App\Http\Controllers\AppController::class, 'signupView']);
// Route::get('/chat', [\App\Http\Controllers\chatApp::class, 'Chat']);
// Route::post('/mess', [\App\Http\Controllers\chatApp::class, 'mess']);
// Route::get('/chat-login', [\App\Http\Controllers\chatApp::class, 'loginServerChatphp']);

Route::get('/apptinhtien/index', [\App\Http\Controllers\AppBillController::class, 'index']);
Route::post('/apptinhtien/dientt', [\App\Http\Controllers\AppBillController::class, 'create']);

Route::get('/apptinhtien/datashow', [\App\Http\Controllers\AppBillController::class, 'data']);




//project Trung Hoang

