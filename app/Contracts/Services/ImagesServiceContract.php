<?php

namespace App\Contracts\Services;

use App\Models\Image;
use Illuminate\Http\UploadedFile;

interface ImagesServiceContract
{
    public function saveFile(UploadedFile | string $file): string;

    public function createFile(UploadedFile | string $file): Image;

    public function url(string $path): string;

    public function deleteFile(Image | int $image): void;
}
