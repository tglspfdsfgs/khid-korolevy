<?php

namespace App;

/** TODO: add casts to model
 * protected $casts = [
 *  'tournament_type' => TournamentType::class,
 * ];.
 * */
enum EducationType: string
{
    case beginners = 'beginners';
    case adults = 'adults';
    case individual = 'individual';
    case group = 'group';

    public function to_string(): string
    {
        return match ($this) {
            self::beginners => '🌱 Заняття для початківців',
            self::adults => '🎓 Заняття для дорослих',
            self::individual => '👤 Індивідуальні заняття',
            self::group => '👥 Групові заняття',
        };
    }
}
