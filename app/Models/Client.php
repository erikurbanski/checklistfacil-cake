<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'cake_id',
        'name_client',
        'email_client',
        'email_sent'
    ];

    protected $attributes = [
        'email_sent' => 0,
    ];

    public function cake(){
        return $this->belongsTo(Cake::class);
    }

}
