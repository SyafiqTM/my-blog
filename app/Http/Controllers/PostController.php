<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use Session;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create');
    }

    public function index(){
       $posts = Post::latest()->get();

       $archieves = Post::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
        ->groupBy('year','month')
        ->get()
        ->toArray();

      $data = [
         'posts' => $posts,
         'archieves' => $archieves
      ];
       return view('welcome')->with($data);
    }

    public function create(){

       $archieves = Post::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
        ->groupBy('year','month')
        ->get()
        ->toArray();

      $data = [
         'archieves' => $archieves
      ];
       return view('posts.form')->with($data);
    }

    public function show(Post $post){

      $archieves = Post::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
       ->groupBy('year','month')
       ->get()
       ->toArray();

     $data = [
        'posts' => $post,
        'archieves' => $archieves
     ];

      return view('posts.show')->with($data);
    }

    public function store(Request $request){

      // Validate the form data
      $this->validate($request, [
        'title'   => 'required',
        'body' => 'required|min:20'
      ]);

      $post = new Post;
      $post->title = $request->input('title');
      $post->body = $request->input('body');

      $post->user_id = Auth::user()->id;
      $post->link_rewrite = str_replace(" ","-", $request->input('title'));
      $save = $post->save();

      return redirect()->route('home');
    }

    public function destroy(Request $request, $id){

      $posts = Post::where('user_id', $request->input('id'))->first();
      $posts->delete();

      return redirect()->back();
    }

    public function archieve(){

      //using scope filter
       $posts = Post::latest()
       ->filter(array('month' => request('month'), 'year' => request('year')))
       ->get();

       //retrieving archieve
       $archieves = Post::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
        ->groupBy('year','month')
        ->get()
        ->toArray();

      $data = [
         'posts' => $posts,
         'archieves' => $archieves
      ];
       return view('welcome')->with($data);
    }

    public function search(Request $request){

      $search = $request->input('search');

      Session::flash('search', $search);

      //using scope filter
       $posts = Post::latest()
       ->where('title', 'like', '%'.$search.'%')
       ->orWhere('body', 'like', '%'.$search.'%')
       ->get();

       //retrieving archieve
       $archieves = Post::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
        ->groupBy('year','month')
        ->get()
        ->toArray();

      $data = [
         'posts' => $posts,
         'archieves' => $archieves
      ];
       return view('welcome')->with($data);
    }
}
