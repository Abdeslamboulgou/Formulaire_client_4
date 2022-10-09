<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulaire_user extends Model
{
    use HasFactory;


    protected $table = 'formulaire_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'codePostal',
        'city',
        'adress',
        'message',
        'type',
    ];
}
