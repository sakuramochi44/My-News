<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //laravel17で追記
    protected $table = 'news_histories';
    public static $rules = array(
      'news_id' => 'required',
      'edited_at' => 'required',
      );
    public function news()
    {
        return ('App\News');
    }
}
