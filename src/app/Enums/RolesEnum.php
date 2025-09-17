<?php

namespace App\Enums;

enum RolesEnum: string
{
    case SUPER_ADMINISTRATOR = 'super administrator';
    case ADMINISTRATOR = 'administrator';
    
    public function label(): string
    {
        return match ($this) {
            static::SUPER_ADMINISTRATOR => 'Super Administrator',
            static::ADMINISTRATOR => 'Administrator',
        };
    }
}
