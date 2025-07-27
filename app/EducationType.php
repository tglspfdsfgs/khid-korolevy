<?php

namespace App;

/** TODO: add casts to model
 * protected $casts = [
 *  'education_type' => EducationType::class,
 * ];.
 * */
enum EducationType: string
{
    case beginners = 'beginners';
    case adults = 'adults';
    case individual = 'individual';
    case group = 'group';

    /**
     * @throws \Exception
     */
    public function to_string(): string
    {
        return self::matcher($this);
    }

    /**
     * @throws \Exception
     */
    public static function stringify(EducationType $type): string
    {
        return self::matcher($type);
    }

    /**
     * @throws \Exception
     */
    private static function matcher($arg): string
    {
        return match ($arg) {
            self::beginners => '🌱 Заняття для початківців',
            self::adults => '🎓 Заняття для дорослих',
            self::individual => '👤 Індивідуальні заняття',
            self::group => '👥️ Групові заняття',
            default => throw new \Exception('No education type found'),
        };
    }
}
