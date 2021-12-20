<?php

namespace Interworx;

class WorxBase
{
    /**
     * @var Interworx
     */
    protected $parent;

    public function __construct($parent)
    {
        $this->parent = $parent;
    }

}
