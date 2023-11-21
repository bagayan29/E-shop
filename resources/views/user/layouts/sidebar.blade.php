<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('user')}}">
      <div class="sidebar-brand-icon">
      <img height="20" width="50" src="{{ asset('backend/img/logo5.png') }}" alt="Logo5" class="img-fluid sidebar-logo">
      </div>
      <div class="sidebar-brand-text mx-3 text-dark font-weight-bold" style="font-family: 'Arial', sans-serif;">Lumber and Hardware</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{route('user')}}">
      <i class='fa-solid fa-house' style="color: blue;"></i>
        <span style="color: blue;">Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading" style="color: black;">
            Shop
        </div>
    <!--Orders -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.order.index')}}">
            <i class='fa-solid fa-cart-shopping' style="color: blue;"></i>
            <span style="color: blue;">Orders</span>
        </a>
    </li>

    <!-- Reviews -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.productreview.index')}}">
            <i class='fa-solid fa-comment-sms' style="color: blue;"></i>
            <span style="color: blue;">Reviews</span></a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading"style="color: black;">
    Message 
    </div>
    <!-- Comments -->
    <li class="nav-item">
      <a class="nav-link" href="{{route('user.post-comment.index')}}">
          <i class='fas fa-comments-dollar' style="color: blue;"></i>
          <span style="color: blue;">Comments</span>
      </a>
    </li> 
   

    <hr class="sidebar-divider">
    <div class="sidebar-heading"style="color: black;">
    Settings 
    </div>

<li class="nav-item">
<a class="nav-link" href="{{route('user.change.password.form')}}">
            <i class="fas fa-key fa-sm fa-fw" style="color: blue;"></i>
            <span style="color: blue;">Change Password</span>
          </a>
</li>
</ul>