<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\diaries;
use App\Models\diary;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
     

        $list =  Categories::orderBy('id','desc')->get();

        if (Auth::check()) {
            # code...
            return view('pages.dashboard.category.list',compact('list'));
        } else {
            return redirect(URL('/'));
        }

        
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {

            return view('pages.dashboard.category.add');
        
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
        

        Categories::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {  

       $edit = Categories::where('id',$id)->get();


       if (Auth::check()) {
        
           return view('pages.dashboard.category.edit',compact('edit'));

       } else {
        
           return redirect(URL('/'));
       }
    }

    public function update_status(Request $request) {
        
        $data = $request->all();
        $status = Categories::find($data['id']);
        $status->category_status = $data['category_status'];
        $status->save();
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        diaries::create($request->all());

        Categories::find($id)->update($request->all());
        
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        diaries::create($request->all());

        Categories::find($id)->delete();

        return redirect()->route('category.index');

    }
}
