<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Season;
use Illuminate\Database\Eloquent\Builder;

class Episode extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['number'];

    public function seasons()
    {
        return $this->belongsTo(Season::class);
    }

    // Escopo local
    // public function scopeWatched (Builder $query)
    // {
    //     $query->where('watched', true);
    // }
}
