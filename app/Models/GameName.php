<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class GameName extends Model
{
    /** @use HasFactory<\Database\Factories\GameNameFactory> */
    use HasFactory;


    protected $fillable = [
        'name',
    ];
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
