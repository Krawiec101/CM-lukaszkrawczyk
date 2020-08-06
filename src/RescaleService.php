<?php

namespace App\RescaleService;

use App\File\File;
use App\Storage\Storage;

class RescaleService
{
    protected $scaleFactor = 150;
    private $temporaryFilePath = "/tmp/mini.png";

    public function rescale(file $file, storage $storage): bool
    {

        $srcFile = $file->getSrc();
        $srcSize = getimagesize($srcFile);
        $scale = $this->calculateScale($srcSize);
        $newWidth = $srcSize[0] * $scale;
        $newHeight = $srcSize[1] * $scale;
        $im = $this->getImage($srcFile, $srcSize['mime']);
        $im2 = imagescale($im, $newWidth, $newHeight);
        imagepng($im2, $this->temporaryFilePath);
        return $storage->save($this->temporaryFilePath);
    }

    protected function getImage(string $srcFile, string $type)
    {
        switch ($type) {
            case "image/png":
                $im = imagecreatefrompng($srcFile);
                break;
            case "image/jpeg":
                $im = imagecreatefromjpeg($srcFile);
                break;
            default:
                throw new \Exception(sprintf(('Niezarejestrowany typ pliku : %s'), $type));
                break;
        }
        return $im;
    }

    protected function calculateScale(array $srcSize): float
    {
        $bigger = $srcSize[0] <=> $srcSize[1];
        if (in_array($bigger, [0, 1])) {
            $scale = $this->scaleFactor / $srcSize[0];
        } else {
            $scale = $this->scaleFactor / $srcSize[1];
        }
        return $scale;
    }
}