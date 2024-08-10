<?php

namespace App\View\Composers;

use App\Models\Image;
use Illuminate\View\View;

class ImagesComposer
{

    public function compose(View $view): void
    {
        $view->with('images', Image::all());
    }
}
