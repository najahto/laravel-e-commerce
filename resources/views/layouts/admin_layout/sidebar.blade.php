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
         <a class="nav-link {{ Request::is('admin/categories*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
             data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-sitemap fa-folder"></i>
             <span>Categories</span>
         </a>
         <div id="collapseTwo" class="collapse {{ Request::is('admin/categories*') ? 'show' : '' }}"
             aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item {{ Request::is('admin/categories/create') ? 'active' : '' }}"
                     href="{{ Route('categories.create') }}">Add Category</a>
                 <a class="collapse-item {{ Request::is('admin/categories') ? 'active' : '' }}"
                     href="{{ Route('categories.index') }}">Categories</a>
             </div>
         </div>
     </li>

     <li class="nav-item {{ Request::is('admin/products*') ? 'active' : '' }}">
         <a class="nav-link {{ Request::is('admin/products*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
             data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-cubes"></i>
             <span>Products</span>
         </a>
         <div id="collapseUtilities" class="collapse {{ Request::is('admin/products*') ? 'show' : '' }}"
             aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item {{ Request::is('admin/products/create') ? 'active' : '' }}"
                     href="{{ Route('products.create') }}">Add Product</a>
                 <a class="collapse-item {{ Request::is('admin/products') ? 'active' : '' }}"
                     href="{{ Route('products.index') }}">Products</a>
             </div>
         </div>
     </li>

     <li class="nav-item {{ Request::is('admin/sliders*') ? 'active' : '' }}">
         <a class="nav-link {{ Request::is('admin/sliders*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
             data-target="#collapseSliders" aria-expanded="true" aria-controls="collapseSliders">
             <i class="fas fa-image"></i>
             <span>Sliders</span>
         </a>
         <div id="collapseSliders" class="collapse {{ Request::is('admin/sliders*') ? 'show' : '' }}"
             aria-labelledby="headingSliders" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item {{ Request::is('admin/sliders/create') ? 'active' : '' }}"
                     href="{{ Route('sliders.create') }}">Add Slider</a>
                 <a class="collapse-item {{ Request::is('admin/sliders') ? 'active' : '' }}"
                     href="{{ Route('sliders.index') }}">Sliders</a>
             </div>
         </div>
     </li>

     <!-- Heading -->
     <div class="sidebar-heading">
         Delivery
     </div>
     <li class="nav-item {{ Request::is('admin/sectors*') ? 'active' : '' }}">
         <a class="nav-link {{ Request::is('admin/sectors*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
             data-target="#collapseSectors" aria-expanded="true" aria-controls="collapseSectors">
             <i class="fas fa-image"></i>
             <span>Sectors</span>
         </a>
         <div id="collapseSectors" class="collapse {{ Request::is('admin/sectors*') ? 'show' : '' }}"
             aria-labelledby="headingSectors" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item {{ Request::is('admin/sectors/create') ? 'active' : '' }}"
                     href="{{ Route('sectors.create') }}">Add Sector</a>
                 <a class="collapse-item {{ Request::is('admin/sectors') ? 'active' : '' }}"
                     href="{{ Route('sectors.index') }}">Sectors</a>
             </div>
         </div>
     </li>

     <li class="nav-item {{ Request::is('admin/areas*') ? 'active' : '' }}">
         <a class="nav-link {{ Request::is('admin/areas*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
             data-target="#collapseAreas" aria-expanded="true" aria-controls="collapseAreas">
             <i class="fas fa-image"></i>
             <span>Areas</span>
         </a>
         <div id="collapseAreas" class="collapse {{ Request::is('admin/areas*') ? 'show' : '' }}"
             aria-labelledby="headingAreas" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item {{ Request::is('admin/areas/create') ? 'active' : '' }}"
                     href="{{ Route('areas.create') }}">Add Area</a>
                 <a class="collapse-item {{ Request::is('admin/areas') ? 'active' : '' }}"
                     href="{{ Route('areas.index') }}">Areas</a>
             </div>
         </div>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="tables.html">
             <i class="fas fa-hammer fa-chart-area"></i>
             <span>Orders</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="tables.html">
             <i class="fas fa-users"></i>
             <span>Users</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="tables.html">
             <i class="fas fa-fw fa-cog"></i>
             <span>Settings</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">



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
