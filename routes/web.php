<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OtpController;
use App\Http\Controllers\Admin\ProductcatController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\InformationalpageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CustomerenquiryController;
use App\Http\Controllers\Admin\ProductissueController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SellprodcatController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SellroductController;
use App\Http\Controllers\Frontend\HomesController;
use App\Http\Controllers\Frontend\ProductlistController;
use App\Http\Controllers\Frontend\ProductdetailsController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ServicedetailsController;
use App\Http\Controllers\Frontend\SellproductlistController;


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
Route::get('/brdoclogin', [LoginController::class, 'index'])->name('login');
Route::get('/add-sale', [HomeController::class, 'index']);
Route::post('/save', [HomeController::class, 'save'])->name('save');
//Route::get('login', [LoginController::class, 'index'])->name('login');
Route::match(['GET', 'POST'], 'requestotp', [LoginController::class, 'requestOtp'])->name('requestotp');
Route::match(['GET', 'POST'], 'authenticateuser', [LoginController::class, 'authenticateUser'])->name('authentication');
//Route::post('authenticateuser', [LoginController::class, 'authenticateUser'])->name('authentication');


/*********** CUSTOMER ENQUIRY ***************/
route::get('customer-enquiry',[CustomerenquiryController::class,'index'])->name('customer-enquiry');
/*******************************************/

/*************** FRONTEND *****************/ 
/*************** Home page *****************/
route::get('/',[HomesController::class,'index']);
route::get('mobile',[HomesController::class,'otherMobile']);
route::get('laptop',[HomesController::class,'otherLaptop']);
route::post('form',[HomesController::class,'store'])->name('home-form');

/*************** Services page *****************/
route::get('product-list/{cat_slug}',[ProductlistController::class,'index']);
route::get('product-details/{slug}',[ProductdetailsController::class,'index']);
route::post('query',[ProductdetailsController::class,'store']);
route::get('privacy-policy',[PagesController::class,'privacy']);
route::get('terms-and-conditions',[PagesController::class,'terms']);
route::get('about-us',[AboutController::class,'index']);
route::get('contact-us',[ContactController::class,'index']);
route::post('contact-query',[ContactController::class,'store']);

route::get('services',[ServicedetailsController::class,'index']);
route::get('services/{slug}',[ServicedetailsController::class,'index']);

route::get('sell-product-list/{cat_slug}',[SellproductlistController::class,'index']);



/*******************************************/



// Route::group(['middleware' => 'auth'], function () {


Route::resource('roles', RoleController::class);

/***********Dashboard***************/    
Route::get('dashboard', [DashboardController::class, 'index']);
/**********************************/

/*********** Slider Images ***************/
Route::get('slider', [SliderController::class, 'index']);
Route::get('addslider', [SliderController::class, 'addSlider'])->name('addslider');
Route::post('saveslider', [SliderController::class, 'saveSlider'])->name('saveslider');
Route::get('editslider/{id}', [SliderController::class, 'editSlider']);
Route::post('updateslider/{id}', [SliderController::class, 'updateSlider']);
Route::get('deleteslider/{id}', [SliderController::class, 'deleteSlider']);
/**********************************/

/*********** Products ***************/    
Route::get('product', [ProductController::class, 'index']);
Route::get('addproduct', [ProductController::class, 'addProduct'])->name('addproduct');
Route::post('saveproduct', [ProductController::class, 'saveProduct'])->name('saveproduct');
Route::get('editproduct/{id}', [ProductController::class, 'editProduct']);
Route::post('updateproduct/{id}', [ProductController::class, 'updateProduct']);
Route::get('deleteproduct/{id}', [ProductController::class, 'deleteProduct']);
/**********************************/

/*********** Product Issue ***************/    
Route::get('product-issue', [ProductissueController::class, 'index']);
Route::get('addproduct-issue', [ProductissueController::class, 'addProductIssue']);
Route::post('saveproduct-issue', [ProductissueController::class, 'saveProductIssue']);
Route::get('editproduct-issue/{id}', [ProductissueController::class, 'editProductIssue']);
Route::post('updateproduct-issue/{id}', [ProductissueController::class, 'updateProductIssue']);
Route::get('deleteproduct-issue/{id}', [ProductissueController::class, 'deleteProductIssue']);
/**********************************/

/*********** Product category ***************/    
Route::get('productcat', [ProductcatController::class, 'index']);
Route::get('addproductcat', [ProductcatController::class, 'addCat'])->name('addproductcat');
Route::post('saveproductcat', [ProductcatController::class, 'saveCat'])->name('saveproductcat');
Route::get('editproductcat/{cat_id}', [ProductcatController::class, 'editCat']);
Route::post('updateproductcat/{cat_id}', [ProductcatController::class, 'updateCat']);
Route::get('deleteproductcat/{cat_id}', [ProductcatController::class, 'deleteCat']);
/**********************************/

