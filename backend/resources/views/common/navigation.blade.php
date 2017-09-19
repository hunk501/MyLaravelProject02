<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">                
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">               
                <li>
                    <a href="{{ url('account') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li><a href="{{ url('/pr') }}"><i class="fa fa-gears fa-fw"></i> PR</a></li>
                <li><a href="{{ url('/ir') }}"><i class="fa fa-laptop fa-fw"></i> IR</a></li>
                <li><a href="{{ url('/policy_ledger') }}"><i class="fa fa-list-alt fa-fw"></i> Ledger</a></li>
                <li><a href="{{ url('/cm') }}"><i class="fa fa-fax fa-fw"></i> Claims Monitoring</a></li>
                <li><a href="{{ url('/pr_bounce') }}"><i class="fa fa-money fa-fw"></i> Bounce Cheque</a></li>
                <li>
                    <a href="#"><i class="fa fa-th-list fa-fw"></i> Policy<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ url('/policy') }}">Motor Schedule</a>
                        </li>
                        <!--
                        <li>
                            <a href="{{ url('/policy_ledger') }}">Ledger</a>
                        </li>
                        -->
                        <li>
                            <a href="{{ url('/policy_daily_transaction') }}">Daily Transaction</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
<!-- /Navigation --> 
