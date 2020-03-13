<?php

namespace App\Http\Controllers;

use Auth;
use DateTime;
use App\User;
use App\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function list_users(Request $request) {

        if (Auth::check()) {
        	if (Auth::user()->is_admin == "Y") {
		        // GET
		        $users = User::where('status',  'A')->get();
		        return view('list-users', ["users" => $users]);

	        } else {
	            return redirect()->to('/');
	        }

        } else {
            return redirect()->to('/');

        }

    }


    public function update_user(Request $request) {

        if (Auth::check()) {

            $data           = $request->all();
            if (array_key_exists("id_update_user",$data)) {
            	$id_update_user = $data["id_update_user"];
            } else {
            	$id_update_user = Auth::user()->id;
            }

            $user = \App\User::find($id_update_user);

            if (Auth::user()->is_admin == "Y" || Auth::user()->id == $user->id) {
                return view('update-user', ["user" => $user]);
            }

            return redirect()->to('/');

        } else {
            return redirect()->to('/');
        }

    }


    public function save_update_user(Request $request) {

        if (Auth::check()) {

            $data     = $request->all();
            $id_user  = $data["id_user"];
            $name     = $data["name"];
            $password = $data["password"];

            $user = \App\User::find($id_user);

            if (Auth::user()->is_admin == "Y" || Auth::user()->id == $user->id) {
                $user->update_data($name,$password);
            }

            return redirect()->to('/');

        } else {

            return redirect()->to('/');

        }

    }

}
