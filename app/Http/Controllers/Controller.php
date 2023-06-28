<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Intervention\Image\Facades\Image;
use Illuminate\Routing\Controller as BaseController;
use Throwable;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function saveImage($url, $name)
    {
        if ($url != "") {
            $url = str_replace(' ', '%20', $url);
            try {
                $size = getimagesize($url);
                if ($size !== false) {
                    $url = file_get_contents($url);
                    $imgFile = Image::make($url);
                    $imgFile->resize(500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $imageName = 'image/post/' . $name . rand(1000, 9999) . '.jpg';
                    $imgFile->save($imageName);

                    return $imageName;
                }
            } catch (Throwable $ex) {
                return $ex->getMessage();
            }
        }

        return '';
    }

    protected function saveIconImage($url)
    {
        if ($url != "") {
            $url = str_replace(' ', '%20', $url);
            try {
                $size = getimagesize($url);
                if ($size !== false) {
                    $url = file_get_contents($url);
                    $imgFile = Image::make($url);
                    $imageName = 'image/icon/' . $this->generateRandomString(10) . '.png';
                    while (file_exists($imageName)) {
                        $imageName = 'image/icon/' . $this->generateRandomString(10) . '.png';
                    }
                    $imgFile->save($imageName);

                    return $imageName;
                }
            } catch (Throwable $ex) {
                return false;
            }
        }

        return false;
    }

    protected function saveVideo($url) {
        // retur $path = $request->file('video')->storeAs(
        //     'videos_directory',
        //     $request->file('video')->getClientOriginalName() . '.' . $request->file('video')->getClientOriginalExtension()
        // );
    }

    private function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    protected function makeSlug($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/(\“|\”|\"|\–|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\?|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^|\/|\:)/", '-', $str);
        $str = preg_replace("/( )/", '-', $str);
        $str = preg_replace("/(---)/", '-', $str);
        $str = preg_replace("/(--)/", '-', $str);
        if (substr($str, -1) === '-') {
            $str = substr($str, 0, strlen($str) - 1);
        }
        $str = strtolower($str);

        return $str;
    }
}
