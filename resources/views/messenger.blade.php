@extends('master')

@section('title', 'Messenger Page')

@section('content')
    <div class="container mx-auto">
        <div class="p-14">
            @if ($conversations->isEmpty())
                <h1 class="flex text-center font-bold text-xl justify-center">There are no conversations yet!</h1>
            @else
                <ul role="list" class="divide-y divide-gray-100">
                    @foreach ($conversations as $c)
                        <a href="/chat/{{ $c->id }}">
                            <li class="flex justify-between gap-x-6 p-5 my-2 bg-white rounded-lg cursor-pointer">
                                <div class="flex min-w-0 gap-x-4">
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                        @if (auth()->user()->role != 'Shelter') src="{{ Storage::url($c->shelter->profileImage) }}"
                                    @else
                                        src="{{ Storage::url($c->user->profileImage) }}" @endif>
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-900">
                                            {{ auth()->user()->role != 'Shelter' ? $c->shelter->name : $c->user->name }}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $c->latestMessage }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-sm leading-6 text-gray-900">
                                        {{ auth()->user()->role != 'Shelter' ? $c->shelter->role : $c->user->role }}</p>
                                    <p class="mt-1 text-xs leading-5 text-gray-500">
                                        {{ Carbon\Carbon::parse($c->lastUpdated)->diffInSeconds() < 60
                                            ? 'Just now'
                                            : (Carbon\Carbon::parse($c->lastUpdated)->diffInSeconds() < 3600
                                                ? Carbon\Carbon::parse($c->lastUpdated)->diffInMinutes() . ' minutes ago'
                                                : (Carbon\Carbon::parse($c->lastUpdated)->diffInSeconds() < 86400
                                                    ? Carbon\Carbon::parse($c->lastUpdated)->diffInHours() . ' hours ago'
                                                    : (Carbon\Carbon::parse($c->lastUpdated)->diffInSeconds() < 604800
                                                        ? Carbon\Carbon::parse($c->lastUpdated)->diffInDays() . ' days ago'
                                                        : (Carbon\Carbon::parse($c->lastUpdated)->diffInSeconds() < 2419200
                                                            ? Carbon\Carbon::parse($c->lastUpdated)->diffInWeeks() . ' weeks ago'
                                                            : (Carbon\Carbon::parse($c->lastUpdated)->diffInSeconds() < 29030400
                                                                ? Carbon\Carbon::parse($c->lastUpdated)->diffInMonths() . ' months ago'
                                                                : Carbon\Carbon::parse($c->lastUpdated)->diffInYears() . ' years ago'))))) }}
                                    </p>
                                </div>
                            </li>
                        </a>
                    @endforeach
                </ul>
            @endif
            @if (auth()->user()->role != 'Shelter')
                <button id="createConversationBtn" type="button"
                    class="absolute p-4 rounded-full bg-[#043B5C] right-6 bottom-6">
                    <svg class="h-6 w-6" width="221" height="220" viewBox="0 0 221 220" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M141.969 129.665L172.003 86.5501C174.975 82.3036 169.338 77.6875 165.033 80.7341L132.641 102.892C131.577 103.61 130.281 103.999 128.951 103.999C127.62 103.999 126.325 103.61 125.261 102.892L101.275 86.6425C94.0995 81.842 83.8488 83.5961 79.0311 90.3352L48.9972 133.45C46.0246 137.697 51.6623 142.312 55.9675 139.265L88.3592 117.108C89.4234 116.39 90.7188 116 92.0493 116C93.3799 116 94.6753 116.39 95.7395 117.108L119.725 133.08C126.9 138.158 137.151 136.404 141.969 129.665Z"
                            fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M110.5 0C49.4725 0 1.52588e-05 48.0174 1.52588e-05 107.25C1.52588e-05 137.666 13.0553 165.133 34 184.641V211.75C34 214.402 35.3134 216.892 37.53 218.442C39.7465 219.993 42.5959 220.416 45.1879 219.576L76.6908 209.385C87.3564 212.708 98.7201 214.5 110.5 214.5C171.528 214.5 221 166.483 221 107.25C221 48.0174 171.528 0 110.5 0ZM17 107.25C17 57.1301 58.8614 16.5 110.5 16.5C162.138 16.5 204 57.1301 204 107.25C204 157.369 162.138 198 110.5 198C99.6257 198 89.2013 196.201 79.516 192.901C77.7372 192.294 75.801 192.28 74.0124 192.858L51 200.303V181.041C51 178.695 49.9704 176.458 48.1688 174.894C29.0267 158.266 17 134.126 17 107.25Z"
                            fill="white" />
                    </svg>
                </button>
            @endif
        </div>
    </div>
    <div id="modal-background" class="hidden fixed inset-0 bg-black bg-opacity-75 transition-opacity"></div>
    <div id="modal-box"
        class="fixed inset-0 z-10 overflow-y-auto transition-transform ease-in-out duration-1000 transform translate-y-full">
        <div class="fixed inset-0 z-10 w-full h-full flex items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-transform ease-in-out duration-300 sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <div class="">
                                <h1 class="text-base font-semibold text-gray-900" id="modal-title">Create Conversation
                                </h1>
                                <form action="{{ route('create_conversation') }}" method="POST"
                                    class="mx-auto max-w-xl sm:mt-5">
                                    @csrf
                                    <div class="sm:col-span-2">
                                        <label for="shelter"
                                            class="block text-sm font-semibold leading-6 text-gray-900">Shelter</label>
                                        <div class="relative mb-2.5">
                                            <div class="absolute inset-y-0 left-0 flex items-center mt-5">
                                                <select id="shelter" name="shelter"
                                                    class="block w-full rounded-md border-0 py-2 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    @foreach ($shelters as $s)
                                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                                    @endforeach
                                                </select>
                                                <svg class="pointer-events-none absolute right-3 top-0 h-full w-5 text-gray-400"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 mt-16 sm:flex sm:flex-row-reverse">
                                        <button type="submit"
                                            class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Create</button>
                                        <button type="button" id="cancelCreateModal"
                                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
