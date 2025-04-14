<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Image extends Model
{
    use HasFactory;

    public const STORAGE_DISK = 'public';

    protected $fillable = ['path'];

    public function url(): Attribute
    {
        return Attribute::get(fn () =>
            $this->path ? Storage::disk(self::STORAGE_DISK)->url($this->path) : null
        );
    }
}
