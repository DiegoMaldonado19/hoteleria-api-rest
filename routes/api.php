<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

use  App\Http\Controllers\Api\v1\EmployeeController as EmployeeV1;
use  App\Http\Controllers\Api\v1\EmployeeRoleController as EmployeeRoleV1;
use  App\Http\Controllers\Api\v1\ReservationController as ReservationV1;
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
Route::get('v1/employee', [EmployeeV1::class, 'index'])->middleware('auth:sanctum');
Route::get('v1/employee/{id}', [EmployeeV1::class, 'show'])->middleware('auth:sanctum');
Route::post('v1/employee', [EmployeeV1::class, 'store'])->middleware('auth:sanctum');
Route::put('v1/employee/{id}', [EmployeeV1::class, 'update'])->middleware('auth:sanctum');
Route::delete('v1/employee/{id}', [EmployeeV1::class, 'destroy'])->middleware('auth:sanctum');

Route::get('v1/employee-role', [EmployeeRoleV1::class, 'index'])->middleware('auth:sanctum');
Route::get('v1/employee-role/{id}', [EmployeeRoleV1::class, 'show'])->middleware('auth:sanctum');
Route::post('v1/employee-role', [EmployeeRoleV1::class, 'store'])->middleware('auth:sanctum');
Route::put('v1/employee-role/{id}', [EmployeeRoleV1::class, 'update'])->middleware('auth:sanctum');
Route::delete('v1/employee-role/{id}', [EmployeeRoleV1::class, 'destroy'])->middleware('auth:sanctum');

Route::get('v1/reservation', [ReservationV1::class, 'index'])->middleware('auth:sanctum');
Route::get('v1/reservation/{id}', [ReservationV1::class, 'show'])->middleware('auth:sanctum');
Route::post('v1/reservation', [ReservationV1::class, 'store'])->middleware('auth:sanctum');
Route::put('v1/reservation/{id}', [ReservationV1::class, 'update'])->middleware('auth:sanctum');
Route::delete('v1/reservation/{id}', [ReservationV1::class, 'destroy'])->middleware('auth:sanctum');

Route::get( 'v1/room' ,[RoomV1::class, 'index'])->middleware('auth:sanctum');
Route::get( 'v1/room/{id}' ,[RoomV1::class, 'show'])->middleware('auth:sanctum');
Route::post( 'v1/room' ,[RoomV1::class, 'store'])->middleware('auth:sanctum');
Route::put( 'v1/room/{id}' ,[RoomV1::class, 'update'])->middleware('auth:sanctum');
Route::delete( 'v1/room/{id}' ,[RoomV1::class, 'destroy'])->middleware('auth:sanctum');

Route::get( 'v1/room-type' ,[RoomTypeV1::class, 'index'])->middleware('auth:sanctum');
Route::get( 'v1/room-type/{id}' ,[RoomTypeV1::class, 'show'])->middleware('auth:sanctum');
Route::post( 'v1/room-type' ,[RoomTypeV1::class, 'store'])->middleware('auth:sanctum');
Route::put( 'v1/room-type/{id}' ,[RoomTypeV1::class, 'update'])->middleware('auth:sanctum');
Route::delete( 'v1/room-type/{id}' ,[RoomTypeV1::class, 'destroy'])->middleware('auth:sanctum');

Route::get( 'v1/task', [TaskV1::class, 'index'] )->middleware('auth:sanctum');
Route::get( 'v1/task/{id}', [TaskV1::class, 'show'] )->middleware('auth:sanctum');
Route::post( 'v1/task', [TaskV1::class, 'store'] )->middleware('auth:sanctum');
Route::put( 'v1/task/{id}', [TaskV1::class, 'update'] )->middleware('auth:sanctum');
Route::delete( 'v1/task/{id}', [TaskV1::class, 'destroy'] )->middleware('auth:sanctum');

Route::get( 'v1/transaction', [TransactionV1::class, 'index'] )->middleware('auth:sanctum');
Route::get( 'v1/transaction/{id}', [TransactionV1::class, 'show'] )->middleware('auth:sanctum');
Route::post( 'v1/transaction', [TransactionV1::class, 'store'] )->middleware('auth:sanctum');
Route::put( 'v1/transaction/{id}', [TransactionV1::class, 'update'] )->middleware('auth:sanctum');
Route::delete( 'v1/transaction/{id}', [TransactionV1::class, 'destroy'] )->middleware('auth:sanctum');

Route::get( 'v1/transaction-type', [TransactionTypeV1::class, 'index'] )->middleware('auth:sanctum');
Route::get( 'v1/transaction-type/{id}', [TransactionTypeV1::class, 'show'] )->middleware('auth:sanctum');
Route::post( 'v1/transaction-type', [TransactionTypeV1::class, 'store'] )->middleware('auth:sanctum');
Route::put( 'v1/transaction-type/{id}', [TransactionTypeV1::class, 'update'] )->middleware('auth:sanctum');
Route::delete( 'v1/transaction-type/{id}', [TransactionTypeV1::class, 'destroy'] )->middleware('auth:sanctum');

Route::get( 'v1/user', [UserV1::class, 'index'] )->middleware('auth:sanctum');
Route::get( 'v1/user/{id}', [UserV1::class, 'show'] )->middleware('auth:sanctum');
Route::post( 'v1/user', [UserV1::class, 'store'] )->middleware('auth:sanctum');
Route::put( 'v1/user/{id}', [UserV1::class, 'update'] )->middleware('auth:sanctum');
Route::delete( 'v1/user/{id}', [UserV1::class, 'destroy'] )->middleware('auth:sanctum');

Route::get( 'v1/user-role', [UserRoleV1::class, 'index'] )->middleware('auth:sanctum');
Route::get( 'v1/user-role/{id}', [UserRoleV1::class, 'show'] )->middleware('auth:sanctum');
Route::post( 'v1/user-role', [UserRoleV1::class, 'store'] )->middleware('auth:sanctum');
Route::put( 'v1/user-role/{id}', [UserRoleV1::class, 'update'] )->middleware('auth:sanctum');
Route::delete( 'v1/user-role/{id}', [UserRoleV1::class, 'destroy'] )->middleware('auth:sanctum');
/* Final de Rutas para la version V1 */

Route::post('login', [
    App\Http\Controllers\Api\LoginController::class,
    'login'
]);

Route::post('register', [
    App\Http\Controllers\Api\RegisterController::class,
    'register'
]);

Route::get('actualizar-contrasenas', function () {
    $users = User::all();

    foreach ($users as $user) {
        // Verifica si la contraseña no está cifrada con Bcrypt
        if (Hash::needsRehash($user->password)) {
            // Actualiza la contraseña con Bcrypt
            $user->password = bcrypt($user->password);
            $user->save();
        }
    }

    return 'Contraseñas actualizadas correctamente';
});
