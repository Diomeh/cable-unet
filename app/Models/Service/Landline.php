<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;

class Landline extends Model
{
    protected $table = 'service_landline';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description', 
        'id_created_by', 
        'phone_number',
        'price'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
}
