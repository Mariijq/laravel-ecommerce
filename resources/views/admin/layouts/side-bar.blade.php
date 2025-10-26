<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('home')}}">wordsnpages</a>
      </div>

      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
          <a href="{{route('admin.dashbaord')}}" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Starter</li>

        <li class="dropdown active">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Website</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('admin.categories.index')}}">Categories</a></li>
            <li><a class="nav-link" href="{{route('admin.books.index')}}">Books</a></li>
            <li><a class="nav-link" href="{{route('admin.authors.index')}}">Authors</a></li>
            <li><a class="nav-link" href="{{route('admin.slider.index')}}">Slider</a></li>
    </aside>
  </div>