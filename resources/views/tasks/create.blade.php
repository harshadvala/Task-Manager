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
                    {!! Form::open(['route' => 'tasks.store']) !!}

                        @include('tasks.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
