@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User
        </h1>
    </section>
    <div class="content">
        @include('common.errors')
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch','files' => true]) !!}

                    @include('users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection