<ul class="sidebar-nav">
    <li class="{{ Request::is("admin") ? "active" : "" }}" >
        <a href="{{ url('/admin') }}">Dashboard</a>
    </li>
    <li class="{{ Request::is("admin/reviews") ? "active" : "" }}" >
        <a href="{{ url('/admin/reviews') }}">Reviews</a>
    </li>
    <li class="{{ Request::is("admin/posts") ? "active" : "" }}" >
        <a href="#">Posts</a>
    </li>
    <li class="{{ Request::is("admin/jobs") ? "active" : "" }}" >
        <a href="#">Jobs</a>
    </li>
    <li class="{{ Request::is("admin/tags") ? "active" : "" }}" >
        <a href="#">Tags</a>
    </li>
</ul>