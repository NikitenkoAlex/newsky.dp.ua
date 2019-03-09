<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'created_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function present()
    {
        return $this->name.' '.$this->email. ' register at'.$this->created_at;
    }
}
