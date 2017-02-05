<ul class="sidebar-nav">
    <li class="{{ Request::is("admin") ? "active" : "" }}" >
        <a href="{{ route('admin.index') }}">Dashboard</a>
    </li>
    <li class="{{ Request::is("admin/reviews") ? "active" : "" }}" >
        <a href="{{ route('admin.reviews') }}">Reviews</a>
    </li>
    <li class="{{ Request::is("admin/posts") ? "active" : "" }}" >
        <a href="{{ route('admin.posts') }}">Posts</a>
    </li>
    <li class="{{ Request::is("admin/tags") ? "active" : "" }}" >
        <a href="{{ route('admin.tags') }}">Tags</a>
    </li>
</ul>