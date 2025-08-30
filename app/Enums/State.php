<?php

namespace App\Enums;

enum State: string
{
    case published = 'published';
    case draft = 'draft';
    case deleted = 'deleted';

    /**
     * Checks if the current state is actual:
     * $state->isCurrState()
     *
     * @return bool
     */
    public function __call(string $name, array $arguments)
    {
        foreach (self::cases() as $case) {
            if ($name === 'is'.ucfirst($case->name)) {
                return $case->name === $this->value;
            }
        }
        throw new \BadMethodCallException('Call to undefined method '.self::class."::$name()");
    }

    public static function action(State $state): string
    {
        return match ($state) {
            self::published => 'publish',
            self::draft => 'draft',
            self::deleted => 'delete',
        };
    }

    public function isVisible(): bool
    {
        return 'published' === $this->value;
    }

    public function toUkrainian(): string
    {
        return match ($this) {
            self::published => 'опубліковано',
            self::draft => 'в чорновиках',
            self::deleted => 'видалено',
        };
    }
}
