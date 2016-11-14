@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Project
        </h1>
   </section>
   <div class="content">
       @include('common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($project, ['route' => ['settings.projects.update', $project->id], 'method' => 'patch']) !!}

                        @include('settings.projects.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection