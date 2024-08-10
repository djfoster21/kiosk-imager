<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('image');
        $title = $request->get('title');
        $imageMimeTypes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            'svg' => 'image/svg+xml',
            'bmp' => 'image/bmp',
            'tiff' => 'image/tiff',
        ];
        if (in_array($file->getMimeType(), $imageMimeTypes, true)) {
            $name = uuid_create();
            $fileName = $name.'.'.$file->extension();
            if ($file->storeAs('public/images', $fileName)) {
                $image = new Image;
                $image->title = $title ?? $file->getClientOriginalName();
                $image->filename = $fileName;
                $image->show = false;
                $image->save();
            } else {
                $request->session()->flash('error', 'Failed to upload image.');
            }
            $request->session()->flash('success', 'Image uploaded successfully.');

        } else {
            $request->session()->flash('error', 'File is not a valid image file.');
        }

        return redirect('dashboard');
    }

    public function delete(Request $request)
    {
        $imageId = $request->get('image_id');
        $image = Image::find($imageId);
        if ($image) {
            $image->delete();
            $request->session()->flash('success', 'Image deleted successfully.');
        } else {
            $request->session()->flash('error', 'Image not found.');
        }
        return redirect('dashboard');
    }
}
