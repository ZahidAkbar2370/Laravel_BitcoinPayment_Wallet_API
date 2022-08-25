<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('welcome');
});

// visit website for more api's: https://developers.opennode.com/reference/supported-currencies

Route::get('/get-api', function () {

    $apiData = Http::withHeaders([
        "Content-Type" => "application/json",
        "Authorization" => env('API_KEY'),
    ])->get('https://api.opennode.com/v1/currencies')->json();

    return $apiData;
});

Route::get('post-api', function () {
        
    $body = '{"amount":5}';

    $apiData = Http::withHeaders([
            "Content-Type" => "application/json",
            "Authorization" =>  env('API_KEY'),
        ])->post('https://api.opennode.com/v1/charges', json_decode($body));
    
    return $apiData;
});