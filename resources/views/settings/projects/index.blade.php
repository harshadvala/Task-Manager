@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Projects</h1>
        <h1 class="pull-right">
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('settings.projects.create') !!}">
               <i class="fa fa-plus" aria-hidden="true"></i> Add New
           </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                    @include('settings.projects.table')
            </div>
        </div>
    </div>
@endsection

