<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class GameName extends Model
{
    /** @use HasFactory<\Database\Factories\GameNameFactory> */
    use HasFactory;


    protected $fillable = [
        'name',
    ];

    /**
     * Get the games that owns the GameName
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'game_name_id');
    }
}
