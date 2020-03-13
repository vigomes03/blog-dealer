<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{    

    public function create_data($title,$img,$body,$id_user){

        $this->title   = $title;
        $this->img     = $img;
        $this->body    = $body;
        $this->id_user = $id_user;

        $this->save();

    }

    public function update_data($title,$img,$body){

        $this->title   = $title;
        $this->img     = $img;
        $this->body    = $body;

        $this->save();

    }

    public function dalete_data(){

        $this->status = "I";

        $this->save();

    }

}
