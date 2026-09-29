<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FabricController;
use App\Http\Controllers\FabricGroupController;
use App\Http\Controllers\LayModelController;
use App\Http\Controllers\MaterialReceivingController;
use App\Http\Controllers\GRNController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\FabricStoreController;
use App\Http\Controllers\RelaxationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PatternController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\CuttingController;
use App\Http\Controllers\BundleController;
use App\Http\Controllers\SewingController;
use App\Http\Controllers\WashingController;
use App\Http\Controllers\FinishingController;
use App\Http\Controllers\PackingController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FabricIssueController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');
});


Route::middleware('auth')->group(function () {

    Route::get('/', fn() => redirect()->route('dashboard'));

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');


    // MASTER

    Route::resource(
        'fabrics',
        FabricController::class
    );

    Route::get(
        '/fabric-groups/{fabricGroup}/fabrics',
        [FabricGroupController::class, 'fabrics']
    )->name('fabric-groups.fabrics');

    Route::resource(
        'fabric-groups',
        FabricGroupController::class
    );


    // PRODUCTION

    Route::resource(
        'lay-models',
        LayModelController::class
    );

    Route::resource(
        'material-receivings',
        MaterialReceivingController::class
    );

    Route::resource(
        'grns',
        GRNController::class
    );

    Route::resource(
        'inspections',
        InspectionController::class
    );

    Route::resource(
        'fabric-stores',
        FabricStoreController::class
    );

    Route::resource(
        'relaxations',
        RelaxationController::class
    );

    Route::resource(
        'orders',
        OrderController::class
    );

    Route::resource(
        'patterns',
        PatternController::class
    );

    Route::resource(
        'markers',
        MarkerController::class
    );

    Route::resource(
        'cuttings',
        CuttingController::class
    );

    Route::resource(
        'bundles',
        BundleController::class
    );

    Route::resource(
        'sewings',
        SewingController::class
    );

    Route::resource(
        'washings',
        WashingController::class
    );

    Route::resource(
        'finishings',
        FinishingController::class
    );

    Route::resource(
        'packings',
        PackingController::class
    );

    Route::resource(
        'shipments',
        ShipmentController::class
    );


    // STOCK / MATERIAL

    Route::resource(
        'reservations',
        ReservationController::class
    );

    Route::resource(
        'fabric-issues',
        FabricIssueController::class
    );

});