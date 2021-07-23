 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Vegifood <sup>2</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('admin.dashboard') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <li class="nav-item {{ Request::is('admin/categories*') ? 'active' : '' }}">
         <a class="nav-link {{ Request::is('admin/categories*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Categories</span>
         </a>
         <div id="collapseTwo" class="collapse {{ Request::is('admin/categories*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item {{ Request::is('admin/categories/create') ? 'active' : '' }}" href="{{ Route('categories.create') }}">Add Category</a>
                 <a class="collapse-item {{ Request::is('admin/categories') ? 'active' : '' }}" href="{{ Route('categories.index') }}">Categories</a>
             </div>
         </div>
     </li>

     <li class="nav-item {{ Request::is('admin/products*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('admin/products*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Products</span>
        </a>
        <div id="collapseUtilities" class="collapse {{ Request::is('admin/products*') ? 'show' : '' }}" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/products/create') ? 'active' : '' }}" href="{{ Route('products.create') }}">Add Product</a>
                <a class="collapse-item {{ Request::is('admin/products') ? 'active' : '' }}" href="{{ Route('products.index') }}">Products</a>
            </div>
        </div>
    </li>
    
     <li class="nav-item {{ Request::is('admin/sliders*') ? 'active' : '' }}">
         <a class="nav-link {{ Request::is('admin/sliders*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseSliders"
             aria-expanded="true" aria-controls="collapseSliders">
             <i class="fas fa-fw fa-wrench"></i>
             <span>Sliders</span>
         </a>
         <div id="collapseSliders" class="collapse {{ Request::is('admin/sliders*') ? 'show' : '' }}" aria-labelledby="headingSliders"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item {{ Request::is('admin/sliders/create') ? 'active' : '' }}" href="{{ Route('sliders.create') }}">Add Slider</a>
                 <a class="collapse-item {{ Request::is('admin/sliders') ? 'active' : '' }}" href="{{ Route('sliders.index') }}">Sliders</a>
             </div>
         </div>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="tables.html">
             <i class="fas fa-fw fa-table"></i>
             <span>Orders</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         MISCELLANEOUS
     </div>

     <!-- Nav Item - MISCELLANEOUS -->
     <li class="nav-item">
         <a class="nav-link" href="tables.html">
             <i class="fas fa-fw fa-table"></i>
             <span>Documentation</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->
