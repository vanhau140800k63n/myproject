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
use App\Repositories\IconRepositoryInterface;
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
    private $iconRepository;

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
        TemplateRepositoryInterface $templateRepository,
        IconRepositoryInterface $iconRepository
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
        $this->iconRepository = $iconRepository;
    }

    public function getIconHome()
    {
        $index = '<section class="search-result icons-search-result';
        $form_index = '<form id="form_filters"';
        $filter_selected = ['color' => '', 'shape' => ''];
        $word = 'code';
        $page_total_str = '<span id="pagination-total" class="mg-left-lv1">';
        $page_total = 1;
        $crr_page = 1;

        $content = '';

        try {
            $content = file_get_contents('https://www.flaticon.com/search?word=code');
        } catch (\Throwable $ex) {
        }
        if (strpos($content, $page_total_str) != false)
            $page_total = intval(substr($content, strpos($content, $page_total_str) + strlen($page_total_str),  strpos($content, '</span>', strpos($content, $page_total_str)) - strpos($content, $page_total_str) - strlen($page_total_str)));

        if (strpos($content, $index) != false)
            $content = substr($content, strpos($content, $index), strpos($content, '</section>', strpos($content, $index)) - strpos($content, $index) + 10);

        $arr = [];
        while (strpos($content, '<img') != false) {
            $img = substr($content, strpos($content, '<img'),  strpos($content, '>', strpos($content, '<img'))  + 1 - strpos($content, '<img'));
            $img_src = substr($img, strpos($img, 'data-src="') + 10,  strpos($img, '"', strpos($img, 'data-src="') + 10)  - 10 - strpos($img, 'data-src="'));
            $icon = $this->iconRepository->getIconByPath(explode('/', $img_src));
            if ($icon != null) {
                $img = str_replace($img_src, $icon->image, $img);
            }
            $content = substr($content, 0,  strpos($content, '<img ')) . substr($content, strpos($content, '>', strpos($content, '<img ')) + 1);
            array_push($arr, $img);
        }

        $color_filters = CommonConstants::COLER_FILTERS;
        $shape_filters =  CommonConstants::SHAPE_FILTERS;

        shuffle($arr);
        return view('pages.icon.list', compact('arr', 'color_filters', 'shape_filters', 'word', 'filter_selected', 'crr_page', 'page_total'));
    }

    public function searchIcon(Request $req)
    {
        $index = '<section class="search-result icons-search-result';
        $form_index = '<form id="form_filters"';
        $url_add = '';
        $url = '';
        $word = '';
        $filter_selected = ['color' => '', 'shape' => ''];

        $page_total_str = '<span id="pagination-total" class="mg-left-lv1">';
        $page_total = 1;
        $crr_page = 1;

        if (isset($req->page) && $req->page != 1 && intval($req->page) != 0) {
            $url_add .= '/' . $req->page . '/';
            $crr_page = $req->page;
        }
        if (isset($req->word)) {
            $url_add .= '?word=' . str_replace(' ', '%20', $req->word);
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
            $url = 'https://www.flaticon.com/search' . $url_add;
        } else {
            $word = 'code';
            $url = 'https://www.flaticon.com/search?word=code';
        }

        $content = '';
        try {
            $content = file_get_contents($url);
        } catch (\Throwable $ex) {
        }
        if (strpos($content, $page_total_str) != false)
            $page_total = intval(substr($content, strpos($content, $page_total_str) + strlen($page_total_str),  strpos($content, '</span>', strpos($content, $page_total_str)) - strpos($content, $page_total_str) - strlen($page_total_str)));

        if (strpos($content, $index) != false)
            $content = substr($content, strpos($content, $index), strpos($content, '</section>', strpos($content, $index)) - strpos($content, $index) + 10);

        $arr = [];
        while (strpos($content, '<img') != false) {
            $img = substr($content, strpos($content, '<img'),  strpos($content, '>', strpos($content, '<img'))  + 1 - strpos($content, '<img'));
            $img_src = substr($img, strpos($img, 'data-src="') + 10,  strpos($img, '"', strpos($img, 'data-src="') + 10)  - 10 - strpos($img, 'data-src="'));
            $icon = $this->iconRepository->getIconByPath(explode('/', $img_src));
            if ($icon != null) {
                $img = str_replace($img_src, $icon->image, $img);
            }
            $content = substr($content, 0,  strpos($content, '<img ')) . substr($content, strpos($content, '>', strpos($content, '<img ')) + 1);
            array_push($arr, $img);
        }

        $color_filters = CommonConstants::COLER_FILTERS;
        $shape_filters =  CommonConstants::SHAPE_FILTERS;

        return view('pages.icon.list', compact('arr', 'color_filters', 'shape_filters', 'word', 'filter_selected', 'page_total', 'crr_page'));
    }

    public function addIconPath()
    {
        $last_icon = $this->iconRepository->getLastIcon();

        $path = 1;
        $index = 0;

        if ($last_icon != null) {
            $path = intval($last_icon->path);
            $index = intval($last_icon->index) + 1;
        }

        while ($path <= 11120) {
            if ($index == 1000) {
                $index = 0;
                ++$path;
                continue;
            }

            $data = [
                'path' => $path,
                'index' => $index
            ];

            $icon = $this->iconRepository->create($data);

            ++$index;
        }
    }

    public function saveIcon(Request $req)
    {
        $icons = $req->icons;
        $icon_tags = $req->icon_tags;
        $res_icons = [];

        foreach ($icons as $index => $icon) {
            $icon_path = explode('/', $icon);
            $icon_path[5] = substr($icon_path[5], strlen($icon_path[4]), 3);
            $check_icon = $this->iconRepository->checkAddIcon($icon_path);
            if ($check_icon == null) {
                $save_image = $this->saveIconImage($icon);
                if ($save_image != false) {
                    $data = [
                        'path' => intval($icon_path[4]),
                        'index' => intval($icon_path[5]),
                        'image' => $save_image,
                        'tag' => $icon_tags[$index],
                        'status' => 1
                    ];

                    $create_icon = $this->iconRepository->create($data);
                    $res_icons[$icon] = $save_image;
                } else {
                    $res_icons[$icon] = $icon;
                }
            } else {
                if ($check_icon->status == 0) {
                    $save_image = $this->saveIconImage($icon);

                    if ($save_image != false) {
                        $data = [
                            'image' => $save_image,
                            'tag' => $icon_tags[$index],
                            'status' => 1
                        ];

                        $update_icon = $this->iconRepository->updateIcon($data);
                        $res_icons[$icon] = $save_image;
                    } else {
                        $res_icons[$icon] = $icon;
                    }
                } else {
                    $res_icons[$icon] = $check_icon->image;
                }
            }
        }

        return response()->json($res_icons);
    }
}
