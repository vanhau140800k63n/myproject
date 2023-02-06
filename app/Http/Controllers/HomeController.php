<?php

namespace App\Http\Controllers;

use App\Models\PLanguage;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $userRepository;
    private $pLanguageRepository;

    public function __construct(UserRepositoryInterface $userRepository, PLanguageRepositoryInterface $pLanguageRepository)
    {
        $this->userRepository = $userRepository;
        $this->pLanguageRepository = $pLanguageRepository;
    }

    public function getHomePage() {
        $pLanguages = $this->pLanguageRepository->getPLanguageHome();
        return view('pages.home.home')->with(['p_languages' => $pLanguages]);
    }

    public function submit(Request $req) {
        $pLang = PLanguage::where('name', $req->language)->first();
        $pLang->home_content = $req->text;
        $pLang->save();
        return 1;
    }

    public function test(Request $req) {
        $pLang = PLanguage::find(2);
        dd(json_decode($pLang->home_content));
    }
}
