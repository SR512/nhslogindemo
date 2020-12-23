<?php

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

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => '8T8XxbxMhl2NAkkKrRrMYbk0yuuNc5vz',
        'redirect_uri' => 'http://127.0.0.1:8000/callback',
        'response_type' => 'code',
        'scope' => 'openid profile',
        'state' => 'af0ifjsldkj',
        'nonce'=>'rendomnonce'
    ]);

    return redirect('https://auth.sandpit.signin.nhs.uk/authorize?'.$query);

})->name('authorize');

Route::get('/callback',[\App\Http\Controllers\SandpitController::class,'index']);
Route::get('/response',[\App\Http\Controllers\SandpitController::class,'response']);
