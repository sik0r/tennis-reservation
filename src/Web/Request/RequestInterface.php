<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Web\Request;

use Symfony\Component\HttpFoundation\Request;

interface RequestInterface
{
    public static function fromRequest(Request $request): static;
}
