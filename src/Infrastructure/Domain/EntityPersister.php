<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Infrastructure\Domain;

use Doctrine\ORM\EntityManagerInterface;
use Sik0r\TennisReservation\Domain\EntityInterface;
use Sik0r\TennisReservation\Domain\EntityPersisterInterface;

class EntityPersister implements EntityPersisterInterface
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function add(EntityInterface $entity): void
    {
        $this->em->persist($entity);
    }
}
