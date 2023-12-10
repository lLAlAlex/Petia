@extends('master')

@section('title', 'Pet Detail')

@section('content')
    <div class="container flex mx-auto flex-col">
        <div class="flex bg-black w-full max-h-72">
            <img class="flex object-cover w-4/12 mx-auto" src="{{ URL::asset('storage/' . $pet->image) }}">
        </div>
        <div class="flex bg-white w-11/12 mx-auto mt-8 p-6 rounded-3xl flex-col mb-6">
            <div class="text-3xl">{{ $pet->name }} - {{ $pet->shelter->name }}</div>
            <div class="text-xl mt-6">{{ $pet->breed }}</div>
            <hr class="my-2 mt-6">
            <div class="text-lg">Age: {{ $pet->age }}</div>
            <div class="text-lg mt-2">Gender: {{ $pet->gender }}</div>
            <div class="text-lg mt-2">Size: {{ $pet->size }}</div>
            <div class="text-lg mt-2">Color: {{ $pet->color }}</div>
            <hr class="my-2">
            <div class="text-xl mt-6">About {{ $pet->name }}</div>
            <div class="text-base mt-2">{{ $pet->description }}</div>
        </div>
        @if(auth()->user()->role != 'Shelter')
            <form class="flex mx-auto w-full" method="POST" action="/adopt/{{ $pet->id }}">
                @csrf
                <button type="submit"
                    class="flex mx-auto justify-center mb-6 w-11/12 rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500">Adopt
                    Now</button>
            </form>
        @endif
    </div>
@endsection
