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

    public function getListTemplateByType($type) {
        return $this->template->where('type', $type)->paginate(3);
    }
}
