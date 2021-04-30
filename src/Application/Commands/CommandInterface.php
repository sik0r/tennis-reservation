<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Application\Commands;

interface CommandInterface
{
    public static function create(array $params): self;
}
