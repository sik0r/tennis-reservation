<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Application;

interface QueryBusInterface
{
    public function handle(QueryInterface $query): mixed;
}
