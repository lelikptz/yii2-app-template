<?php

namespace infrastructure\services;

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use ReflectionClass;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;

/**
 * Class BaseService
 */
abstract class BaseService
{
    private ?ContainerInterface $container = null;

    protected function container(): ContainerInterface
    {
        if (null === $this->container) {
            $componentClass = (new ReflectionClass($this))->getFileName();
            $infrastructureClass = (new ReflectionClass(self::class))->getFileName();

            if (false === $componentClass || false === $infrastructureClass) {
                throw new NoFileException('DI build error');
            }

            $componentConfig = include dirname($componentClass) . '/../config/container.php';
            $infrastructureConfig = include dirname($infrastructureClass) . '/../config/container.php';

            $builder = new ContainerBuilder();
            $builder->addDefinitions($componentConfig, $infrastructureConfig);
            $this->container = $builder->build();
        }

        return $this->container;
    }
}
