<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Application;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): void;
}
