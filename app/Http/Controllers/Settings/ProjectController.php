<?php

namespace App\Http\Controllers\Settings;

use App\DataTables\ProjectDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Repositories\Settings\ProjectRepository;
use Flash;
use Illuminate\Http\Request;
use Response;
use Yajra\Datatables\Datatables;

class ProjectController extends AppBaseController
{
    /** @var  ProjectRepository */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepository = $projectRepo;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new ProjectDataTable())->get())->make(true);
        }
        return view('settings.projects.index');
    }


    /**
     * Show the form for creating a new Project.
     *
     * @return Response
     */
    public function create()
    {
        return view('settings.projects.create');
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();

        $project = $this->projectRepository->create($input);

        Flash::success('Project saved successfully.');

        return redirect(route('settings.projects.index'));
    }

    /**
     * Display the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('settings.projects.index'));
        }

        return view('settings.projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('settings.projects.index'));
        }

        return view('settings.projects.edit')->with('project', $project);
    }

    /**
     * Update the specified Project in storage.
     *
     * @param  int $id
     * @param UpdateProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectRequest $request)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('settings.projects.index'));
        }

        $this->projectRepository->update($request->all(), $id);

        Flash::success('Project updated successfully.');

        return redirect(route('settings.projects.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param  int $id
     * @param $request
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            if ($request->ajax()) {
                return $this->sendError('Project not found');
            }
            Flash::error('Project not found');
            return redirect(route('settings.projects.index'));
        }

        $this->projectRepository->delete($id);

        if ($request->ajax()) {
            return $this->sendResponse(true, 'Project deleted successfully.');
        }
        Flash::success('Project deleted successfully.');

        return redirect(route('settings.projects.index'));
    }
}
