 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('admin/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard </span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed @if(Request::segment(2) == 'addjobs') active @endif" href="{{url('admin/addjobs')}}">
          <i class="bi bi-person"></i>
          <span>Add Jobs</span>
        </a>
      </li><!-- End Add Jobs Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('admin/viewjob')}}">
          <i class="bi bi-person"></i>
          <span>Pending Jobs</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('admin/compleatejob')}}">
          <i class="bi bi-person"></i>
          <span>Compleated Jobs</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bi bi-person"></i>
          <span>Add Jobs</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bi bi-person"></i>
          <span>Add Jobs</span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->
