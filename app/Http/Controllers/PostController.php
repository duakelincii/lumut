<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view('post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        DB::table('post')->insert($data);
        $pesan = "Data Berhasil Diinput";
        return redirect(route('post'))->with('pesan', $pesan);
    }

    public function edit($id)
    {
        $data = Post::findOrFail($id);
        return view('post.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->except('_token');
        Post::where('idpost', $request->idpost)->update($data);
        $pesan = "Data Berhasil Di Update";
        return redirect(route('post'))->with('pesan', $pesan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('post')->where('idpost', $id)->delete();
        $pesan = "Data Berhasil Di Hapus";
        return redirect(route('post'))->with('error', $pesan);
    }
}
