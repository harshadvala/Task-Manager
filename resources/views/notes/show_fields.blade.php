<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $note->id !!}</p>
</div>

<!-- Task Id Field -->
<div class="form-group">
    {!! Form::label('task_id', 'Task Id:') !!}
    <p>{!! $note->task_id !!}</p>
</div>

<!-- Details Field -->
<div class="form-group">
    {!! Form::label('details', 'Details:') !!}
    <p>{!! $note->details !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $note->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $note->updated_at !!}</p>
</div>

