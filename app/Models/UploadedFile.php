<?php

namespace App\Models;

use App\Tools\Pdf;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadedFile extends Model
{
    public $timestamps = false;

    protected $appends = ['url'];

    protected $guarded = [];

    protected static function booted() {
        static::creating(function ($uploadedFile) {
            $info = pathinfo($uploadedFile->path);
            $uploadedFile->ext = strtolower($info['extension']);
            if (in_array($uploadedFile->ext, ['jpg', 'jpeg', 'png'])) {
                $uploadedFile->createImageThumbnails();
            } else if ($uploadedFile->ext === 'pdf') {
                $uploadedFile->createPdfThumbnails();
            }
        });

        static::deleted(function ($uploadedFile) {
            if ($uploadedFile->medium_path) {
                Storage::delete($uploadedFile->medium_path);
            }
            if ($uploadedFile->thumbnail_path) {
                Storage::delete($uploadedFile->thumbnail_path);
            }
            Storage::delete($uploadedFile->path);
        });
    }

    public function createImageThumbnails() {
        $absolutePath = Storage::path($this->path);
        $img = Image::make($absolutePath)->orientate();
        $options = function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        };
        $img->resize(600, 600, $options);
        $this->medium_path = "$this->path.medium.$this->ext";
        Storage::put($this->medium_path, $img->encode());
        $img->resize(100, 100, $options);
        $this->thumbnail_path = "$this->path.thumbnail.$this->ext";
        Storage::put($this->thumbnail_path, $img->encode());
    }

    public function createPdfThumbnails() {
        $pdf = new Pdf(Storage::path($this->path));
        $path = "$this->path.preview.jpg";
        $absolutePath = Storage::path($path);
        if ($pdf->toJpg($absolutePath)) {
            $this->medium_path = $path;
        }
    }

    public function getUrlAttribute(){
        return Storage::url($this->path);
    }

}
