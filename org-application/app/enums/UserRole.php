<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Developer = 'developer';
    case Applicant = 'applicant';

    public function label(): string
    {
        return match ($this) {
            static::Admin => 'Administrator',
            static::Developer => 'Developer',
            static::Applicant => 'Applicant',
        };
    }
}
