<?php

namespace Interworx;

/**
 * Class InterworxException
 *
 * @package Interworx
 */
class InterworxException extends \Exception
{
    /**
     * @return string
     */
    public function errorMessage(): string
    {
        return $this->getMessage();
    }
}