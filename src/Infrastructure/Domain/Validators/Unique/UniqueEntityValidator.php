<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Infrastructure\Domain\Validators\Unique;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class UniqueEntityValidator extends ConstraintValidator
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof UniqueEntity) {
            throw new UnexpectedValueException($constraint, UniqueEntity::class);
        }
        if ($value === null) {
            return;
        }

        if ($this->isPropertyTaken($value, $constraint)) {
            $this->context->addViolation('This value is already used.');
        }
    }

    private function isPropertyTaken($value, UniqueEntity $constraint): bool
    {
        $criteria = [];
        foreach ($constraint->fields as $field) {
            $criteria[$field] = $value;
        }

        $result = $this->em->getRepository($constraint->entityClass)
            ->findOneBy($criteria);

        return $result !== null;
    }
}
