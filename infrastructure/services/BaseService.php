<?php

namespace app\infrastructure\services;

/**
 * Class BaseService
 */
abstract class BaseService
{
    /**
     * @return mixed
     */
    abstract protected function getEntityService();
}
