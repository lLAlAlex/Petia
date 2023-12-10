@extends('master')

@section('title', 'Profile')

@section('content')
    <div class="container flex p-8 flex-col">
        <form method="POST" action="">
            @csrf
            <div class="flex items-center">
                <img class="h-48 w-48 rounded-full object-cover" src="{{ Storage::url(auth()->user()->profileImage) }}"
                    alt="profile">
                <input type="file" class="ml-6">
            </div>
        </form>
        <div class="mt-6 w-full bg-white p-6 rounded-3xl">
            <dl class="divide-y divide-black">
                <div class="px-4 pb-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->name }}</dd>
                </div>
                <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Username</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->username }}</dd>
                </div>
                <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Email address</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->email }}</dd>
                </div>
                <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Phone number</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">+62 {{ $user->phone }}</dd>
                </div>
                <div class="px-4 pt-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Role</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->role }}</dd>
                </div>
            </dl>
        </div>
    </div>
@endsection
