<?php

namespace App\Traits;
use App\FilePendukung;


trait UploadTrait 
{
    protected function uploadFile($file,$folder)
    {
        $extension = $file->extension();
        $name = $file->getClientOriginalName();
        $name = date('YmdHis')."_".$name;
        $name = str_replace(" ","_",$name);
        $size = $file->getSize();
        $path = "uploads/".$folder."/";
        $publicPath = public_path($path);
        $file->move($publicPath,$name);
        $model = FilePendukung::create([
            'nama' => $name,
            'path' => asset($path.$name),
            'ekstensi' => $extension,
            'size' => $size
        ]);
        return $model;

    }
}