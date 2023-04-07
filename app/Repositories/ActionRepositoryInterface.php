<?php

namespace App\Repositories;

interface ActionRepositoryInterface
{
    public function addAction($data);
    public function checkAction($data);
}
