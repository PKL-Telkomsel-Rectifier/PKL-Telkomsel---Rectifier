<div class="sidebar">
    <h3 class="sidebar-header">Main Navigation</h3>
    <ul class="sidebar-nav">
        <li class="sidebar-nav-item">
            <a href="/home" class="sidebar-nav-link {{ Request::is('home') ? 'active' : '' }}">Home</a>
        </li>
        <li class="sidebar-nav-item">
            <a href="/form" class="sidebar-nav-link {{ Request::is('form') ? 'active' : '' }}">Form</a>
        </li>
        <li class="sidebar-nav-item">
            <a href="/analysis" class="sidebar-nav-link {{ Request::is('analysis') ? 'active' : '' }}">Analysis</a>
        </li>
    </ul>
</div>
