<?php

namespace App\Repositories\Eloquent;

use App\Models\TemplateType;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\TemplateTypeRepositoryInterface;

class TemplateTypeRepository extends BaseRepository implements TemplateTypeRepositoryInterface
{
    private $template_type;

    public function __construct()
    {
        $this->template_type = new TemplateType();
    }

    public function getTypeTemplate($key) {
        return $this->template_type->where('slug', $key)->first();
    }

    public function getListType() {
        return $this->template_type->all();
    }

    public function getTypeTemplateById($id) {
        return $this->template_type->find($id);
    }
}
