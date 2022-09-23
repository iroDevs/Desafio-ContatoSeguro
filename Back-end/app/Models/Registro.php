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

    
    public $timestamps = ["created_at","id"]; //A tabela possui apenas o create_at entao o update at deve ser nulo
    const UPDATED_AT = null; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'message','deleted',"is_identified","whistleblower_name","whistleblower_birth"

    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
}
