<?php
declare(strict_types=1);

namespace Sik0r\TennisReservation\Web\ParamConverters;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Sik0r\TennisReservation\Web\Request\RequestInterface;
use Symfony\Component\HttpFoundation\Request;

class RequestBodyParamConverter implements ParamConverterInterface
{
    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $class = $configuration->getClass();
        $result = call_user_func([$class, 'fromRequest'], $request);
        if (!$result instanceof RequestInterface) {
            return false;
        }

        $request->attributes->set($configuration->getName(), $result);

        return true;
    }

    public function supports(ParamConverter $configuration): bool
    {
        return in_array(RequestInterface::class, class_implements($configuration->getClass()));
    }
}
