<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\diaries;
use App\Models\replies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = comment::orderby('id','desc')->get();
        $reply = replies::with('comment')->get();
        //
        return view('pages.dashboard.comment.list',compact('list','reply'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            comment::create($request->all());
        } else {
            
            return redirect(URL('/login'));
        }
        

        return redirect()->back();
    }
    public function status_comment(Request $request) {
        
        $data = $request->all();
        $status = comment::find($data['id']);
        $status->status = $data['status'];
        $status->save();
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
       $list = comment::where('id',$id)->get();

       return view('pages.public.details',compact('list'));
    }

    public function reply (Request $request) {
        replies::create($request->all());  


        return redirect()->back();
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
    public function destroy(Request $request, string $id)
    {
       diaries::create($request->all());

       comment::find($id)->delete();

       

       return redirect()->back();
    }

    public function delete($id) {
        comment::find($id)->delete();

       return redirect()->back();

    }
}
