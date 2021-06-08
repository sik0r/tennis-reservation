<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Application\Player\CreatePlayer;

use Sik0r\TennisReservation\Application\CommandHandlerInterface;
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
            $command->username(),
            $command->email(),
            PasswordEncoder::encode($command->password())
        );

        $this->persister->add($player);
    }
}
