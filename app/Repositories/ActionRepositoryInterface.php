<?php

namespace App\Repositories;

interface ActionRepositoryInterface
{
    public function addAction($data);
    public function checkAction($data);
    public function getActionUser($id);
    public function limitAction($id, $limit);
}
