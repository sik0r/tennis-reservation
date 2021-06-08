<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Web\Listeners;

use Psr\Log\LoggerInterface;
use Sik0r\TennisReservation\Web\ViewModel\ErrorViewModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\Messenger\Exception\ValidationFailedException;
use Throwable;

class ExceptionListener
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(ExceptionEvent $event): void
    {
        if (!$this->supports($event->getRequest())) {
            return;
        }

        $throwable = $event->getThrowable();
        $response = new JsonResponse($this->parseException($throwable), $this->prepareCode($throwable));

        $event->allowCustomResponseCode();
        $event->setResponse($response);

        $this->logger->error($throwable->getMessage(), [
            'status' => $response->getStatusCode(),
            'code' => $throwable->getCode(),
            'file' => $throwable->getFile(),
            'line' => $throwable->getLine(),
            'stacktrace' => $throwable->getTraceAsString(),
        ]);
    }

    private function supports(Request $request): bool
    {
        return $request->getContentType() === 'json';
    }

    private function parseException(Throwable $throwable): array
    {
        switch (get_class($throwable)) {
            case ValidationFailedException::class:
                return ErrorViewModel::fromValidation($throwable)->errors();
            default:
                return [
                    'message' => $throwable->getMessage(),
                    'status' => $throwable->getCode()
                ];
        }
    }

    private function prepareCode(Throwable $throwable): int
    {
        switch (get_class($throwable)) {
            case ValidationFailedException::class:
                return Response::HTTP_CONFLICT;
            default:
                return $throwable->getCode() > 99 ? $throwable->getCode() : Response::HTTP_INTERNAL_SERVER_ERROR;
        }
    }
}
