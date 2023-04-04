<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderinfoes;
use App\Models\Product;
use App\Models\statics;
use App\Models\User;
use App\Models\voucher;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Metadata\Uses;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
       
        
       $click = orderinfoes::select('order_coder')->pluck('order_coder');
       $date = orderinfoes::select('order_datetime')->pluck('order_datetime');
       $order = orderinfoes::all()->count();
       $product = Product::all()->count();
       $voucher = voucher::all()->count();
       
       return view('pages.dashboard.chart.chart',['click'=>$click,'date'=>$date],compact('order','product','voucher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function demo(Request $request) {
       


    }
    public function create(Request $request)
    {
         
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
