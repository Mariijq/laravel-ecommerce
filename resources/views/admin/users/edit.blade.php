@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Edit User</h1>
    </div>

    <div class="row justify-content-center ">
        <div class="col-md-8">
                <div class="card-header">
                    User Details
                </div>
                @if ($errors->any())
                @foreach ($errors->all() as $error )
                    <span class="alert alert-danger">{{$error}}</span>
                @endforeach 
              @endif
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->userId) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" value="{{ $user->username }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select name="role" class="form-control">
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Update User</button>
                    </form>
                </div>
            </div>
    </div>
</section>

@endsection
