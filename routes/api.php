<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// basic route

/*
Route::get("role" , function () {

    $price = 100;

    return [
        "price" => $price,
        "list" => [10,20,30],
        "child" => [
            "color" => "red",
            "bg" => "black",
            "laravel" => [
                "a" => 1,
                "b" => 2
            ]
        ]
    ];
});

Route::post("employees" , function () {
    $employees = [
        [
            "id" => 101,
            "name" => "James",
            "salary" => 500.40
        ],
        [
            "id" => 102,
            "name" => "John",
            "salary" => 550.40
        ],
        [
            "id" => 103,
            "name" => "Phal",
            "salary" => 800.40
        ],
    ];

    return [
        "employees" => $employees
    ];
});

*/

// route for role
Route::get("role", [RoleController::class, "index"]);
Route::post("role", [RoleController::class, "store"]);
Route::get("role/{id}", [RoleController::class, "show"]);
Route::put("role/{id}", [RoleController::class, "update"]);
Route::delete("role/{id}", [RoleController::class, "destroy"]);
Route::post("role/changeStatus/{id}" , [RoleController::class , "changeStatus"]);

// route for categories
// Route::get("categories" , [CategoryController::class , "index"]);
// Route::post("categories" , [CategoryController::class , "store"]);
// Route::get("categories/{id}" , [CategoryController::class] , "show");
// Route::put("categories/{id}" , [CategoryController::class] , "update");
// Route::delete("categories/{id}" , [CategoryController::class] , "destroy");
Route::apiResource("categories" , CategoryController::class); // this one line = 5 line on the top

/*
    route name :
        -> role
        -> user
        -> product
        -> category
        -> supplier
        -> order . . .
*/
