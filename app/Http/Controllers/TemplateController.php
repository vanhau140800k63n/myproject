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

class TemplateController extends Controller
{
    private $categoryRepository;
    private $pLanguageRepository;
    private $postRepository;
    private $contentItemRepository;
    private $userRepository;
    private $commentReprository;
    private $contentRepository;
    private $actionRepository;
    private $templateRepository;
    private $templateTypeRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PLanguageRepositoryInterface $pLanguageRepository,
        PostRepositoryInterface $postRepository,
        ContentItemRepositoryInterface $contentItemRepository,
        CategoryRepositoryInterface $categoryRepository,
        CommentRepositoryInterface $commentReprository,
        ContentRepositoryInterface $contentRepository,
        ActionRepositoryInterface $actionRepository,
        TemplateRepositoryInterface $templateRepository,
        TemplateTypeRepositoryInterface $templateTypeRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->postRepository = $postRepository;
        $this->contentItemRepository = $contentItemRepository;
        $this->userRepository = $userRepository;
        $this->commentReprository = $commentReprository;
        $this->contentRepository = $contentRepository;
        $this->actionRepository = $actionRepository;
        $this->templateRepository = $templateRepository;
        $this->templateTypeRepository = $templateTypeRepository;
    }

    public function listTemplate($key)
    {
        $type = $this->templateTypeRepository->getTypeTemplate($key);
        if ($type == null) {
            throw new PageException();
        }

        if (!Auth::check() || Auth::user()->role != 1) {
            $type->view += 1;
            $type->save();
        }

        $list_type = $this->templateTypeRepository->getListTypeShow($type->id);
        $list_type_all = $this->templateTypeRepository->getListType();
        $list_template = $this->templateRepository->getListTemplateByType($type->id);

        return view('pages.template.list', compact('list_template', 'key', 'list_type', 'type', 'list_type_all'));
    }

    public function getTemplateDetail($key, $slug)
    {
    }

    public function getTemplateTypeListAdmin()
    {
        $type_list = $this->templateTypeRepository->getListTypeAdmin();

        return view('admin.pages.template.type_list', compact('type_list'));
    }

    public function getTemplateListAdmin($type)
    {
        $list_template = $this->templateRepository->getListTemplateByTypeAdmin($type);

        return view('admin.pages.template.list', compact('list_template'));
    }

    public function getTemplateDetailAdmin($id)
    {
        $template = $this->templateRepository->getTemplateById($id);
        $type_list = $this->templateTypeRepository->getListType();
        $template_tag = $this->categoryRepository->getCategoryTitle(explode('-', $template->tag));

        return view('admin.pages.template.detail', compact('template', 'type_list', 'template_tag'));
    }

    public function addTemplateAdmin()
    {
        $type_list = $this->templateTypeRepository->getListType();

        return view('admin.pages.template.add', compact('type_list'));
    }

    public function postAddTemplateAdmin(Request $req)
    {
        $data_add = [
            'title' => $req->title,
            'iframe' => 'https://devsnes.github.io/source_code/' . $req->slug,
            'download_url' => 'https://devsnes.github.io/source_code/' . $req->slug . '/index.zip',
            'slug' => $req->slug,
            'height' => $req->height,
            'auto' => $req->auto,
            'source' => 1,
            'demo' => 1,
            'view' => $req->view,
            'content' => $req->content,
            'type' => $req->type,
            'tag' => $this->categoryRepository->updateCategory(explode(',', $req->tag))
        ];

        $template = $this->templateRepository->addTemplate($data_add);

        return true;
    }

    public function postUpdateTemplateAdmin(Request $req)
    {
        $data_add = [
            'title' => $req->title,
            'iframe' => 'https://devsnes.github.io/source_code/' . $req->slug,
            'download_url' => 'https://devsnes.github.io/source_code/' . $req->slug . '/index.zip',
            'slug' => $req->slug,
            'height' => $req->height,
            'auto' => $req->auto,
            'source' => 1,
            'demo' => 1,
            'view' => $req->view,
            'content' => $req->content,
            'type' => $req->type,
            'tag' => $this->categoryRepository->updateCategory(explode(',', $req->tag))
        ];

        $template = $this->templateRepository->updateTemplate($data_add, $req->template_id);

        return true;
    }

    public function autoAddTemplateAdmin(Request $req)
    {
        $content = $this->contentRepository->getContentUnPublicUrl();
        $update = $this->contentRepository->updateContentUrl(['status' => 1], $content->id);

        $page = $content->content;

        return view('admin.pages.template.auto_template', compact('page'));
    }

    public function autoPostAddTemplateAdmin(Request $req)
    {
        $data_add = [
            'title' => $req->title,
            'iframe' => $req->url,
            'download_url' => $req->download,
            'slug' => $this->makeSlug($req->title),
            'height' => 500,
            'auto' => null,
            'source' => $req->download != null ? 1 : 0,
            'demo' => 1,
            'view' => $req->view,
            'content' => '',
            'type' => $req->type,
            'show' => $req->show,
            'tag' => $this->categoryRepository->updateCategory(explode(',', 'button'))
        ];

        $check_slug = $this->templateRepository->check_slug($data_add['slug']);

        if ($check_slug == 0)
            $template = $this->templateRepository->addTemplate($data_add);

        return true;
    }

    public function addDescriptionAdmin()
    {
        // $list_description = explode(PHP_EOL, CommonConstants::DESCRIPTION);
        // $list_type = $this->templateTypeRepository->getListType();

        // foreach ($list_type as $type) {
        //     $random_index = array_rand($list_description, 3);
        //     $str = '';
        //     foreach ($random_index as $index) {
        //         $str .= str_replace('...', $type->title, $list_description[$index]). ' ';
        //     }

        //     $str = substr($str, 0, -1);

        //     $type->update(['description' => $str]);
        // }
    }
}
