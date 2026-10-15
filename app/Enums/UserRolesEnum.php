<?php

declare(strict_types=1);

namespace App\Enums;

use Osama\LaravelEnums\Concerns\EnumTranslatable;

enum UserRolesEnum: string
{
    use EnumTranslatable;

    case STUDENT = 'student';
    case EMPLOYER = 'employer';
    case ADMIN = 'admin';
}
