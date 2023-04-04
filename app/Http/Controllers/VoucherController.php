<?php

namespace App\Http\Controllers;

use App\Models\diaries;
use App\Models\voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {

            $list = voucher::orderBy('id','desc')->get();


            return view('pages.dashboard.voucher.list',compact('list'));
        } else {


            return redirect(URL('/login'));

        }



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            
            return view('pages.dashboard.voucher.add');
        } else {


            return redirect(URL('/login'));
        }

    }

    public function status_voucher(Request $request) {
        
        $data = $request->all();
        $status = voucher::find($data['id']);
        $status->status = $data['status'];
        $status->save();
    }
    public function update_percent(Request $request) {
        
        $data = $request->all();
        $status = voucher::find($data['id']);
        $status->percent = $data['percent'];
        $status->save();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        diaries::create($request->all());
        voucher::create($request->all());

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
        
        if (Auth::check()) {
            $voucher = voucher::where('id',$id)->get();
            return view('pages.dashboard.voucher.update',compact('voucher'));
            # code...
        } else {


            return redirect(URL('/login'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        diaries::create($request->all());
        voucher::find($id)->update($request->all());

        return redirect()->route('voucher.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        diaries::create($request->all());
        voucher::find($id)->delete();

        return redirect()->back();
    }
}
