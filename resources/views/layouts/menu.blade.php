<li class="{{ Request::is('tasks*') ? 'active' : '' }}">
    <a href="{!! route('tasks.index') !!}"><i class="fa fa-edit"></i><span>Tasks</span></a>
</li>

@if(!empty($categories))
    @foreach($categories as $id=>$category)
        @if($category->show_in_sidebar)
            <li class="{{ Request::is('tasks*') ? 'active' : '' }}">
                <a href="{!! route('tasks.index') !!}"><i
                            class="fa fa-tasks"></i><span>{!! $category->name!!}</span></a>
            </li>
        @endif
    @endforeach
@endif

@include('layouts.setting_menu')

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
</li>
