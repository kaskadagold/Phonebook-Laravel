<?php

namespace App\Services;

use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Repositories\ImagesRepositoryContract;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImagesService implements ImagesServiceContract
{
    public function __construct(
        private readonly string $disk,
        private readonly ImagesRepositoryContract $imagesRepository,
    ) {
    }

    public function saveFile(UploadedFile | string $file): string
    {
        if (is_string($file)) {
            $file = new File($file);
        }
        return Storage::disk($this->disk)->putFile('', $file);
    }

    public function createFile(UploadedFile | string $file): Image
    {
        return $this->imagesRepository->create($this->saveFile($file));
    }

    public function url(string $path): string
    {
        return Storage::disk($this->disk)->url($path);
    }

    /**
     * Удаление изображения
     * @param \App\Models\Image|int $image
     * @return void
     */
    public function deleteFile(Image | int $image): void
    {
        if (!($image instanceof Image)) {
            $image = $this->imagesRepository->getById($image);
        }

        Storage::disk($this->disk)->delete($image->path);
        $this->imagesRepository->delete($image->id);
    }
}
