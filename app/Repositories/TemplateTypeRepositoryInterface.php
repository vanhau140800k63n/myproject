<?php

namespace App\Repositories;

interface TemplateTypeRepositoryInterface
{
    public function getTypeTemplate($key);
    public function getTypeTemplateById($id);
    public function getListType();
    public function getListTypeShow();
    public function addType($data);
}
