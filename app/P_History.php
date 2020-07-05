<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class P_History extends Model
{
    //historiesテーブルのProfile＿Histories
    protected $table = 'profile_histories';
    public static $rules = array(
      'profile_id' => 'required',
      'edited_at' => 'required',
      );
    public function profile()
    {
        return ('App\Profile');
    }
}
