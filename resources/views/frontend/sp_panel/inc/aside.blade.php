<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('spAdmin')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Resource</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-user-cog"></i>Resource Management</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-id-badge"></i><a href="{{route('resourceCrud')}}">View Resource</a></li>
                        <li><i class="fa fa-bars"></i><a href="{{route('AddResource')}}">Adjusting Resource</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-user-clock"></i>Time Table</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fas fa-calendar-alt"></i><a href="{{route('spSchedule')}}">SP Schedule</a></li>
                        <li><i class="fas fa-user-times"></i><a href="{{route('spBusyDay')}}">Leave Table</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="{{route('PersonalInformation')}}"> <i class="menu-icon fas fa-user-tie"></i>Personal Information</a>
                </li>
                <li class="">
                    <a href="{{route('spTermsCondition')}}"> <i class="menu-icon fas fa-chalkboard"></i>Terms & Conditions</a>
                </li>
                <li class="">
                    <a href="{{route('spAnnouncement')}}"> <i class="menu-icon fas fa-bullhorn"></i>Announcement</a>
                </li>
                <li class="">
                    <a href="{{route('spHelp')}}"> <i class="menu-icon fas fa-hands-helping"></i>Help</a>
                </li>

            </ul>
        </div>
    </nav>
</aside>