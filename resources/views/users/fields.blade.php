<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@if(isset($user))
    <?php
    $img = $user->image;
     $passwordValidation='';
    ?>
@else
    <?php
    $img = '';
    $passwordValidation='required';
    ?>
@endif

<div>
    <div class="col-md-6">
        <!-- Name Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control' ,'required'=>true]) !!}
        </div>

        <!-- Email Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class' => 'form-control' ,'required'=>true]) !!}
        </div>

        <!-- Password Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('Password', 'Password:') !!}
            {!! Form::password('password',  ['class' => 'form-control']) !!}
        </div>

        <!-- Password Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('password_confirmation', 'Confirm Password:') !!}
            {!! Form::password('password_confirmation',  ['class' => 'form-control']) !!}
        </div>

        <!-- Is Active Field -->
        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xm-12">
            <label class="checkbox-inline">
                {!! Form::checkbox('is_active', true, true, ['class'=>'minimal','style'=>"position: absolute;"]) !!}
                {!! Form::label('is_active', 'Is Active',[]) !!}
            </label>
        </div>

        <!-- Is Admin Field -->
        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xm-12">
            <label class="checkbox-inline">
                {!! Form::checkbox('is_admin', true, true, ['class'=>'minimal','style'=>"position: absolute;"]) !!}
                {!! Form::label('is_admin', 'Is Admin') !!}
            </label>
        </div>


    </div>
    <div class="col-md-6">
        <!-- Image Field -->
        <div class="col-sm-12 form-group text-left">
            <img id="preview" class="profile-user-img img-responsive img-circle pull-left"
                 src="{{asset('profiles/'.$img)}}"
                 onerror="this.src='{{asset('images/icon-user.png')}}'"
                 alt="User profile picture">

        </div>
        <div style="padding-bottom: 15px">
            {!! Form::file('image', ['class' => '','onchange'=>'readURL(this);']) !!}
        </div>
    </div>
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
        <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>


