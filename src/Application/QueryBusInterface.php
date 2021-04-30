<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Application;

use Sik0r\TennisReservation\Application\Queries\QueryInterface;

interface QueryBusInterface
{
    public function handle(QueryInterface $query): mixed;
}
