<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
       <!-- @can('user_management_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">-->
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
             <!--   </ul>
            </li>
        @endcan-->
      <!--  @can('responsable_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.responsable.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">-->
                    @can('responsible_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.responsibles.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/responsibles') || request()->is('admin/responsibles/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.responsible.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('group_responsible_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.group-responsibles.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/group-responsibles') || request()->is('admin/group-responsibles/*') ? 'active' : '' }}">
                                <i class="fa-fw far fa-object-group c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.groupResponsible.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('workshop_responsible_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.workshop-responsibles.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/workshop-responsibles') || request()->is('admin/workshop-responsibles/*') ? 'active' : '' }}">
                                <i class="fa-fw far fa-object-group c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.workshopResponsible.title') }}
                            </a>
                        </li>
                    @endcan
             <!--   </ul>
            </li>
        @endcan-->
        @can('news_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.news.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/news') || request()->is('admin/news/*') ? 'active' : '' }}">
                    <i class="fa-fw far fa-newspaper c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.news.title') }}
                </a>
            </li>
        @endcan
        @can('group_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.groups.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/groups') || request()->is('admin/groups/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-object-group c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.group.title') }}
                </a>
            </li>
        @endcan
        @can('participant_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.participants.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/participants') || request()->is('admin/participants/*') ? 'active' : '' }}">
                    <i class="fa-fw far fa-user c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.participant.title') }}
                </a>
            </li>
        @endcan
        @can('workshop_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.workshops.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/workshops') || request()->is('admin/workshops/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.workshop.title') }}
                </a>
            </li>
        @endcan
        @can('group_news_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.group-news.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/group-news') || request()->is('admin/group-news/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.groupNews.title') }}
                </a>
            </li>
        @endcan
        @can('workshop_news_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.workshop-news.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/workshop-news') || request()->is('admin/workshop-news/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.workshopNews.title') }}
                </a>
            </li>
        @endcan
        @can('responsible_news_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.responsible-news.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/responsible-news') || request()->is('admin/responsible-news/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.responsibleNews.title') }}
                </a>
            </li>
        @endcan
        @can('agenda_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.agendas.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/agendas') || request()->is('admin/agendas/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.agenda.title') }}
                </a>
            </li>
        @endcan
        @can('agenda_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.programes-generales.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/agendas') || request()->is('admin/agendas/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    البرنامج العام
                </a>
            </li>
        @endcan
        @can('agenda_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.evaluations.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/agendas') || request()->is('admin/agendas/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    تقييم المخيم 
                </a>
            </li>
        @endcan
        @can('meeting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.meetings.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/meetings') || request()->is('admin/meetings/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.meeting.title') }}
                </a>
            </li>
        @endcan
          @can('link_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.links.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/links') || request()->is('admin/links/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.link.title') }}
                </a>
            </li>
        @endcan 
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>