<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use Carbon\Carbon;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
        Post::truncate();
         DB::table('posts')->insert([
           [
             'id' => 1,
             'title' => 'Laravel 5.7.9 Released',
             'body' => 'Laravel 5.7.9 was released on Tuesday with some changes and fixes, along with a new 401 exception view, new session assertion methods, and PendingResourceRegistration is macroable.
                       First, a new assertion in the TestResponse class called assertSessionDoesntHaveErrors() can be used to ensure that the session doesn’t include an error for a given field',
             'user_id' => '1',
             'imglink' => 'images/post-1.png',
             'biglink' => 'images/big-post-1.png',
             'link_rewrite' => 'Laravel-5.7.9-Released',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now(),
           ],
           [
             'id' => 2,
             'title' => 'Building Package Installers',
             'body' => 'I think most of us that have worked with Laravel for a while are very familiar with the package installation process: add the package via composer,
                       register the service provider, publish the config file, update the environment file, hopefully you remember to update .env.example, and after all of that you
                       hope that you didn’t miss a step. This often involved copying and pasting from a README and bouncing back and forth between your editor and a browser. With the release
                       of Laravel 5.5 we got a pretty great improvement to this process with package discovery but outside of that this experience hasn’t really changed much.',
             'user_id' => '1',
             'imglink' => 'images/post-2.png',
             'biglink' => 'images/big-post-2.png',
             'link_rewrite' => 'Building-Package-Installer',
             'created_at' => Carbon::createFromFormat('Y-m-d H', '2018-05-21 22')->toDateTimeString(),
             'updated_at' => Carbon::createFromFormat('Y-m-d H', '2018-05-21 22')->toDateTimeString(),
           ],
           [
             'id' => 3,
             'title' => 'Akaunting – Free Accounting Software',
             'body' => 'Akaunting is a free and open source accounting software built on Laravel. It handles everything from invoicing to expense tracking to accounting and runs on your infrastructure.
                        What makes Akaunting unique in the accounting software space is it’s not a SaaS app, you download it and run it on the server setup of your choice. This gives you full control over all your financial
                        data and keeps you from having to share it, like many of the other big name accounting software.',
             'user_id' => '1',
             'imglink' => 'images/post-3.png',
             'biglink' => 'images/big-post-3.png',
             'link_rewrite' => 'Akaunting-Free-Accounting-Software',
             'created_at' => Carbon::createFromFormat('Y-m-d H', '2018-06-21 22')->toDateTimeString(),
             'updated_at' => Carbon::createFromFormat('Y-m-d H', '2018-06-21 22')->toDateTimeString(),
           ],
         ]);
     }
}
