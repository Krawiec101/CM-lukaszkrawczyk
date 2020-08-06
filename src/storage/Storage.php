<?php

namespace App\Storage;

interface Storage
{
    /**
     * @param string $src
     * @return bool
     */
    public function save(string $src): bool;
}