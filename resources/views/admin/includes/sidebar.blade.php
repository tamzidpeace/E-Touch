<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('public/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Admin Panel</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('public/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">User</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item ">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        {{-- <li class="nav-header">Sections</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Messages</p>
              </a>
            </li> --}}
        {{-- <li class="nav-header">Section</li>             --}}

        <li class="nav-item">
          <a href="{{ route('admin.category.index') }}" class="nav-link">
            <i class="fas fa-list-alt nav-icon"></i>
            <p>Category</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fab fa-product-hunt"></i>
            <p>
              Product
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.product.make') }}" class="nav-link">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add New Product</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.product.index') }}" class="nav-link">
                <i class="fas fa-clipboard nav-icon"></i>
                <p>All Products</p>
              </a>
            </li>
            
          </ul>
          <li class="nav-item">
            <a href="{{ route('admin.contact.index') }}" class="nav-link">
              <i class="fas fa-envelope-open-text nav-icon"></i>
              <p>Contact</p>
            </a>
          </li>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>