<?php

namespace App;

/** TODO: add casts to model
 * protected $casts = [
 *  'tournament_type' => TournamentType::class,
 * ];.
 * */
enum TournamentType: string
{
    case chess = 'chess';
    case tabletop = 'tabletop';
    case sports = 'sports';

    public function uk_translation(): string
    {
        return match ($this) {
            self::chess => '♟️ Шаховий',
            self::tabletop => '🎲 Настільний',
            self::sports => '⚽ Спортивний',
        };
    }
}
