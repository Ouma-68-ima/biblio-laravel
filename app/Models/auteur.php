<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class auteur extends Model
{
    protected $fillable = ['nom','prenom','email',
    'date_naissance','nationalite','actif'];

    protected $casts = [
    'date_naissance' => 'date',
    'actif' => 'boolean',
    ];

    public function livres()
    {
    return $this -> hasMany(livre::class, 'auteurs_id');
    }
}
