<?php

namespace App\Storage\Definition;

use App\Storage\Storage;

class HddStorage implements Storage
{
    private $dst = "/tmp/";

    /**
     * @param string $src
     * @return bool
     */
    public function save(string $src): bool
    {
        copy($src, $this->createNewPath($src));
        return true;
    }

    private function createNewPath(string $src): string
    {
        $fileName = end(explode("/", $src));
        $file = explode(".", $fileName);
        return $this->dst . $file[0] . "-mini" . "." . $file[1];
    }
}