/*********** Sell Product category ***************/    
Route::get('sell-productcat', [SellprodcatController::class, 'index']);
Route::get('sell-addproductcat', [SellprodcatController::class, 'addCat'])->name('addproductcat');
Route::post('sell-saveproductcat', [SellprodcatController::class, 'saveCat'])->name('saveproductcat');
Route::get('sell-editproductcat/{cat_id}', [SellprodcatController::class, 'editCat']);
Route::post('sell-updateproductcat/{cat_id}', [SellprodcatController::class, 'updateCat']);
Route::get('sell-deleteproductcat/{cat_id}', [SellprodcatController::class, 'deleteCat']);
/**********************************/


/*********** Sell Products ***************/    
Route::get('sell-product', [SellroductController::class, 'index']);
Route::get('sell-addproduct', [SellroductController::class, 'addProduct'])->name('addproduct');
Route::post('sell-saveproduct', [SellroductController::class, 'saveProduct'])->name('saveproduct');
Route::get('sell-editproduct/{id}', [SellroductController::class, 'editProduct']);
Route::post('sell-updateproduct/{id}', [SellroductController::class, 'updateProduct']);
Route::get('sell-deleteproduct/{id}', [SellroductController::class, 'deleteProduct']);
/**********************************/

Route::get('admin-setting', [SettingController::class, 'index'])->name('setting');
Route::post('update-setting', [SettingController::class, 'updateUser'])->name('update-setting');


/*************** Informational Pages ******************/
Route::get('add-page', [InformationalpageController::class, 'addPage'])->name('add-page');
Route::post('savepage', [InformationalpageController::class, 'savePage'])->name('savepage');
Route::get('informational-page', [InformationalpageController::class, 'index'])->name('page-information');
Route::get('editpage/{id}', [InformationalpageController::class, 'editPage'])->name('editpage');
Route::get('deletepage/{id}', [InformationalpageController::class, 'deletePage'])->name('deletepage');
Route::post('update-page/{id}', [InformationalpageController::class, 'updatePage'])->name('update-page');
/******************************************************/


/*********** Services ***************/    
Route::get('service', [ServiceController::class, 'index']);
Route::get('addservice', [ServiceController::class, 'addService'])->name('addservice');
Route::post('saveservice', [ServiceController::class, 'saveService'])->name('saveservice');
Route::get('editservice/{id}', [ServiceController::class, 'editService']);
Route::post('updateservice/{id}', [ServiceController::class, 'updateService']);
Route::get('deleteservice/{id}', [ServiceController::class, 'deleteService']);
/**********************************/

/******************* Testimonials ***********************/
Route::get('add-testimonial', [TestimonialController::class, 'addTestimonial'])->name('add-testimonial');
Route::post('savetestimonial', [TestimonialController::class, 'saveTestimonial'])->name('savetestimonial');
Route::get('testimonial', [TestimonialController::class, 'index'])->name('testimonial');
Route::get('edit-testimonial/{id}', [TestimonialController::class, 'editTestimonial'])->name('edit-testimonial');
Route::get('delete-testimonial/{id}', [TestimonialController::class, 'deleteTestimonial'])->name('delete-testimonial');
Route::post('update-testimonial/{id}', [TestimonialController::class, 'updateTestimonial'])->name('update-testimonial');
/*******************************************************/

/******************* Blog ***********************/
Route::get('add-blog', [BlogController::class, 'addBlog'])->name('add-blog');
Route::post('saveblog', [BlogController::class, 'saveBlog'])->name('saveblog');
Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('edit-blog/{id}', [BlogController::class, 'editBlog'])->name('edit-blog');
Route::get('delete-blog/{id}', [BlogController::class, 'deleteBlog'])->name('delete-blog');
Route::post('update-blog/{id}', [BlogController::class, 'updateBlog'])->name('update-blog');
/*******************************************************/


/*** User Login Otp***/
Route::get('otp', [OtpController::class, 'index']);
/*********************/


/**** User Modeule ****/
Route::get('usertypes', [UserController::class, 'userTypes']);
Route::post('saveusertype', [UserController::class, 'saveUsertype'])->name('saveusertype');
Route::get('addusertype', [UserController::class, 'addUsertype']);
Route::get('editusertype/{usertype_id}', [UserController::class, 'editUsertype']);
Route::post('updateusertype/{usertype_id}', [UserController::class, 'updateUsertype']);
Route::get('deleteusertype/{usertype_id}', [UserController::class, 'deleteUsertype']);

Route::get('users', [UserController::class, 'index']);
Route::get('adduser', [UserController::class, 'addUser']);
Route::post('saveuser', [UserController::class, 'saveUser'])->name('saveuser');
Route::get('edituser/{user_id}', [UserController::class, 'editUser']);
Route::post('updateuser/{user_id}', [UserController::class, 'updateUser'])->name('updateuser');
/**********************************/


Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
// });
