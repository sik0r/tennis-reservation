<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Application;

use Sik0r\TennisReservation\Application\Commands\CommandInterface;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): void;
}
