<?php
/**
 * Created by PhpStorm.
 * User: haroldport
 * Date: 17/05/17
 * Time: 23:02
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    public function likes()
    {
        return $this->hasMany('App\Like', 'post_id');
    }
}