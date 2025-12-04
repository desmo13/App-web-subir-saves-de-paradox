<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameTag extends Model
{
    /** @use HasFactory<\Database\Factories\GameTagFactory> */
    use HasFactory;

    protected $fillable = [
        'tag',
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_game_tag', 'game_tag_id', 'game_id');
    }

}
