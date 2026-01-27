@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit User Role</h3>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input class="form-control" value="{{ $user->name }}" disabled>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input class="form-control" value="{{ $user->email }}" disabled>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role_id" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id==$role->id?'selected':'' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
