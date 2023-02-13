<?php

namespace App\Repositories\Eloquent;

use App\Models\Project;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\ProjectRepositoryInterface;

class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    private $project;

    public function __construct()
    {
        $this->project = new Project();
    }

    public function getProjectList() {
        return $this->project->all();
    }
}
