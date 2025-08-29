<?php

namespace App\Enums;

enum GalleryType: string
{
    case club = 'club';
    case chess = 'chess';
    case tabletop = 'tabletop';
    case sports = 'sports';
    case comp_dev = 'comp_dev';

    public function nav_title(): string
    {
        return self::matcher($this->value);
    }

    public static function title(string $type): string
    {
        return self::matcher($type);
    }

    private static function matcher($arg): string
    {
        return match ($arg) {
            self::club->value => '🏛️ Клуб',
            self::chess->value => '♟️ Шахи',
            self::tabletop->value => '🎲 Настільні ігри',
            self::sports->value => '⚽ Спорт',
            self::comp_dev->value => '💡 Розумаха',
        };
    }

    public static function isTournament(self $type): bool
    {
        return match ($type) {
            self::tabletop, self::chess, self::sports => true,
            default => false,
        };
    }
}
