<?php

namespace App\Http\Controllers;

use App\Repositories\NotiRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\TemplateTypeRepositoryInterface;

class NotiController extends Controller
{
    private $postRepository;
    private $notiRepository;
    private $templateTypeRepository;

    public function __construct(
        PostRepositoryInterface $postRepository,
        NotiRepositoryInterface $notiRepository,
        TemplateTypeRepositoryInterface $templateTypeRepository
    ) {
        $this->postRepository = $postRepository;
        $this->notiRepository = $notiRepository;
        $this->templateTypeRepository = $templateTypeRepository;
    }

    public function getNoti()
    {
        $output = '';
        $noti = $this->notiRepository->getRandomNoti();
        if ($noti->type == 3) {
            $post = $this->postRepository->getPostById($noti->target_id);

            $output = '<i class="fa-solid fa-circle-xmark exit_noti"></i>
            <div class="post_noti_title">' . $noti->title . '</div>
            <div class="post_noti_content">
                <img class="post_noti_content_img"
                    src="' . asset($post->image) . '">
                <div>
                    <div class="post_noti_content_title">' . $post->title . '</div>
                    <a class="post_noti_content_action" href="' . route('post.detail', ['slug' => $post->slug]) . '"> ' . $noti->action . ' </a>
                </div>
            </div>';
        } else if ($noti->type == 4) {
            $type_template = $this->templateTypeRepository->getTypeTemplateById($noti->target_id);

            $output = '<i class="fa-solid fa-circle-xmark exit_noti"></i>
            <div class="post_noti_title">' . $noti->title . '</div>
            <div class="post_noti_content">
                <img class="post_noti_content_img"
                    src="' . asset('image/template.png') . '">
                <div>
                    <div class="post_noti_content_title">1000+ Free ' . $type_template->title . ' Template</div>
                    <a class="post_noti_content_action" href="' . route('template.list', $type_template->slug) . '"> ' . $noti->action . ' </a>
                </div>
            </div>';
        }

        return $output;
    }
}
