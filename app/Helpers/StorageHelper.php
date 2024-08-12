<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class StorageHelper
{
    /**
     ** Get url default file.
     *
     * @param $type
     * @return string
     */
    public static function getUrlDefaultFile($type)
    {
        $result = config('s3.setting.endpoint') . '/' . config('s3.setting.bucket') . '/' . 'default' . '/' . config('s3.default_file.' . $type);

        return $result;
    }

    /**
     ** Get url file.
     *
     * @param $file
     * @param $additionalPath
     * @return string
     */
    public static function getUrlFile($file, $additionalPath = null)
    {
        if ($additionalPath) {
            $result = Storage::disk('s3')->url($additionalPath . '/' . $file);
        } else {
            $result = Storage::disk('s3')->url($file);
        }

        return $result;
    }

    /**
     ** Upload file.
     *
     * @param $file
     * @param $additionalPath
     * @return string
     */
    public static function uploadFile($file, $additionalPath = null)
    {
        $timestamp = Carbon::now()->isoFormat('YYYYMMDDHHmmss');
        $uniqueSuffix = uniqid();
        $fileExtension = $file->getClientOriginalExtension();
        $filename = "{$timestamp}{$uniqueSuffix}.{$fileExtension}";

        if (!$additionalPath) {
            $additionalPath = '';
        }

        Storage::disk('s3')->putFileAs($additionalPath, $file, $filename);

        return $filename;
    }

    /**
     ** Delete file.
     *
     * @param $file
     * @param $additionalPath
     * @return void
     */
    public static function deleteFile($file, $additionalPath = null)
    {
        $pathFile = '';

        if ($additionalPath) {
            $pathFile = $pathFile . '/' . $additionalPath;
        }

        $pathFile = $pathFile . '/' . $file;
        $statusPath = Storage::disk('s3')->exists($pathFile);

        if ($statusPath) {
            Storage::disk('s3')->delete($pathFile);
        }
    }
}
