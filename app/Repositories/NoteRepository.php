<?php

namespace App\Repositories;

use App\Models\Note;

class NoteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'task_id',
        'details'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Note::class;
    }
}
