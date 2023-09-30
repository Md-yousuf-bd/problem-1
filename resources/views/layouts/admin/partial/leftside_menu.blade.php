<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-danger float-end">04</span>
                        <span key="t-dashboards">DASHBORARD</span>
                    </a>
                </li>
                {{-- Create Catergory Courses --}}
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-solid fa-copy text-info"></i>
                        <span key="t-dashboards">Organization </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('organization.create') }}" key="t-horizontal">
                                create</a></li>
                        <li><a href="{{ route('organization.list') }}" key="t-horizontal"> list</a>
                        </li>
                    </ul>

                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-solid fa-copy text-info"></i>
                        <span key="t-dashboards">Category </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('category.create') }}" key="t-horizontal">
                                create</a></li>
                        <li><a href="{{ route('category.list') }}" key="t-horizontal"> list</a>
                        </li>
                    </ul>

                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-solid fa-copy text-info"></i>
                        <span key="t-dashboards">From template </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('template.create') }}" key="t-horizontal">
                                create</a></li>
                        <li><a href="{{ route('template.list') }}" key="t-horizontal"> list</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-solid fa-copy text-info"></i>
                        <span key="t-dashboards">From Field </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('field.create') }}" key="t-horizontal">
                                create</a></li>
                        <li><a href="{{ route('field.list') }}" key="t-horizontal"> list</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End --
