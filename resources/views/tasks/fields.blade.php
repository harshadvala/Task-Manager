<!-- Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Project Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project', 'Project:') !!}
    {!! Form::select('project_id',$projects,[], ['class' => 'form-control']) !!}
</div>


<!-- Assign to Field -->
<div class="form-group col-sm-6">
    {!! Form::label('assign_to', 'Assign To:') !!}
    {!! Form::select('assign_to',$users,isset($task->assign_to)?$task->assign_to:Auth::user()->id, ['class' => 'form-control']) !!}
</div>


<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('due_date', 'Due Date:') !!}
    {!! Form::text('due_date',  isset($task->due_date)?$task->due_date:\Carbon\Carbon::now()->endOfDay(), ['class' => 'form-control']) !!}

    <div class="row">
        <div class="form-group col-xs-4" style="padding-top: 13px;">
            {!! Form::label('urgent_level', 'Urgent Level') !!}
            <div>
                <fieldset id='urgent_level_input' class="rating">
                    <input type="radio" id="star5" name="urgent_level" value="5"
                           @if(isset($task) && $task->urgent_level==5) checked @endif/>
                    <label for="star5"
                           style="padding-top: 2px!important;font-size: 40px;width: 10px !important;"></label>
                    <input class="stars" type="radio" id="star4" name="urgent_level" value="4"
                           @if(isset($task) && $task->urgent_level==4) checked @endif />
                    <label for="star4"
                           style="padding-top: 8px!important;font-size: 36px;width: 9px !important;"></label>
                    <input class="stars" type="radio" id="star3" name="urgent_level" value="3"
                           @if(isset($task) && $task->urgent_level==3) checked @endif/>
                    <label for="star3"
                           style="padding-top: 11px!important;font-size: 32px;width: 8px !important;"></label>
                    <input class="stars" type="radio" id="star2" name="urgent_level" value="2"
                           @if(isset($task) && $task->urgent_level==2) checked @endif />
                    <label for="star2"
                           style="padding-top: 13px!important;font-size: 28px;width: 6px !important;"></label>
                    <input class="stars" type="radio" id="star1" name="urgent_level" value="1"
                           @if(isset($task) && $task->urgent_level==1) checked @endif/>
                    <label for="star1"
                           style="padding-top: 20px!important; font-size: 24px;width: 6px !important;"></label>
                </fieldset>
            </div>

        </div>
        <div class="form-group col-xs-4" style="padding-top: 13px;">
            {!! Form::label('important_level', 'Important Level') !!}
            <div>
                <fieldset id='important_level_input' class="rating">
                    <input type="radio" id="star51" name="important_level" value="5"
                           @if(isset($task) && $task->important_level==5) checked @endif/>
                    <label for="star51"
                           style="padding-top: 2px!important;font-size: 40px;width: 10px !important;"></label>
                    <input class="stars" type="radio" id="star41" name="important_level" value="4"
                           @if(isset($task) && $task->important_level==4) checked @endif />
                    <label for="star41"
                           style="padding-top: 8px!important;font-size: 36px;width: 9px !important;"></label>
                    <input class="stars" type="radio" id="star31" name="important_level" value="3"
                           @if(isset($task) && $task->important_level==3) checked @endif/>
                    <label for="star31"
                           style="padding-top: 11px!important;font-size: 32px;width: 8px !important;"></label>
                    <input class="stars" type="radio" id="star21" name="important_level" value="2"
                           @if(isset($task) && $task->important_level==2) checked @endif />
                    <label for="star21"
                           style="padding-top: 13px!important;font-size: 28px;width: 6px !important;"></label>
                    <input class="stars" type="radio" id="star11" name="important_level" value="1"
                           @if(isset($task) && $task->important_level==1) checked @endif/>
                    <label for="star11"
                           style="padding-top: 20px!important; font-size: 24px;width: 6px !important;"></label>
                </fieldset>
            </div>
        </div>
    </div>

</div>

<!-- Description Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description',null, ['class' => 'form-control','rows'=>3]) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('tasks.index') !!}" class="btn btn-default">Cancel</a>
</div>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#due_date').datetimepicker({
                format: 'YYYY-MM-DD hh:mm:ss',
            });
        });

        $('div.alert').delay(3000).fadeOut(350);
    </script>
@endsection