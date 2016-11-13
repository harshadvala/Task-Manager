<?php

namespace App\Repositories;

use App\Exceptions\ApiOperationFailedException;
use App\Exceptions\ItemNotFoundException;
use App\Models\Task;
use Exception;

class TaskRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'start_date',
        'end_date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Task::class;
    }


    /**
     * @param $id
     * @return bool
     * @throws ApiOperationFailedException
     */
    public function updateTaskStatus($id)
    {
        try {
            $task = Task::find($id);
            if (!$task) {
                throw new ItemNotFoundException('Task not found');
            }
            if ($task->status == 1) {
                $task->status = 0;
            } else {
                $task->status = 1;
            }

            return $task->save();

        } catch (Exception $e) {
            throw new ApiOperationFailedException('Unable to update task' . $e->getMessage());
        }
    }
}
