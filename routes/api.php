<?php

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

// rest route
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
