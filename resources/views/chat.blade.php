@extends('master')

@section('title', 'Chat')

@section('content')
    <form action="/chat/{{ $conversation->id }}" id="chatForm" method="POST">
        @csrf
        <div class="container flex justify-center flex-col mx-auto">
            <div class="flex w-full h-auto bg-white p-3 items-center">
                <a href="/messenger">
                    <svg class="mr-4 cursor-pointer" width="28" height="28" viewBox="0 0 28 28" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.125 13.125H23.625C23.8571 13.125 24.0796 13.2172 24.2437 13.3813C24.4078 13.5454 24.5 13.7679 24.5 14C24.5 14.2321 24.4078 14.4546 24.2437 14.6187C24.0796 14.7828 23.8571 14.875 23.625 14.875H6.125C5.89294 14.875 5.67038 14.7828 5.50628 14.6187C5.34219 14.4546 5.25 14.2321 5.25 14C5.25 13.7679 5.34219 13.5454 5.50628 13.3813C5.67038 13.2172 5.89294 13.125 6.125 13.125Z"
                            fill="black" />
                        <path
                            d="M6.48723 14L13.7445 21.2555C13.9088 21.4198 14.0011 21.6426 14.0011 21.875C14.0011 22.1074 13.9088 22.3302 13.7445 22.4945C13.5802 22.6588 13.3573 22.7511 13.125 22.7511C12.8926 22.7511 12.6698 22.6588 12.5055 22.4945L4.63048 14.6195C4.54899 14.5382 4.48434 14.4417 4.44023 14.3354C4.39612 14.2291 4.37341 14.1151 4.37341 14C4.37341 13.8849 4.39612 13.771 4.44023 13.6646C4.48434 13.5583 4.54899 13.4618 4.63048 13.3805L12.5055 5.50551C12.6698 5.3412 12.8926 5.2489 13.125 5.2489C13.3573 5.2489 13.5802 5.3412 13.7445 5.50551C13.9088 5.66981 14.0011 5.89265 14.0011 6.12501C14.0011 6.35736 13.9088 6.58021 13.7445 6.74451L6.48723 14Z"
                            fill="black" />
                    </svg>
                </a>
                <img class="h-14 w-14 rounded-full object-cover"
                    @if (auth()->user()->role != 'Shelter') src="{{ Storage::url($conversation->shelter->profileImage) }}"
                    @else
                        src="{{ Storage::url($conversation->user->profileImage) }}" @endif
                    alt="profile">
                <div class="ml-4 text-lg">
                    {{ auth()->user()->role != 'Shelter' ? $conversation->shelter->name : $conversation->user->name }}
                </div>
            </div>
            <div class="flex w-full px-2 flex-col overflow-auto max-h-[33rem] justify-items-center scrollbar-hide">
                @foreach ($messages as $m)
                    @if ($m->from == auth()->user()->id)
                        <div class="rounded-full w-fit bg-[#043B5C] text-white p-2 px-4 mb-2">{{ $m->text }}</div>
                    @else
                        <div class="rounded-full w-fit bg-white text-black p-2 px-4 mb-2 self-end">{{ $m->text }}</div>
                    @endif
                @endforeach
            </div>
            <div class="absolute bottom-0 w-full bg-white flex bg-scroll">
                <div class="flex p-5 justify-between w-screen">
                    <input autocomplete="off" class="w-11/12 focus:outline-none" name="message"
                        placeholder="Type a message..." />
                    <input class="invisible" name="shelterID" value="{{ $conversation->shelter->id }}">
                    <input class="invisible" name="userID" value="{{ $conversation->user->id }}">
                    <svg id="sendMessageBtn" class="cursor-pointer" width="32" height="32" viewBox="0 0 32 32"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M27.4499 15.11L5.44988 4.11001C5.27745 4.02377 5.08377 3.98922 4.89216 4.01051C4.70055 4.0318 4.51918 4.10803 4.36988 4.23001C4.22731 4.3495 4.12089 4.50639 4.06259 4.68305C4.0043 4.85971 3.99643 5.04912 4.03988 5.23001L6.68988 15H17.9999V17H6.68988L3.99988 26.74C3.95911 26.8911 3.95435 27.0496 3.98599 27.2028C4.01763 27.356 4.08478 27.4997 4.18204 27.6223C4.27931 27.7448 4.40398 27.8428 4.54602 27.9084C4.68806 27.9741 4.84352 28.0054 4.99988 28C5.15643 27.9991 5.31056 27.9614 5.44988 27.89L27.4499 16.89C27.6137 16.8061 27.7512 16.6786 27.8471 16.5216C27.9431 16.3645 27.9939 16.1841 27.9939 16C27.9939 15.816 27.9431 15.6355 27.8471 15.4785C27.7512 15.3214 27.6137 15.1939 27.4499 15.11Z"
                            fill="#043B5C" />
                    </svg>
                </div>
            </div>
        </div>
    </form>
@endsection
