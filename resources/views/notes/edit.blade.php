@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Note
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($note, ['route' => ['notes.update', $note->id], 'method' => 'patch']) !!}

                        @include('notes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection