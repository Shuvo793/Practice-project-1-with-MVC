<?php


namespace App\Models\FrontEnd;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    public $timestamps;
    protected $dates=[
        'created_at'
    ];
    protected $guarded=['reset_token'];

}