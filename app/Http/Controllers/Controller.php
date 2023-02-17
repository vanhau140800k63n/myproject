<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Intervention\Image\Facades\Image;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function saveImage($url) {
        $image = Session('image') ? Session::get('image') : [];
        $index = 0;
        foreach ($image as $key => $url) {
            if (!file_exists('img/' . $key . '.jpg')) {
                if ($url != "") {
                    $url = str_replace(' ', '%20', $url);
                    $size = getimagesize($url);
                    if ($size[0] < $size[1] || str_contains($key, 'top_search')) {
                        $url = file_get_contents($url);
                        $imgFile = Image::make($url);
                        $imgFile->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $imgFile->save('img/' . $key . '.jpg');

                        ++$index;
                    }
                }
            }
            unset($image[$key]);

            if ($index == 10) {
                break;
            }
        }
    }
}
