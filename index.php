<?php
error_reporting(E_ALL);
ini_set("display_errors", true);
require './vendor/autoload.php';
use App\File\File;
use App\Storage\StorageFactory;
use App\RescaleService\RescaleService;
$filePatch = $argv[1];
$saveType = $argv[2];
$file = new File($filePatch);
$storageFactory = new StorageFactory();
$storage = $storageFactory->create($saveType);
$rescaleService = new RescaleService();
echo $rescaleService->rescale($file, $storage);
