<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Domain\Entity;

use DateTimeImmutable;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Player
{
    private UuidInterface $id;
    private string $email;
    private string $username;
    private string $password;
    private DateTimeImmutable $createdAt;

    public function __construct(string $email, string $username, string $password)
    {
        $this->id = Uuid::uuid4();
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->createdAt = new DateTimeImmutable();
    }
}
