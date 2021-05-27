<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Infrastructure\Domain\Validators\Unique;

use Symfony\Component\Validator\Constraint;

class UniqueEntity extends Constraint
{
    public array $fields;
    public string $entityClass;
}
