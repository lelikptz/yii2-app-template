<?php

namespace components\posts\dto;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class Post
 */
class Post extends DataTransferObject
{
    public int $id;
    public string $title;
    public int $userId;
    public bool $completed;
}
