@extends('layouts.navbar')

@section('content')
    <h1>Edit Profile</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                        value="{{ $user->name }}">
                    <label for="name">Name</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email"
                        value="{{ $user->email }}">
                    <label for="email">Email</label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
            </form>
        </div>
    </div>
@endsection
