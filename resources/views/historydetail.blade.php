@extends('master')

@section('title', 'Adoption History Detail')

@section('content')
    <div class="container flex mx-auto flex-col">
        <div class="flex bg-black w-full max-h-72">
            <img class="flex object-cover w-4/12 mx-auto" src="{{ URL::asset('storage/' . $history->pet->image) }}">
        </div>
        <div class="flex bg-white w-11/12 mx-auto mt-8 p-6 rounded-3xl flex-col mb-6">
            <div class="flex justify-between">
                <div class="text-3xl">{{ $history->pet->name }} - {{ $history->pet->shelter->name }}</div>
                @if ($history->status == 'Accepted')
                    <div class="text-3xl text-green-600">{{ $history->status }}</div>
                @else
                    <div class="text-3xl text-red-600">{{ $history->status }}</div>
                @endif
            </div>
            <div class="text-xl mt-6">{{ $history->pet->breed }}</div>
            <hr class="my-2 mt-6">
            <div class="text-lg">Age: {{ $history->pet->age }}</div>
            <div class="text-lg mt-2">Gender: {{ $history->pet->gender }}</div>
            <div class="text-lg mt-2">Size: {{ $history->pet->size }}</div>
            <div class="text-lg mt-2">Color: {{ $history->pet->color }}</div>
            <hr class="my-2">
            <div class="text-xl mt-6">About {{ $history->pet->name }}</div>
            <div class="text-base mt-2">{{ $history->pet->description }}</div>
        </div>
    </div>
@endsection
