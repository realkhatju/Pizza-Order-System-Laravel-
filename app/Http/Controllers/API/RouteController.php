<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RouteController extends Controller
{
    // get all product list
    public function productList(){
        $products = Product::get();
        $categories = Category::get();

        $data = [
            'product' => [
                'code lab' => [
                    'test' => $products
                ]
            ] ,
            'category' => $categories
        ];
        return $data['product']['code lab']['test'][0]->name;
        return response()->json($data, 200);
    }

    // get all category list
    public function categoryList(){
        $categories = Category::orderBy('id','desc')->get();
        return response()->json($categories,200);
    }

    // get all user list
    public function userList(){
        $users = User::get();
        return response()->json($users,200);
    }

    // get all order list
    public function orderList(){
        $orders = Order::get();
        return response()->json($orders,200);
    }

    // get all cart list
    public function cartList(){
        $carts = Cart::get();
        return response()->json($carts,200);
    }

    // create category
    public function categoryCreate(Request $request){
        // dd($request->header('headerData'));    //$request->name (give from body)
        $data = [
            'name' => $request->name,
            'created_at' => Carbon::now() ,
            'updated_at' => Carbon::now()
        ];
        $response = Category::create($data);
        return response()->json($response, 200);
    }

    // delete category
    public function deleteCategory($id){
        // return $id;
        $data = Category::where('id',$id)->first();
        if(isset($data)){
            Category::where('id',$id)->delete();
            return response()->json(['status' => true,'message' => 'delete success','deleteData' => $data],200);
        };
        return response()->json(['status' => false,'message' => 'There is no category...'],200);
    }

    // create contact
    public function contactCreate(Request $request){
        $data = $this->getContactData($request);
        Contact::create($data);
        $contact = Contact::orderBy('created_at','desc')->get();
        return response()->json($contact, 200);
    }

    // category details
    public function categoryDetails(Request $request){
        $data = Category::where('id',$request->category_id)->first();
        if(isset($data)){
            // Category::where('id',$id)->delete();
            return response()->json(['status' => true,'category' => $data],200);
        };
        return response()->json(['status' => false,'category' => 'There is no category...'],200);
    }

    // update category
    public function categoryUpdate(Request $request){
        return $request->all();
    }

    // get contact data
    private function getContactData($request){
        return [
            'name' => $request->name,
            'email' => $request->email ,
            'message' => $request->description ,
            'created_at' => Carbon::now() ,
            'updated_at' => Carbon::now()
        ];
    }
}

?>
