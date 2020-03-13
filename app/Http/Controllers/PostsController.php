<?php

namespace App\Http\Controllers;

use Auth;
use DateTime;
use App\User;
use App\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller {



    public function list_posts(Request $request) {

        $data = $request->all();

        // GET
        $posts = Posts::where('status',  'A')->get();

        foreach ($posts as $post) {            
            $author = \App\User::find($post->id_user);
            $post->author = $author->name;
        }

        return view('index', ["posts" => $posts]);

    }

    public function new_post(Request $request) {

        if (Auth::check()) {

            return view('new-post');

        } else {

            return redirect()->to('/');

        }

    }

    public function save_post(Request $request) {

        if (Auth::check()) {

            $data    = $request->all();

            $title   = $data["title"];
            $body    = $data["body"];
            $id_user = Auth::user()->id;

            if (array_key_exists("img",$data)) {
                if ($data['img'] != null) {
                    $img = $data['img'];
                    $extension = $img->getClientOriginalExtension();
                    $name      = uniqid(date('HisYmd'));             
                    $nameFile  =  "img".Auth::user()->id."{$name}.{$extension}";      
                    // Faz o upload:
                    $upload = $img->storeAs('public', $nameFile);
                    $img = "/storage/".$nameFile;
                }
            } else {
                $img = null;
            }

            $new_post = new \App\Posts();
            $new_post->create_data($title,$img,$body,$id_user);            

            return redirect()->to('/');

        } else {

            return redirect()->to('/');

        }

    }

    public function update_post(Request $request) {

        if (Auth::check()) {

            $data    = $request->all();
            $id_update = $data["id_update"];

            $post = \App\Posts::find($id_update);

            if (Auth::user()->is_admin == "Y" || Auth::user()->id == $update_post->id_user) {
                return view('update-post', ["post" => $post]);
            }

            return redirect()->to('/');

        } else {

            return redirect()->to('/');

        }

    }

    public function save_update_post(Request $request) {

        if (Auth::check()) {

            $data    = $request->all();
            $id_post = $data["id_post"];
            $title   = $data["title"];
            $body    = $data["body"];

            $update_post = \App\Posts::find($id_post);

            if (array_key_exists("img",$data)) {
                if ($data['img'] != null) {
                    $img = $data['img'];
                    $extension = $img->getClientOriginalExtension();
                    $name      = uniqid(date('HisYmd'));             
                    $nameFile  =  "img".Auth::user()->id."{$name}.{$extension}";      
                    // Faz o upload:
                    $upload = $img->storeAs('public', $nameFile);
                    $img = "/storage/".$nameFile;
                }
            } else {
                $img = $update_post->img;
            }


            if (Auth::user()->is_admin == "Y" || Auth::user()->id == $update_post->id_user) {
                $update_post->update_data($title,$img,$body);
            }

            return redirect()->to('/');

        } else {

            return redirect()->to('/');

        }

    }

    public function remove_post(Request $request) {

        if (Auth::check()) {

            $data    = $request->all();
            $id_remove = $data["id_remove"];

            $update_post = \App\Posts::find($id_remove);

            if (Auth::user()->is_admin == "Y" || Auth::user()->id == $update_post->id_user) {
                $update_post->dalete_data();
            }

            return redirect()->to('/');

        } else {

            return redirect()->to('/');

        }

    }

}
