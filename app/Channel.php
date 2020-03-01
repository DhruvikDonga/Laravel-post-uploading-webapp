<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //
    protected $table = 'channels';

    public $primarkey = 'id';

    public $timestamps = 'true';


    public function user(){
    	return $this->belongsTo('App\Channel');
    }
}
