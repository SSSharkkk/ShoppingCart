<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\diaries;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Laravel\Ui\Presets\React;

class ProductController extends Controller
{
    public function index() {
       $list = Product::with('warehouse')->get();
       $category = Categories::where('category_status',1)->get();

       if (Auth::check()) {
        
           return view('pages.dashboard.product.list',compact('list','category'));
       } else {
           return redirect(URL('/'));
       }
    }
 

    public function update_status(Request $request) {
        $data = $request->all();
        $status = Product::find($data['id']);
        $status->product_status = $data['product_status'];
        
        $status->save();
    }

    public function update_category(Request $request) {
        $data = $request->all();
        $status = Product::find($data['id']);
        $status->category_id = $data['category_id'];

        $status->save();
    }

    public function create() {
        $product = Warehouse::where('product_status',1)->get();
        $cate = Categories::where('category_status',1)->get();

        if (Auth::check()) {
        
            return view('pages.dashboard.product.add',compact('product','cate'));
        } else {

            return redirect(URL('/'));
        }
      
    }

    public function edit($id) {
        $warehouse = Warehouse::where('product_status',1)->get();

        $edit = Product::where('id',$id)->get();


        if (Auth::check()) {
        
            return view('pages.dashboard.product.update',compact('edit','warehouse'));
        } else {
            
            return redirect(URL('/'));
        }
    }

    public function update(Request $request ,$id) {
       



        $data =  $request->all();
 
        $input = $request->file('product_images');
        if ($input) {
            $get_name_image = $input->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$input->getClientOriginalExtension();
            $input->move('images/uploads/',$new_image);
            $data['product_images'] = $new_image;

            diaries::create($request->all());
            Product::find($id)->update($data);



            return Redirect()->route('product.index');


        }

        diaries::create($request->all());
        Product::find($id)->update($data);

        return Redirect()->route('product.index');
    }

    public function store(Request $request) {
        diaries::create($request->all());


        $data =  $request->all();
        $input = $request->file('product_images');
        if ($input) {
            $get_name_image = $input->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$input->getClientOriginalExtension();
            $input->move('images/uploads/',$new_image);
            $data['product_images'] = $new_image;
            Product::create($data);


            return redirect()->back();

        }


        return Redirect()->back();
    }

    public function destroy(Request $request, $id) {
        // diaries::create($request->all());


        $product = Product::find($id);
        if (file_exists('images/uploads/'.$product->product_images)) {
            unlink('images/uploads/'.$product->product_images);
        } 
        $product->delete();


        return redirect()->back();
    }
}
