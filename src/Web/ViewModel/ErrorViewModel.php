<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Web\ViewModel;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Exception\ValidationFailedException;
use Symfony\Component\Validator\ConstraintViolationInterface;

class ErrorViewModel
{
    private array $errors;

    private function __construct(array $errors)
    {
        $this->errors = $errors;
    }

    public static function fromValidation(ValidationFailedException $exception): self
    {
        $errors = [];
        /** @var ConstraintViolationInterface $item */
        foreach ($exception->getViolations() as $item) {
            $errors[] = [
                'propertyPath' => $item->getPropertyPath(),
                'message' => $item->getMessage()
            ];
        }

        return new self($errors);
    }

    public function errors(): array
    {
        return [
            'errors' => $this->errors,
            'status' => Response::HTTP_CONFLICT,
        ];
    }
}
