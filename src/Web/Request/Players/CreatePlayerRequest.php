<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Web\Request\Players;

use Sik0r\TennisReservation\Web\Request\RequestInterface;
use Symfony\Component\HttpFoundation\Request;

class CreatePlayerRequest implements RequestInterface
{
    private ?string $username;
    private ?string $email;
    private ?string $password;
    private ?string $confirmPassword;

    public static function fromRequest(Request $request): static
    {
        $self = new self();
        $self->username = $request->get('username');
        $self->email = $request->get('email');
        $self->password = $request->get('password');
        $self->confirmPassword = $request->get('confirmPassword');

        return $self;
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
