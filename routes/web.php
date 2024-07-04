<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BankDetailsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;









Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/client/dashboard',  [ClientController::class, 'index'])->middleware(['auth', 'verified'])->name('client.index');
Route::get('/client/profile',  [ClientController::class, 'profile'])->middleware(['auth', 'verified'])->name('client.profile');
Route::post('/client/profile/store',  [ClientController::class, 'store'])->middleware(['auth', 'verified'])->name('client.store');
Route::get('/client/profile/{profile}/edit',  [ClientController::class, 'edit'])->middleware(['auth', 'verified'])->name('client.edit');
Route::put('/client/profile/{userDetail}/update',  [ClientController::class, 'update'])->middleware(['auth', 'verified'])->name('client.update');
Route::put('/client/profile/{profile}/destroy',  [ClientController::class, 'destroy'])->middleware(['auth', 'verified'])->name('client.destroy');

Route::get('/client/nextOfKin',  [ClientController::class, 'nextOfKin'])->middleware(['auth', 'verified'])->name('client.nextOfKin');
Route::post('/client/nextOfKin/store',  [ClientController::class, 'storeNextOfKin'])->middleware(['auth', 'verified'])->name('client.storeNextOfKin');
Route::put('/client/nextOfKin/{nextOfKin}/update',  [ClientController::class, 'updateNextOfKin'])->middleware(['auth', 'verified'])->name('client.updateNextOfKin');

Route::get('/client/guarantor',  [ClientController::class, 'guarantor'])->middleware(['auth', 'verified'])->name('client.guarantor');
Route::post('/client/guarantor/store',  [ClientController::class, 'storeGuarantor'])->middleware(['auth', 'verified'])->name('client.storeGuarantor');
Route::put('/client/guarantor/{guarantor}/update',  [ClientController::class, 'updateGuarantor'])->middleware(['auth', 'verified'])->name('client.updateGuarantor');

Route::get('/client/bankdetails',  [BankDetailsController::class, 'bankDetails'])->middleware(['auth', 'verified'])->name('client.bankDetails');
Route::post('/client/bankdetail/store',  [BankDetailsController::class, 'storeBankDetails'])->middleware(['auth', 'verified'])->name('client.storeBankDetails');
Route::put('/client/bankdetail/{bankdetail}/update',  [BankDetailsController::class, 'updateBankDetails'])->middleware(['auth', 'verified'])->name('client.updateBankDetails');

Route::get('/client/monthlyIncome',  [BankDetailsController::class, 'monthlyIncome'])->middleware(['auth', 'verified'])->name('client.monthlyIncome');
Route::post('/client/monthlyIncome/store',  [BankDetailsController::class, 'storeMonthlyIncome'])->middleware(['auth', 'verified'])->name('client.storeMonthlyIncome');
Route::put('/client/monthlyIncome/{monthlyIncome}/update',  [BankDetailsController::class, 'updateMonthlyIncome'])->middleware(['auth', 'verified'])->name('client.updateMonthlyIncome');

Route::get('/client/assets',  [BankDetailsController::class, 'assets'])->middleware(['auth', 'verified'])->name('client.assets');
Route::post('/client/assets/store',  [BankDetailsController::class, 'storeAssets'])->middleware(['auth', 'verified'])->name('client.storeAsset');
Route::put('/client/assets/update',  [BankDetailsController::class, 'updateAssets'])->middleware(['auth', 'verified'])->name('client.updateAsset');

Route::get('/client/loanRequest',  [LoanController::class, 'index'])->middleware(['auth', 'verified'])->name('client.loanRequest');
Route::post('/client/loan/store',  [LoanController::class, 'storeLoan'])->middleware(['auth', 'verified'])->name('client.storeLoan');
Route::get('/client/loan/history',  [LoanController::class, 'loanHistory'])->middleware(['auth', 'verified'])->name('client.loanHistory');
Route::get('/client/loans/{loan}/view',  [LoanController::class, 'loanView'])->middleware(['auth', 'verified'])->name('client.loanView');


Route::get('/admin/dashboard',  [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.index');
Route::get('/admin/pending/verification',  [AdminController::class, 'pendingVerification'])->middleware(['auth', 'verified'])->name('admin.pendingVerification');
Route::get('/admin/pending/{loan}/verification',  [AdminController::class, 'pendingVerificationView'])->middleware(['auth', 'verified'])->name('admin.pendingVerificationView');
Route::put('/admin/loans/{loan}/verification',  [AdminController::class, 'verificationStore'])->middleware(['auth', 'verified'])->name('admin.verificationStore');

Route::get('/admin/pending/recommendation',  [AdminController::class, 'pendingRecommendation'])->middleware(['auth', 'verified'])->name('admin.pendingRecommendation');
Route::get('/admin/pending/{loan}/recommendation',  [AdminController::class, 'pendingRecommendationView'])->middleware(['auth', 'verified'])->name('admin.pendingRecommendationView');
Route::put('/admin/loans/{loan}/recommendation',  [AdminController::class, 'recommendationStore'])->middleware(['auth', 'verified'])->name('admin.recommendationStore');


Route::get('/admin/pending/finalApproval',  [AdminController::class, 'pendingApproval'])->middleware(['auth', 'verified'])->name('admin.pendingApproval');
Route::get('/admin/pending/{loan}/finalApproval',  [AdminController::class, 'pendingApprovalView'])->middleware(['auth', 'verified'])->name('admin.pendingApprovalView');
Route::put('/admin/loans/{loan}/finalApproval',  [AdminController::class, 'approveStore'])->middleware(['auth', 'verified'])->name('admin.approveStore');

Route::get('/admin/pending/payment',  [AdminController::class, 'payment'])->middleware(['auth', 'verified'])->name('admin.payment');
Route::get('/admin/pending/{loan}/payment',  [AdminController::class, 'paymentView'])->middleware(['auth', 'verified'])->name('admin.paymentView');
Route::put('/admin/loans/{loan}/payment',  [AdminController::class, 'paymentStore'])->middleware(['auth', 'verified'])->name('admin.paymentStore');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'permissions' => PermissionController::class,
]);
