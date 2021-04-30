<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Infrastructure\Application;

use Sik0r\TennisReservation\Application\CommandBusInterface;
use Sik0r\TennisReservation\Application\Commands\CommandInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class CommandBus implements CommandBusInterface
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function dispatch(CommandInterface $command): void
    {
        $this->bus->dispatch($command);
    }
}
