<ul class="navbar-nav bg-warning sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
    <div class="sidebar-brand-icon">
      
      <img height="20" width="70" src="{{ asset('backend/img/logo5.png') }}" alt="Logo5" class="img-fluid sidebar-logo">
      </div>
      <div class="sidebar-brand-text mx-3 text-dark font-weight-bold" style="font-family: 'Arial', sans-serif;">Lumber and Hardware</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link text-dark" href="{{route('admin')}}">
            <i class="bi bi-speedometer2 text-primary"></i>
            <span class="text-primary">Dashboard</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="bi bi-card-image text-primary"></i>
            <span class="text-primary">Banner</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Banner Options:</h6>
                <a class="collapse-item" href="{{ route('banner.index') }}">Banners</a>
                <a class="collapse-item" href="{{ route('banner.create') }}">Add Banners</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading text-dark">
        Shop
    </div>

    <!-- Categories -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse"
            aria-expanded="true" aria-controls="categoryCollapse">
            <i class="fas fa-sitemap text-primary"></i>
            <span class="text-primary">Category</span>
        </a>
        <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Category Options:</h6>
                <a class="collapse-item" href="{{route('category.index')}}">Category</a>
                <a class="collapse-item" href="{{route('category.create')}}">Add Category</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    {{-- Products --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse"
            aria-expanded="true" aria-controls="productCollapse">
            <i class="fas fa-cubes text-primary"></i>
            <span class="text-primary">Products</span>
        </a>
        <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product Options:</h6>
                <a class="collapse-item" href="{{route('product.index')}}">Products</a>
                <a class="collapse-item" href="{{route('product.create')}}">Add Product</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    {{-- Brands --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandCollapse" aria-expanded="true"
            aria-controls="brandCollapse">
            <i class="fa fa-calendar-minus-o text-primary"></i>
            <span class="text-primary">Brands</span>
        </a>
        <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Brand Options:</h6>
                <a class="collapse-item" href="{{route('brand.index')}}">Brands</a>
                <a class="collapse-item" href="{{route('brand.create')}}">Add Brand</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    {{-- Shipping --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shippingCollapse"
            aria-expanded="true" aria-controls="shippingCollapse">
            <i class="fa-solid fa-truck-fast text-primary"></i>
            <span class="text-primary">Shipping</span>
        </a>
        <div id="shippingCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Shipping Options:</h6>
                <a class="collapse-item" href="{{route('shipping.index')}}">Shipping</a>
                <a class="collapse-item" href="{{route('shipping.create')}}">Add Shipping</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!--Orders -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('order.index')}}">
            <i class="fa fa-cart-plus text-primary"></i>
            <span class="text-primary">Orders</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Reviews -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('review.index')}}">
            <i class="fas fa-comments text-primary"></i>
            <span class="text-primary">Reviews</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-dark">
        Posts
    </div>

    <!-- Comments -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('comment.index')}}">
            <i class="fa fa-commenting-o text-primary"></i>
            <span class="text-primary">Comments</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Heading -->
    <div class="sidebar-heading text-dark">
        General Settings
    </div>

    <!-- Users -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-users text-primary"></i>
            <span class="text-primary">All Users</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- General settings -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('settings')}}">
            <i class="fa fa-cogs text-primary"></i>
            <span class="text-primary">Edit Post</span></a>
    </li>


</ul>