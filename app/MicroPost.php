<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MicroPost extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id'
    ];
    protected $table = 'micropost';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
