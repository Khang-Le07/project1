<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;


class ApiControler extends Controller
{
    /**$
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(3);
        return view('welcome',['posts' => $posts]);
        // return view('web.postdetail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Post;
        $data->title=$request->title;
        $data->body=$request->body;
        $data->img_path=$request->img_path;
        $data->is_published=$request->is_published;
        $data->save();
        return view('wellcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $posts = Post::orderBy('id', 'DESC')->paginate(3);
        if($post){
            return view('web.postdetail' ,['post' => $post], ['posts' => $posts]);
        } else {
            return redirect()->back();
        }
    }
    public function show1($id)
    {
        $post = CtvPost::find($id);
        $posts = CtvPost::orderBy('id', 'DESC')->paginate(3);
        if($post){
            return view('web.ctvpostdetail' ,['post' => $post], ['posts' => $posts]);
        } else {
            return redirect()->back();
        }
    }
    public function showUser($id)
    {
        $comments = Comment::find($id);
        $user = $comments->user;
        if($user){
            return view('web.viewinfo',['user' => $user]);
        } else {
            return redirect()->back();
        }
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
