<?php

namespace App;

trait GalleryTypeTrait
{
    public const CLUB = 'club';
    public const CHESS = 'chess';
    public const TABLETOP = 'tabletop';
    public const SPORTS = 'sports';
    public const COMP_DEV = 'comp_dev';

    /**
     * @throws \Exception
     */
    public static function gallery_title(string $title): string
    {
        return match ($title) {
            self::CLUB => '🏛️ Клуб',
            self::CHESS => '♟️ Шахи',
            self::TABLETOP => '🎲 Настільні ігри',
            self::SPORTS => '⚽ Спорт',
            self::COMP_DEV => '💡 Розумаха',
            default => throw new \Exception('No gallery navigator type found'),
        };
    }

    public static function getAllGalleryTypes(): array
    {
        $ref = new \ReflectionClass(GalleryTypeTrait::class);

        return $ref->getConstants();
    }
}
