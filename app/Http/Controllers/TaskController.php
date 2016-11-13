<?php

namespace App\Http\Controllers;

use App\DataTables\TaskDataTable;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Repositories\TaskRepository;
use Flash;
use Illuminate\Http\Request;
use Response;
use Yajra\Datatables\Datatables;

class TaskController extends AppBaseController
{
    /** @var  TaskRepository */
    private $taskRepository;

    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepository = $taskRepo;
    }

    /**
     * Display a listing of the Task.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $filters = $request->all();
        unset($filters['_']);

        if ($request->ajax()) {
            return Datatables::of((new TaskDataTable())->get($filters))->make(true);
        }

        return view('tasks.index');
    }

    /**
     * Show the form for creating a new Task.
     *
     * @return Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created Task in storage.
     *
     * @param CreateTaskRequest $request
     *
     * @return Response
     */
    public function store(CreateTaskRequest $request)
    {
        $input = $request->all();

        $task = $this->taskRepository->create($input);

        Flash::success('Task saved successfully.');

        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified Task.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified Task.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified Task in storage.
     *
     * @param  int $id
     * @param UpdateTaskRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTaskRequest $request)
    {
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        $task = $this->taskRepository->update($request->all(), $id);

        Flash::success('Task updated successfully.');

        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified Task from storage.
     *
     * @param  int $id
     * @param $request
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $task = $this->taskRepository->findWithoutFail($id);
        if (empty($task)) {
            if ($request->ajax()) {
                return $this->sendError('Task not found');
            }

            Flash::error('Task not found');
            return redirect(route('tasks.index'));
        }

        $this->taskRepository->delete($id);

        if ($request->ajax()) {
            return $this->sendResponse(true, 'Task deleted successfully.');
        }

        Flash::success('Task deleted successfully.');
        return redirect(route('tasks.index'));
    }

    public function updateTaskStatus($id)
    {
        $task = $this->taskRepository->updateTaskStatus($id);

        return $this->sendResponse($task, 'Task updated successfully.');
    }
}
