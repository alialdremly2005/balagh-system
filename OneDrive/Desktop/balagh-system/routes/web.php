<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;


// ==========================
// الصفحات العامة
// ==========================

Route::get('/', function () {
    return view('index');
});

Route::get('/reports', [ReportController::class, 'index']);

Route::get(
    '/reports/{report}',
    [ReportController::class, 'show']
)->name('reports.show');


// ==========================
// تسجيل الدخول والتسجيل
// ==========================

Route::get(
    '/login',
    [AuthController::class, 'showLogin']
);

Route::post(
    '/login',
    [AuthController::class, 'login']
);

Route::get(
    '/register',
    [AuthController::class, 'showRegister']
);

Route::post(
    '/register',
    [AuthController::class, 'register']
);


// ==========================
// المستخدم المسجل
// ==========================

Route::middleware('auth.user')->group(function () {

    Route::get('/report', function () {
        return view('report');
    });

    Route::post(
        '/report',
        [ReportController::class, 'store']
    );

    Route::get(
        '/dashboard',
        [ReportController::class, 'dashboard']
    );

    Route::post(
        '/logout',
        [AuthController::class, 'logout']
    );

});


// ==========================
// الأدمن
// ==========================

Route::middleware(['auth.user', 'admin'])->group(function () {

    Route::get(
        '/admin',
        [ReportController::class, 'admin']
    );

    Route::patch(
        '/admin/reports/{report}/status',
        [ReportController::class, 'updateStatus']
    )->name('admin.reports.status');

    Route::delete(
        '/admin/reports/{report}',
        [ReportController::class, 'destroy']
    )->name('admin.reports.destroy');

});