<?php

namespace App\Enums;

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

    public function option_title(): string
    {
        return match ($this) {
            self::chess => '♟️ Шаховий',
            self::tabletop => '🎲 Настільний',
            self::sports => '⚽ Спортивний',
        };
    }

    public function nav_title(): string
    {
        return match ($this) {
            self::chess => '♟️ Шахові',
            self::tabletop => '🎲 Настільні',
            self::sports => '⚽ Спортивні',
        };
    }
}
