<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Application\Commands\Player;

use Sik0r\TennisReservation\Application\Commands\CommandInterface;

class CreatePlayerCommand implements CommandInterface
{
    private ?string $username;
    private ?string $email;
    private ?string $password;
    private ?string $confirmPassword;

    private function __construct(?string $username, ?string $email, ?string $password, ?string $confirmPassword)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }

    public static function create(array $params): self
    {
        return new self(
            $params['username'],
            $params['email'],
            $params['password'],
            $params['confirmPassword']
        );
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
