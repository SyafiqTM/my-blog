<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Post;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id)->first();

        $data = [
          'user' => $user
        ];
        return view('profile')->with($data);
    }

    public function myPost($id)
    {
      $posts = Post::where('user_id', $id)->get();
      $archieves = Post::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
       ->groupBy('year','month')
       ->get()
       ->toArray();

     $data = [
        'posts' => $posts,
        'archieves' => $archieves
     ];

      return view('posts.list')->with($data);
    }

    public function update(Request $request, $id)
    {
      $user = User::where('id',$id)->first();

      $name = $request->input('p_name');
      $email = $request->input('p_email');
      $phone = $request->input('p_phone');
      $address = $request->input('p_address');

      $user->update([
          'name' =>  $name,
          'email' =>  $email,
          'phone' =>  $phone,
          'address' =>  $address,
      ]);

      return redirect()->route('user.profile');
    }


    public function imageUpload(Request $request, $id)
    {
      $user = User::where('id',$id)->first();
      $file = $request->file('file');

      $destinationPic = 'images';
      $path = $destinationPic. '/'. $file->getClientOriginalName();

      $file->move($destinationPic, $file->getClientOriginalName());
      $user->update([
          'file' =>  $path,
      ]);

      return redirect()->route('user.profile');
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
