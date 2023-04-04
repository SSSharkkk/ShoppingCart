<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\diaries;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Warehouse::with('category')->get();
        $category = Categories::orderBy('id','desc')->get();

        if (Auth::check()) {
        
            return view('pages.dashboard.warehouse.list',compact('list','category'));
        } else {
            return redirect(URL('/'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  
       
        $cate = Categories::orderBy('id','desc')->get();

        if (Auth::check()) {
        
            return view('pages.dashboard.warehouse.add',compact('cate'));
        } else {
            return redirect(URL('/'));
        }

    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
       diaries::create($request->all());
       Warehouse::create($request->all());

        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */

    public function update_status(Request $request) {
        $data = $request->all();
        $status = Warehouse::find($data['id']);
        $status->product_status = $data['product_status'];
        
        $status->save();
    }




    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit =  Warehouse::where('id',$id)->get();

        if (Auth::check()) {
        
            return view('pages.dashboard.warehouse.edit',compact('edit'));
        } else {
            return redirect(URL('/'));
        }


        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        diaries::create($request->all());
        Warehouse::find($id)->update($request->all());


        
        return redirect()->route('warehouse.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    { 
         diaries::create($request->all());
         Warehouse::find($id)->delete();

        return redirect()->back();
    }
}
