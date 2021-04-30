<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Web\Listeners;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class RequestDecodeListener
{
    private const JSON_CONTENT_TYPE = 'json';

    public function __invoke(RequestEvent $event): void
    {
        $request = $event->getRequest();
        if (!$this->supports($request)) {
            return;
        }

        $this->transform($request);
    }

    private function supports(Request $request): bool
    {
        if ($request->getContentType() !== self::JSON_CONTENT_TYPE) {
            return false;
        }

        return !empty($request->getContent());
    }

    private function transform(Request  $request): void
    {
        $content = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
        $request->request->replace($content);
    }
}
