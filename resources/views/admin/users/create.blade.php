@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Create New User</h1>
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
                    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" value="{{ old('username') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select name="role" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Create User</button>
                    </form>
                </div>
            </div>
    </div>
</section>

@endsection
