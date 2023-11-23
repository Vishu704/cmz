  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
      <img src="{{ asset('img/logo.jpg') }}" alt="CMZ" class="">
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!--div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('/') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

         
          <li class="nav-item">
            <a href="{{ url('dashboard') }}" class="nav-link {{ request()->is(['editcase/*','dashboard']) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('slider') }}" class="nav-link {{ request()->is(['slider']) ? 'active' : '' }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Slider Images
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('product') }}" class="nav-link {{ request()->is(['product']) ? 'active' : '' }}">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Products
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('product-issue') }}" class="nav-link {{ request()->is(['product-issue']) ? 'active' : '' }}">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Product Issue
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('productcat') }}" class="nav-link {{ request()->is(['productcat','editproductcat/*','addproductcat']) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Product Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('service') }}" class="nav-link {{ request()->is(['service','editservice/*','addservice']) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Services
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('sell-productcat') }}" class="nav-link {{ request()->is(['sell-productcat','sell-editproductcat/*','sell-addproductcat']) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sell Product Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('sell-product') }}" class="nav-link {{ request()->is(['sell-product','sell-editproduct/*','sell-addproduct']) ? 'active' : '' }}">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Sell Products
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('page-information') }}" class="nav-link {{ request()->is(['informational-page']) ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Informational Page
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('customer-enquiry') }}" class="nav-link {{ request()->is(['customer-enquiry']) ? 'active' : '' }}">
              <i class="nav-icon fa fa-book" aria-hidden="true"></i>
              <p>
                Customer Enquiry
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('testimonial') }}" class="nav-link {{ request()->is(['testimonial']) ? 'active' : '' }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Testimonials
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('blog') }}" class="nav-link {{ request()->is(['blog']) ? 'active' : '' }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Blog
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('edituser/2') }}" class="nav-link {{ request()->is(['edituser/*']) ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Admin Setting
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{ route('signout') }}" class="nav-link {{ request()->is('signout') ? 'active' : '' }}">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
              Logout
              </p>
            </a>
          </li>


          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>