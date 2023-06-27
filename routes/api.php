<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RouteController;

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

// Route::get('apiTesting',function(){
//     $data = [
//         'message' => 'this is api testing message'
//     ];
//     dd($data);
//     return response()->json($data, 200);
// });

Route::get('product/list',[RouteController::class,'productList']);
Route::get('category/list',[RouteController::class,'categoryList']);
Route::get('user/list',[RouteController::class,'userList']);
Route::get('order/list',[RouteController::class,'orderList']);
Route::get('cart/list',[RouteController::class,'cartList']);


// POST
Route::post('create/category',[RouteController::class,'categoryCreate']);
Route::post('create/contact',[RouteController::class,'contactCreate']);

Route::get('category/delete/{id}',[RouteController::class,'deleteCategory']);

Route::post('category/details',[RouteController::class,'categoryDetails']);

Route::post('category/update',[RouteController::class,'categoryUpdate']);

?>
