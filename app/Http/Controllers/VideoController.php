<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use getID3;

class VideoController extends Controller
{

    public function post(Request $videoFile)
    {
        $getID3 = new getID3;

        $this->validate($videoFile, [
            'video' => 'required'
        ]);

        $fileInfo = $getID3->analyze($videoFile);
        return $fileInfo;
    }

    // public function store(Request $request, FilesystemInterface $filesystem, $folder)
    // {
    //     $file = $request->file('upload');
    //     $stream = fopen($file->getRealPath(), 'r+');
    //     $filesystem->writeStream('assets/'. $folder . '/' .$file->getClientOriginalName(), $stream);
    //     fclose($stream);
    // }
}