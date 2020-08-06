<?php

namespace App\Storage;

class StorageFactory
{
    public function create(string $type)
    {
        $classname = sprintf("\\%s\\%s\\%s%s", __NAMESPACE__, 'Definition', ucfirst($type), "Storage");
        if (!class_exists($classname)) {
            throw new \Exception(sprintf(('Niezarejestrowany typ zapisu: %s'), $type));
        } else {
            $storage = new $classname();
        }

        return $storage;
    }
}