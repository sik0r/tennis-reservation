<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Infrastructure\Application;

use Sik0r\TennisReservation\Application\QueryInterface;
use Sik0r\TennisReservation\Application\QueryBusInterface;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class QueryBus implements QueryBusInterface
{
    use HandleTrait {
        handle as doHandle;
    }

    public function __construct(MessageBusInterface $queryBus)
    {
        $this->messageBus = $queryBus;
    }

    public function handle(QueryInterface $query): mixed
    {
        return $this->doHandle($query);
    }
}
