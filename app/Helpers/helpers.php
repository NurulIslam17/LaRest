<?php

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\HttpCache\Store;

if (!function_exists('storeImage')) {

    if (!function_exists('storeImage')) {
        function storeImage($file, $folder = "images", $disk = "public", $returnUrl = true)
        {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs($folder, $fileName, $disk);

            return $returnUrl ? $path : $path;
        }
    }
}
