@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Task
        </h1>
   </section>
   <div class="content">
       @include('common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'patch']) !!}

                        @include('tasks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection