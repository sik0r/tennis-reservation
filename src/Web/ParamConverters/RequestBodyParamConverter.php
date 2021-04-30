<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Web\ParamConverters;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Sik0r\TennisReservation\Application\Commands\CommandInterface;
use Symfony\Component\HttpFoundation\Request;

class RequestBodyParamConverter implements ParamConverterInterface
{
    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $commandClass = $configuration->getClass();
        $command = $commandClass::create($request->request->all());

        $request->attributes->set($configuration->getName(), $command);

        return true;
    }

    public function supports(ParamConverter $configuration): bool
    {
        return in_array(CommandInterface::class, class_implements($configuration->getClass()));
    }
}
