<?php

namespace App\Repositories\Eloquent;

use App\Models\Template;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\TemplateRepositoryInterface;

class TemplateRepository extends BaseRepository implements TemplateRepositoryInterface
{
    private $template;

    public function __construct()
    {
        $this->template = new Template();
    }

    public function getListTemplateByType($type)
    {
        return $this->template->where('type', $type)->paginate(5);
    }

    public function getListTemplateByTypeAdmin($type)
    {
        return $this->template->where('type', $type)->get();
    }

    public function getTemplateById($id)
    {
        return $this->template->where('id', $id)->first();
    }

    public function addTemplate($data)
    {
        return $this->template->create($data);
    }

    public function updateTemplate($data, $id)
    {
        return $this->template->where('id', $id)->update($data);
    }

    public function check_slug($slug)
    {
        return $this->template->where('slug', $slug)->get()->count();
    }

    public function getRandomBanner()
    {
        return $this->template->where('show', 'like', '%.gif%')->inRandomOrder()->take(3)->get();
    }
}
