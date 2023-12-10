@extends('master')

@section('title', 'Adoption Request')

@section('content')
    <div class="container mx-auto">
        <div class="p-14">
            @if ($requests->isEmpty())
                <h1 class="flex text-center font-bold text-xl justify-center">There are no adoption requests yet!</h1>
            @else
                <ul role="list" class="divide-y divide-gray-100">
                    @foreach ($requests as $r)
                        <li class="flex justify-between gap-x-6 p-5 my-2 bg-white rounded-lg cursor-pointer">
                            <div class="flex min-w-0 gap-x-4">
                                <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                    @if (auth()->user()->role != 'Shelter') src="{{ Storage::url($r->user->profileImage) }}"
                                        @else
                                            src="{{ Storage::url($r->user->profileImage) }}" @endif>
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">
                                        {{ $r->user->name }}</p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">has sent a request to adopt
                                        {{ $r->pet->name }}</p>
                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:items-end">
                                <form method="POST" action="/acceptrequest/{{ $r->id }}">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <button type="submit"
                                        class="flex justify-center rounded-md bg-blue-600 px-3 mr-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500">Approve</button>
                                </form>
                                <form method="POST" action="/rejectrequest/{{ $r->id }}">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <button type="submit"
                                        class="flex justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500">Reject</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
