<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\comment;
use App\Models\Product;
use App\Models\replies;
use App\Models\Warehouse;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('warehouse')->where('product_status',1)->get()->take(3);
     

        return view('pages.home',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function details($slug)
    {
        $comment_show = comment::with('product')->where('product_slug',$slug)->where('status',1)->orderby('id','desc')->get();
        $comment_reply = replies::with('comment')->get();
        $details = Product::with('category','warehouse')->where('product_slug',$slug)->get();

        return view('pages.public.details',compact('details','comment_show','comment_reply'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function shop($slug)
    {
       
       
        $category_title = Categories::where('category_slug',$slug)->first();


        $category_product = Product::where('category_id',$category_title->id)->where('product_status',1)->get()->take(50);


        return view('pages.public.shopCategory',compact('category_product','category_title'));
        
    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
