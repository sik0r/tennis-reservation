<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Application\Commands\Player;

use Ramsey\Uuid\UuidInterface;
use Sik0r\TennisReservation\Application\Commands\CommandInterface;

class CreatePlayerCommand implements CommandInterface
{
    private UuidInterface $playerId;
    private ?string $username;
    private ?string $email;
    private ?string $password;
    private ?string $confirmPassword;

    public function __construct(UuidInterface $playerId, ?string $username, ?string $email, ?string $password, ?string $confirmPassword)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->playerId = $playerId;
    }

    public function playerId(): UuidInterface
    {
        return $this->playerId;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getConfirmPassword(): ?string
    {
        return $this->confirmPassword;
    }
}
