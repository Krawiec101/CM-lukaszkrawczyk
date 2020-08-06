<?php

namespace App\File;

class File
{
    private $src;

    public function __construct(string $src)
    {
        $this->src = $src;
    }

    /**
     * @return string
     */
    public function getSrc(): string
    {
        return $this->src;
    }
}