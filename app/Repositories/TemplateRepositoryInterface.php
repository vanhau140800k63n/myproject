<?php

namespace App\Repositories;

interface TemplateRepositoryInterface
{
    public function getListTemplateByType($type);
    public function getTemplateById($id);
}
