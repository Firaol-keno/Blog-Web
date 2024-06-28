@extends('layouts.app')

@section('content')
<div class="container dashboard__container">
    <button id="show__sidebar-btn" class="sidebar__toggle">
        <i class="uil uil-angle-right-b"></i></button>
    <button id="show__sidebar-btn" class="sidebar__toggle">
        <i class="uil uil-angle-left-b"></i></button>
    <aside>
        <ul>
            <li>
                <a href="{{ route('dashboard.add-post') }}"><i class="uil uil-pen"></i>
                <h5>Add Post</h5></a>
            </li>
            <li>
                <a href="{{ route('dashboard.manage-posts') }}"><i class="uil uil-postcard"></i>
                <h5>Manage Posts</h5></a>
            </li>
            @if(Auth::user()->is_admin)
            <li>
                <a href="{{ url('/dashboard/add-user') }}"><i class="uil uil-plus"></i>
                <h5>Add User</h5></a>
            </li>
            <li>
                <a href="{{ url('/dashboard/manage-users') }}"><i class="uil uil-users-alt"></i>
                <h5>Manage Users</h5></a>
            </li>
            <li>
                <a href="{{ url('/dashboard/add-category') }}"><i class="uil uil-edit"></i>
                <h5>Add Categories</h5></a>
            </li>
            <li>
                <a href="{{ url('/dashboard/manage-categories') }}"><i class="uil uil-list-ul"></i>
                <h5>Manage Categories</h5></a>
            </li>
            @endif
        </ul>
    </aside>
    <main>
        <h2>Manage Posts</h2>
        @if($posts->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->title }}</td>
                    <td><a href="{{ url('/dashboard/edit-post', $post->id) }}" class="btn sm">Edit</a></td>
                    <td><a href="{{ url('/dashboard/delete-post', $post->id) }}" class="btn sm danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="alert__message error">
            <p>No posts found.</p>
        </div>
        @endif
    </main>
</div>
@endsection
