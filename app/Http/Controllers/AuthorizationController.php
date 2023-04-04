<?php

namespace App\Http\Controllers;

use App\Models\authorization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $list =  User::all();
       if (Auth::check()) {
        
           return view('pages.dashboard.authorization.list',compact('list'));
       } else {
           return redirect(URL('/'));
       }
    }

    /**
     * Show the form for creating a new resource.
     */

    public function update_function(Request $request) {
        
        $data = $request->all();
        $status = User::find($data['id']);
        $status->function = $data['functions'];
        $status->save();

        return redirect()->back();
    }

    public function update_manager(Request $request) {
        
        $data = $request->all();
        $status = User::find($data['id']);
        $status->manager = $data['manager'];
        $status->save();

        return redirect()->back();
    }

    public function update_chat(Request $request) {
        
        $data = $request->all();
        $status = User::find($data['id']);
        $status->chat = $data['chat'];
        $status->save();

        return redirect()->back();
    }


    public function update_admin(Request $request) {
        
        $data = $request->all();
        $status = User::find($data['id']);
        $status->admin = $data['admin'];
        $status->save();

        return redirect()->back();
    }

    public function create()
    {
        //
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
