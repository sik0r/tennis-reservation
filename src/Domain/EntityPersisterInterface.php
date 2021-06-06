<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Domain;

interface EntityPersisterInterface
{
    public function add(EntityInterface $entity): void;
}
