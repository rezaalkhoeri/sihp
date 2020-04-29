    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('assets/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview {!! Request::is('SIHP/compliance/*') ? 'active' : '' !!}">
          <a href="#"><i class="fa fa-keyboard-o"></i> <span>Compliance Evaluation</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{!! Request::is('SIHP/compliance/compliance-evaluation') ? 'active' : '' !!}"><a href="{{route('compliance-eval')}}">Compliance Evaluation</a></li>
            <li class="{!! Request::is('SIHP/compliance/classification') ? 'active' : '' !!}"><a href="{{route('compliance-classification')}}">Classification</a></li>
            <li class="{!! Request::is('SIHP/compliance/compliance-status') ? 'active' : '' !!}"><a href="{{route('compliance-status')}}">Compliance Status</a></li>
            <li class="{!! Request::is('SIHP/compliance/related') ? 'active' : '' !!}"><a href="{{route('compliance-related')}}">Related</a></li>
            <li class="{!! Request::is('SIHP/compliance/probability') ? 'active' : '' !!}"><a href="{{route('compliance-probability')}}">Probability</a></li>
            <li class="{!! Request::is('SIHP/compliance/severity') ? 'active' : '' !!}"><a href="{{route('compliance-severity')}}">Severity</a></li>
            <li class="{!! Request::is('SIHP/compliance/permit-period') ? 'active' : '' !!}"><a href="{{route('compliance-permitPeriod')}}">Permit Period</a></li>
            <li class="{!! Request::is('SIHP/compliance/criteria') ? 'active' : '' !!}"><a href="{{route('compliance-criteria')}}">Criteria</a></li>
            <li class="{!! Request::is('SIHP/compliance/category') ? 'active' : '' !!}"><a href="{{route('compliance-category')}}">Category</a></li>
          </ul>
        </li>
      </ul>
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview {!! Request::is('SIHP/admin/*') ? 'active' : '' !!}">
          <a href="#"><i class="fa fa-desktop"></i> <span>Administration</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{!! Request::is('SIHP/admin/roles') ? 'active' : '' !!}"><a href="{{route('admin-rolesIndex')}}">Roles</a></li>
            <li class="{!! Request::is('SIHP/admin/user') ? 'active' : '' !!}"><a href="{{route('admin-userIndex')}}">User Management</a></li>
            <li class="{!! Request::is('SIHP/admin/audit-log') ? 'active' : '' !!}"><a href="{{route('admin-logIndex')}}">Audit Log</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>