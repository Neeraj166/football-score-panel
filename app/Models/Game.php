<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $table = 'games';

    protected $dates = ['deleted_at'];

    protected $fillable = ['team_a_id', 'team_a', 'team_a_score', 'team_b_id', 'team_b', 'team_b_score', 'venue', 'weather', 'status', 'date_time', 'winner', 'official', 'referee', 'first_linesmen', 'second_linesmen'];
}
