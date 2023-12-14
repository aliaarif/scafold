<?php
namespace App\Traits;
use Image;
use Storage;
use Illuminate\Support\Str; 


trait ImageProcessing {

    public function getMime($mime){
        if($mime == 'image/jpeg')
            $extension = '.jpg';
        elseif($mime == 'image/png')
            $extension = '.png';
        elseif($mime == 'image/gif')
            $extension = '.gif';
        elseif($mime == 'image/svg+xml')
            $extension = '.svg';
        elseif($mime == 'image/tiff')
            $extension = '.tiff';
        elseif($mime == 'image/webp')
            $extension = '.webp';
        return $extension;
    }

    public function saveImage($image){
        $img = Image::make($image);
        $extension = $this->getMime($img->mime());
        $str_random = Str::random(7);
        $imagePath = $str_random.time().$extension;
        $img->save(storage_path('app/products').'/'.$imagePath);
        return $imagePath;
    }

    public function aspect4Resize($image, $width, $height){
        $img = Image::make($image);
        $extension = $this->getMime($img->mime());
        $str_random = Str::random(7);
        $img->resize($width, $height, function($constraint) {
            $constraint->aspectRatio();
        });
        $imagePath = $str_random.time().$extension;
        $img->save(storage_path('app/products').'/'.$imagePath);
        return $imagePath;
    }

    public function aspect4Height($image, $width, $height){
        $img = Image::make($image);
        $extension = $this->getMime($img->mime());
        $str_random = Str::random(7);
        $img->resize(null, $height, function($constraint) {
            $constraint->aspectRatio();
        });

        if($img->width() < $width){
            $img->resize($width, null);
        }elseif($img->width() > $width) {
            $img->crop($width, $height, 0, 0);
        }

        $imagePath = $str_random.time().$extension;
        $img->save(storage_path('app/products').'/'.$imagePath);
        return $imagePath;
    }


    public function saveImageAndThumbnail($theFile, $thumb = false){
        $dataX  = [];
        $dataX['image']  = $this->saveImage($theFile);

        if($thumb){
            $dataX['thumbnailsm'] = $this->aspect4Resize($theFile, 256, 144);
            $dataX['thumbnailmd'] = $this->aspect4Resize($theFile, 426, 240);
            $dataX['thumbnailxl'] = $this->aspect4Resize($theFile, 640, 360);
        }
        return $dataX;
    }


    public function deleteImage($filePath){
        if(is_file(Storage::disk('products')->path($filePath))){
            if(file_exists(Storage::disk('products')->path($filePath))){
                unlink(Storage::disk('products')->path($filePath));
            }
        }
    }

}