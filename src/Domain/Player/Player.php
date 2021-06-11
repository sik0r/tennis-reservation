<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Domain\Player;

use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;
use Sik0r\TennisReservation\Domain\EntityInterface;

class Player implements EntityInterface
{
    private UuidInterface $id;
    private string $email;
    private string $username;
    private string $password;
    private DateTimeImmutable $createdAt;

    private function __construct(UuidInterface $id, string $username, string $email, string $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->createdAt = new DateTimeImmutable();
    }

    public static function create(UuidInterface $id, string $username, string $email, string $password): self
    {
        return new self($id, $username, $email, $password);
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function password(): string
    {
        return $this->password;
    }
}
