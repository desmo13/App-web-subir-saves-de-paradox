<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'public',
        'user_id',
        'game_name_id',
        'file_name',
        'path',
        'number_of_downloads',
        'favorite',
    ];
    /**
     * Get the user that owns the Game
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Get the GameName that owns the Game
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game_name(): BelongsTo
    {
        return $this->belongsTo(GameName::class, 'game_name_id');
    }

    public function gameTags()
    {
        return $this->belongsToMany(GameTag::class, 'game_game_tag', 'game_id', 'game_tag_id');
    }
}
