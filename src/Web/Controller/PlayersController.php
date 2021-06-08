<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Web\Controller;

use Ramsey\Uuid\Uuid;
use Sik0r\TennisReservation\Application\CommandBusInterface;
use Sik0r\TennisReservation\Application\Player\CreatePlayer\CreatePlayerCommand;
use Sik0r\TennisReservation\Web\Request\Players\CreatePlayerRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayersController extends AbstractController
{
    private CommandBusInterface $commandBus;

    public function __construct(CommandBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    #[Route('/api/players', name: 'create_player', methods: ['POST'])]
    public function createAction(CreatePlayerRequest $request): JsonResponse
    {
        $command = new CreatePlayerCommand(
            Uuid::uuid4(),
            $request->getUsername(),
            $request->getEmail(),
            $request->getPassword(),
            $request->getConfirmPassword()
        );

        $this->commandBus->dispatch($command);

        return new JsonResponse(null, Response::HTTP_CREATED, [
            'location' => "api/players/{$command->username()}"
        ]);
    }
}
