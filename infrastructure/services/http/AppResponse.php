<?php

namespace infrastructure\services\http;

/**
 * Class Response
 */
class AppResponse
{
    private array $data;

    /**
     * ResponseModel constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return [
            'success' => true,
            'data' => $this->data,
        ];
    }
}
