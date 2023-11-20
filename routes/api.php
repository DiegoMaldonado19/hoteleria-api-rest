<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\Api\v1\EmployeeController as EmployeeV1;
use  App\Http\Controllers\Api\v1\EmployeeRoleController as EmployeeRoleV1;
use  App\Http\Controllers\Api\v2\ReservationController as ReservationV1;
use  App\Http\Controllers\Api\v1\RoomController as RoomV1;
use  App\Http\Controllers\Api\v1\RoomTypeController as RoomTypeV1;
use  App\Http\Controllers\Api\v1\TaskController as TaskV1;
use  App\Http\Controllers\Api\v1\TransactionController as TransactionV1;
use  App\Http\Controllers\Api\v1\TransactionTypeController as TransactionTypeV1;
use  App\Http\Controllers\Api\v1\UserController as UserV1;
use  App\Http\Controllers\Api\v1\UserRoleController as UserRoleV1;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Rutas para la version V1 */
Route::apiResource('v1/employee', EmployeeV1::class)
->only(['index', 'store', 'show', 'update', 'destroy'])
->middleware('auth:sanctum');

Route::apiResource('v1/employee-role', EmployeeRoleV1::class)
->only(['index', 'store', 'show', 'update', 'destroy'])
->middleware('auth:sanctum');

Route::apiResource('v1/reservation', ReservationV1::class)
->only(['index', 'store', 'show', 'update', 'destroy'])
->middleware('auth:sanctum');

Route::apiResource('v1/room', RoomV1::class)
->only(['index', 'store', 'show', 'update', 'destroy'])
->middleware('auth:sanctum');

Route::apiResource('v1/room-type', RoomTypeV1::class)
->only(['index', 'store', 'show', 'update', 'destroy'])
->middleware('auth:sanctum');

Route::apiResource('v1/task', TaskV1::class)
->only(['index', 'store', 'show', 'update', 'destroy'])
->middleware('auth:sanctum');

Route::apiResource('v1/transaction', TransactionV1::class)
->only(['index', 'store', 'show', 'update', 'destroy'])
->middleware('auth:sanctum');

Route::apiResource('v1/transaction-type', TransactionTypeV1::class)
->only(['index', 'store', 'show', 'update', 'destroy'])
->middleware('auth:sanctum');

Route::apiResource('v1/user', UserV1::class)
->only(['index', 'store', 'show', 'update', 'destroy'])
->middleware('auth:sanctum');

Route::apiResource('v1/user-role', UserRoleV1::class)
->only(['index', 'store', 'show', 'update', 'destroy'])
->middleware('auth:sanctum');
/* Final de Rutas para la version V1 */

Route::post('login', [
    App\Http\Controllers\Api\LoginController::class,
    'login'
]);

Route::post('register', [
    App\Http\Controllers\Api\RegisterController::class,
    'register'
]);
