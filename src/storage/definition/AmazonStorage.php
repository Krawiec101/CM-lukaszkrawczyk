<?php
namespace App\Storage\Definition;

use App\Storage\Storage;

class  AmazonStorage implements Storage
{
    /**
     * @param string $src
     */
    public function save(string $src): bool {
        //save on disc
    }
}