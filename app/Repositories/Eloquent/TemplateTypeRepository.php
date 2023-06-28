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

    public function getTypeTemplate($key)
    {
        return $this->template_type->where('slug', $key)->first();
    }

    public function getListType()
    {
        return $this->template_type->inRandomOrder()->get();
    }

    public function getListTypeAdmin()
    {
        return $this->template_type->orderBy('view', 'desc')->get();
    }

    public function getListTypeShow($id)
    {
        return $this->template_type->where('id', '<', 15)->orWhere('id', $id)->get();
    }

    public function getTypeTemplateById($id)
    {
        return $this->template_type->find($id);
    }

    public function addType($data)
    {
        return $this->template_type->create($data);
    }
}
