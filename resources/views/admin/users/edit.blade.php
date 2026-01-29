@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-8">
        <h3 class="text-3xl font-bold text-gray-900">Edit User Role</h3>
        <p class="text-gray-500 mt-1">Update user permissions and details</p>
    </div>

    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            
            <div class="p-8 space-y-6">
                <!-- Read-only Fields Group -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" value="{{ $user->name }}" disabled
                            class="block w-full rounded-xl border-gray-200 bg-gray-50 text-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm cursor-not-allowed">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" value="{{ $user->email }}" disabled
                            class="block w-full rounded-xl border-gray-200 bg-gray-50 text-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm cursor-not-allowed">
                    </div>
                </div>

                <!-- Role Selection -->
                <div>
                    <label for="role_id" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                    <div class="relative">
                        <select name="role_id" id="role_id"
                            class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-3 pl-4 pr-10">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">Assigning the 'Admin' role grants full access to the system.</p>
                </div>
            </div>

            <!-- Actions -->
            <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end space-x-3">
                <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                    Cancel
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-xl shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
