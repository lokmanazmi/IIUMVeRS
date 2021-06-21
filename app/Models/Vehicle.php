<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    protected $fillable = [
        'username',
        'plateno',
        'type',
        'colour',
        'brand',
        'model',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'date_created' => 'datetime',
    ];


    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'username');
    }

    public function vehreg()
    {
        return $this->hasMany(Vehreg::class, 'plateno');
    }

    
}
