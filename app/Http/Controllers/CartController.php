<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Models\diaries;
use App\Models\order;
use App\Models\orderinfoes;
use App\Models\Warehouse;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use LengthException;
use PhpParser\Node\Stmt\Catch_;
use Maatwebsite\Excel\Facades\Excel;


class CartController extends Controller
{
    public function index() {
        $list  =  orderinfoes::orderBy('id','desc')->get();

        if (Auth::check()) {
        
            return view('pages.dashboard.cart.list',compact('list'));
        } else {
            return redirect(URL('/'));
        }
    }

    public function details_order($id) {
        $list_info =  order::where('order_coder',$id)->get()->take(1);
        $list  =  order::with('product','warehouse','voucher')->where('order_coder',$id)->get();
        if (Auth::check()) {
        
            return view('pages.dashboard.cart.listdetails',compact('list','list_info'));
        } else {
            return redirect(URL('/'));
        }
    }
    
    public function update_cart_qty_warehouse(Request $request) {
          
    //    $list = order::where('order_coder',$request->order_coder)->get();


     
        

    }

    public function update_status_cart(Request $request) {
        $data = $request->all();

        $status = orderinfoes::find($data['id']);
        $status->order_status = $data['order_status'];

        $status->save();
    }

    public function update_payment(Request $request) {
        $data = $request->all();

        $status = orderinfoes::find($data['id']);
        $status->payment_status = $data['payment_status'];

        $status->save();
    }

    public function delete_order(Request $request,$id) {
        diaries::create($request->all());
        order::where('order_coder',$id)->delete();
        orderinfoes::where('order_coder',$id)->delete();

        return redirect()->back();
    }

    public function cart(Request $request) { 
      
            
            return view('pages.public.cart');
       
    }
    public function add_cart(Request $request)
    {
        
        
        Cart::add([
            'id'=>$request->cart_id,
            'name'=>$request->cart_name,
            'price'=>$request->cart_price,
            'qty'=>1,
            'options'=> [
                'qty_same'=>$request->cart_qty_same,
                'user'=>$request->user_id,
                'image'=>$request->cart_image,
                'warehouse'=>$request->cart_warehouse,
            ],
    ]);

       


        return redirect(URL('/gio-hang-cua-ban'));
       
    }
    public function update_cart(Request $request) {
       $rowId = $request->rowId;
       $qty = $request->cart_qty;
      
       Cart::update($rowId,$qty);

       return redirect()->back();
    }
    public function remove_cart(Request $request) {
        $rowId = $request->rowId;

        Cart::remove($rowId);

        return redirect()->back();
    }
    
    public function checkout(Request $request) {
        $order_corder = rand(0,9999);
        $order_time = Carbon::now('Asia/Ho_Chi_Minh');
    
        $order = $request->all();
        
        if (Auth::check()) {
            $order['order_coder'] = $order_corder;
            $order['order_status'] =  1;
            $order['payment_status'] = 2;
            $order['order_datetime'] = $order_time;
            orderinfoes::create($order);
        }

        if (Auth::check()) {
            foreach(Cart::content() as $data) {
                
                $order['product_id'] = $data->id;
                $order['customer_id'] = $data->options->user;
                $order['qty'] = $data->qty;
                $order['name'] = $request->name;
                $order['email'] = $request->email;
                $order['phone'] = $request->phone;
                $order['address'] = $request->address;
                $order['note'] = $request->note;
                $order['warehouse_id'] = $data->options->warehouse;
                $voucher = $request->voucher;

                $voucher_id = DB::table('vouchers')->where('coder', $voucher)->get();
                
                foreach($voucher_id as $id=>$key) {
                    
                   $order['voucher_code'] = $key->id;
                };
                


                $product_quantity = DB::table('warehouses')->where('id',  $order['warehouse_id'])->get();
                $qty_cart = $data->qty;

                foreach($product_quantity as $qty=>$quantity) {
                    $hi = $quantity->product_quantity;
                    
                    $order['product_quantity'] = $hi - $qty_cart;
                    $order['warehouse_id'] = $data->options->warehouse;
                    
       
                    Warehouse::find($order['warehouse_id'])->update($order);
                };
                
                order::create($order);
                
             }
        } else {
            return Redirect(URL('/login'));
        }
       
        Cart::destroy();
        

       
        return view('pages.public.checkout');
    }



    public function export($order_coder) 
    {
        $file = Excel::download(new OrderExport($order_coder), 'donhang'.$order_coder.'.xlsx');
        return $file;
    }

}
