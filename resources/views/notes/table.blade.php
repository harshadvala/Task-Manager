<table class="table table-responsive" id="notes-table">
    <thead>
        <th>Task Id</th>
        <th>Details</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($notes as $note)
        <tr>
            <td>{!! $note->task_id !!}</td>
            <td>{!! $note->details !!}</td>
            <td>
                {!! Form::open(['route' => ['notes.destroy', $note->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('notes.show', [$note->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('notes.edit', [$note->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>