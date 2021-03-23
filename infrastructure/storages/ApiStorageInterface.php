<?php

namespace infrastructure\storages;

/**
 * Interface ApiStorageInterface
 */
interface ApiStorageInterface
{
    public function get(string $url, array $params = []): array;

    public function all(string $url, array $params = []): array;
}
