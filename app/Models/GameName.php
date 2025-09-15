<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameName extends Model
{
    /** @use HasFactory<\Database\Factories\GameNameFactory> */
    use HasFactory;

    /**
     * Get the Game that owns the GameName
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Game(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}
