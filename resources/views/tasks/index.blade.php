@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left" id="task-title">Tasks</h1>

        <div id="filterData" class="pull-right">
            <form class="form-inline">
                <div class="form-group filter">
                    <label for="project">Project</label>
                    <select name="project" class="form-control" id="project" aria-controls="level_table">
                        <option value="">All</option>
                        @foreach( $projects as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group filter">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="0" selected>Active</option>
                        <option value="1">Complete</option>
                        <option value="">All</option>
                    </select>
                </div>

                <div class="form-group filter">
                    <label for="assignTo">Assign To</label>
                    <select name="assignTo" class="form-control" id="assignTo" aria-controls="level_table">
                        <option value="">All</option>
                        @foreach( $users as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px;margin-left: 10px"
                   href="{!! route('tasks.create') !!}">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>
            </form>
        </div>

    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                @include('tasks.table')

            </div>
        </div>
    </div>
@endsection

