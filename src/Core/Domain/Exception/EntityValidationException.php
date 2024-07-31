<?php

namespace Core\Domain\Exception;

use Exception;

class EntityValidationException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
