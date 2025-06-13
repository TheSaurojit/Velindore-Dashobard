<?php
namespace App\Helpers;


use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;


class FileUploader
{
    /**
     * @param UploadedFile $file The uploaded file instance.
     * @return string The file path if successful.
     */
    public static function upload(UploadedFile $file,  string $path = 'images')
    {
        $path = "uploads/$path";

        $fileName = Str::uuid() . "-" . $file->getClientOriginalName();
        $file->move(public_path($path), $fileName);


        // Return full absolute URL
        return url("/$path/$fileName");
    }
}
