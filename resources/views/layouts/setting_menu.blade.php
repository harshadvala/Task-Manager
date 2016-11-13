<li class="treeview {{ Request::is('settings*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-cogs" aria-hidden="true"></i> <span>Settings</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('settings/projects*') ? 'active' : '' }}">
            <a href="{!! route('settings.projects.index') !!}"><i class="fa fa-code-fork"></i><span>Projects</span></a>
        </li>
    </ul>
</li>