<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Application\CommandHandlers\Player;

use Sik0r\TennisReservation\Application\CommandHandlers\CommandHandlerInterface;
use Sik0r\TennisReservation\Application\Commands\Player\CreatePlayerCommand;
use Sik0r\TennisReservation\Application\Services\PasswordEncoder;
use Sik0r\TennisReservation\Domain\EntityPersisterInterface;
use Sik0r\TennisReservation\Domain\Player\Player;

class CreatePlayerCommandHandler implements CommandHandlerInterface
{
    private EntityPersisterInterface $persister;

    public function __construct(EntityPersisterInterface $persister)
    {
        $this->persister = $persister;
    }

    public function __invoke(CreatePlayerCommand $command): void
    {
        $player = Player::create(
            $command->playerId(),
            $command->getUsername(),
            $command->getEmail(),
            PasswordEncoder::encode($command->getPassword())
        );

        $this->persister->add($player);
    }
}
