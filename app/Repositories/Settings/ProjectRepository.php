<?php

namespace App\Repositories\Settings;

use App\Models\Settings\Project;
use App\Repositories\BaseRepository;

class ProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'color'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Project::class;
    }
}
