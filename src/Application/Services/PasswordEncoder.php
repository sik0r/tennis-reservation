<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Application\Services;

class PasswordEncoder
{
    public static function encode(string $plainPassword): string
    {
        return password_hash($plainPassword, PASSWORD_ARGON2I);
    }

    public static function verify(string $plainPassword, string $hash): bool
    {
        return password_verify($plainPassword, $hash);
    }
}
