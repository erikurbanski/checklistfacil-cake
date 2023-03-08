<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_cake',
        'weight_cake',
        'value',
        'quantity'
    ];

    public function hasClients(){
        return $this->hasMany(Client::class);
    }

}
