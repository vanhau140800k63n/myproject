<?php

namespace App\Http\Controllers;

use App\Config\AdminConstants;
use App\Config\CommonConstants;
use App\Exceptions\PageException;
use App\Repositories\ActionRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\ContentItemRepositoryInterface;
use App\Repositories\ContentRepositoryInterface;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\TemplateRepositoryInterface;
use App\Repositories\TemplateTypeRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Throwable;

class IconController extends Controller
{
    private $categoryRepository;
    private $pLanguageRepository;
    private $postRepository;
    private $contentItemRepository;
    private $userRepository;
    private $commentReprository;
    private $contentRepository;
    private $actionRepository;
    private $templateTypeRepository;
    private $templateRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PLanguageRepositoryInterface $pLanguageRepository,
        PostRepositoryInterface $postRepository,
        ContentItemRepositoryInterface $contentItemRepository,
        CategoryRepositoryInterface $categoryRepository,
        CommentRepositoryInterface $commentReprository,
        ContentRepositoryInterface $contentRepository,
        ActionRepositoryInterface $actionRepository,
        TemplateTypeRepositoryInterface $templateTypeRepository,
        TemplateRepositoryInterface $templateRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->postRepository = $postRepository;
        $this->contentItemRepository = $contentItemRepository;
        $this->userRepository = $userRepository;
        $this->commentReprository = $commentReprository;
        $this->contentRepository = $contentRepository;
        $this->actionRepository = $actionRepository;
        $this->templateTypeRepository = $templateTypeRepository;
        $this->templateRepository = $templateRepository;
    }

    public function getIconHome()
    {
        $index = '<section class="search-result icons-search-result';
        $form_index = '<form id="form_filters"';
        $filter_selected = ['color' => '', 'shape' => ''];
        $word = 'code';
        $content = file_get_contents('https://www.flaticon.com/search/2?word=code&order_by=4');
        $form = substr($content, strpos($content, $form_index), strpos($content, '</form>', strpos($content, $form_index)) - strpos($content, $form_index) + 7);
        $content = substr($content, strpos($content, $index), strpos($content, '</section>', strpos($content, $index)) - strpos($content, $index) + 10);
        $arr = [];
        while (strpos($content, '<img') != false) {
            $img = substr($content, strpos($content, '<img'),  strpos($content, '>', strpos($content, '<img'))  + 1 - strpos($content, '<img'));
            $content = substr($content, 0,  strpos($content, '<img ')) . substr($content, strpos($content, '>', strpos($content, '<img ')) + 1);
            array_push($arr, $img);
        }

        $color_filters = CommonConstants::COLER_FILTERS;
        $shape_filters =  CommonConstants::SHAPE_FILTERS;
        return view('pages.icon.list', compact('arr', 'form', 'color_filters', 'shape_filters', 'word', 'filter_selected'));
    }

    public function searchIcon(Request $req)
    {
        $index = '<section class="search-result icons-search-result';
        $form_index = '<form id="form_filters"';
        $url_add = '';
        $url = '';
        $word = '';
        $filter_selected = ['color' => '', 'shape' => ''];

        if (isset($req->word)) {
            $url_add .= 'word=' . $req->word;
            $word = $req->word;
        }
        if (isset($req->color)) {
            $url_add .= '&color=' . $req->color;
            $filter_selected['color'] = $req->color;
        }
        if (isset($req->shape)) {
            $url_add .= '&shape=' . $req->shape;
            $filter_selected['shape'] = $req->shape;
        }


        if ($url_add != '' && $word != '') {
            $url = 'https://www.flaticon.com/search?' . $url_add;
        } else {
            $word = 'code';
            $url = 'https://www.flaticon.com/search/2?word=code&order_by=4';
        }

        $content = file_get_contents($url);
        $form = substr($content, strpos($content, $form_index), strpos($content, '</form>', strpos($content, $form_index)) - strpos($content, $form_index) + 7);
        $content = substr($content, strpos($content, $index), strpos($content, '</section>', strpos($content, $index)) - strpos($content, $index) + 10);
        $arr = [];
        while (strpos($content, '<img') != false) {
            $img = substr($content, strpos($content, '<img'),  strpos($content, '>', strpos($content, '<img'))  + 1 - strpos($content, '<img'));
            $content = substr($content, 0,  strpos($content, '<img ')) . substr($content, strpos($content, '>', strpos($content, '<img ')) + 1);
            array_push($arr, $img);
        }

        $color_filters = CommonConstants::COLER_FILTERS;
        $shape_filters =  CommonConstants::SHAPE_FILTERS;

        return view('pages.icon.list', compact('arr', 'form', 'color_filters', 'shape_filters', 'word', 'filter_selected'));
    }
}
