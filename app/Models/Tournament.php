<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $table = 'tournaments';

    protected $fillable = ['name', 'year', 'date', 'venue', 'no_of_teams', 'remarks', 'status', 'tournamentType'];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
