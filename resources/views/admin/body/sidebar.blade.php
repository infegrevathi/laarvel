<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
         {{-- <h4>Sri Ramakirishna Hospital</h4> --}}
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('gallery.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">Gallery</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('blog.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="database"></i>
                    <span class="link-title">Blog</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('appoinment.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Appoinment</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
