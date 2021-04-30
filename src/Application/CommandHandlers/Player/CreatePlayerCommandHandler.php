<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Application\CommandHandlers\Player;

use Doctrine\ORM\EntityManagerInterface;
use Sik0r\TennisReservation\Application\CommandHandlers\CommandHandlerInterface;
use Sik0r\TennisReservation\Application\Commands\Player\CreatePlayerCommand;
use Sik0r\TennisReservation\Domain\Entity\Player;

class CreatePlayerCommandHandler implements CommandHandlerInterface
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(CreatePlayerCommand $command): void
    {
        $player = new Player(
            $command->getEmail(),
            $command->getUsername(),
            password_hash($command->getPassword(), PASSWORD_ARGON2I)
        );

        $this->em->persist($player);
    }
}
