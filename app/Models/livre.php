<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class livre extends Model
{
    protected $fillable = [ 'auteurs_id','titre','isbn','prix','stock',
    'date_publication','disponible'
    ];

    protected $casts = [
    'prix' => 'decimal:2',
    'stock' => 'integer',
    'date_publication' => 'date',
    'disponible' =>'boolean',
    ];

    public function auteur()
    {
    return $this->belongsTo(auteur::class, 'auteurs_id', 'id');
    }
}
