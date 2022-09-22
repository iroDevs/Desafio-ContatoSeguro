<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Registro extends Model implements AuthenticatableContract, AuthorizableContract
{

    
    use Authenticatable, Authorizable, HasFactory;

    //Desabilita o controle do creat_At e updatede_at assim tenho que gerir manualmente
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','type', 'message','deleted',"is_identified","whistleblower_name","whistleblower_birth","created_at"

    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
}
