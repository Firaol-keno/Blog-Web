@extends('layout')

@section('content')
<section class="dashboard">
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle">
            <i class="uil uil-angle-right-b"></i>
        </button>
        <button id="hide__sidebar-btn" class="sidebar__toggle">
            <i class="uil uil-angle-left-b"></i>
        </button>
        <aside>
            <ul>
                <li>
                    <a href="{{ route('dashboard.add-post') }}"><i class="uil uil-pen"></i>
                    <h5>Add Post</h5></a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"><i class="uil uil-postcard"></i>
                    <h5>Manage Posts</h5></a>
                </li>
                <li>
                    <a href="{{ route('dashboard.add-user') }}"><i class="uil uil-plus"></i>
                    <h5>Add User</h5></a>
                </li>
                <li>
                    <a href="{{ route('dashboard.manage-users') }}"><i class="uil uil-users-alt"></i>
                    <h5>Manage Users</h5></a>
                </li>
                <li>
                    <a href="{{ route('dashboard.add-category') }}"><i class="uil uil-edit"></i>
                    <h5>Add Categories</h5></a>
                </li>
                <li>
                    <a href="{{ route('dashboard.manage-categories') }}"><i class="uil uil-list-ul"></i>
                    <h5>Manage Categories</h5></a>
                </li>
            </ul>
        </aside>
        <main>
   <h2>Manage Categories</h2>
   <table>
       <thead>
            <tr>
              <th>Title</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
       </thead>
       <tbody>
           @foreach($categories as $category)
           <tr>          
               <td>{{ $category->title }}</td>
              <td><a href="{{ route('dashboard.edit-category', $category->id) }}" class="btn sm">Edit</a></td>
                <td>
                            <form action="{{ route('dashboard.delete-category', $category->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn sm danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>
</section>
@endsection
