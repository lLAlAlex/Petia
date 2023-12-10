@extends('master')

@section('title', 'Adoption History')

@section('content')
    <div class="container mx-auto">
        <div class="p-14">
            @if ($histories->isEmpty())
                <h1 class="flex text-center font-bold text-xl justify-center">There are no adoption history yet!</h1>
            @else
                <ul role="list" class="divide-y divide-gray-100">
                    @foreach ($histories as $h)
                        <a href="/historydetail/{{ $h->id }}">
                            <li class="flex justify-between gap-x-6 p-5 my-2 bg-white rounded-lg cursor-pointer">
                                <div class="flex min-w-0 gap-x-4">
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                        src="{{ Storage::url($h->pet->image) }}">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-900">
                                            {{ $h->pet->name }}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                            {{ $h->pet->breed }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    @if ($h->status == 'Accepted')
                                        <p class="text-sm leading-6 text-green-600">{{ $h->status }}</p>
                                    @else
                                        <p class="text-sm leading-6 text-red-600">{{ $h->status }}</p>
                                    @endif
                                    <p class="mt-1 text-xs leading-5 text-gray-500">
                                        {{ Carbon\Carbon::parse($h->lastUpdated)->diffInSeconds() < 60
                                            ? 'Just now'
                                            : (Carbon\Carbon::parse($h->lastUpdated)->diffInSeconds() < 3600
                                                ? Carbon\Carbon::parse($h->lastUpdated)->diffInMinutes() . ' minutes ago'
                                                : (Carbon\Carbon::parse($h->lastUpdated)->diffInSeconds() < 86400
                                                    ? Carbon\Carbon::parse($h->lastUpdated)->diffInHours() . ' hours ago'
                                                    : (Carbon\Carbon::parse($h->lastUpdated)->diffInSeconds() < 604800
                                                        ? Carbon\Carbon::parse($h->lastUpdated)->diffInDays() . ' days ago'
                                                        : (Carbon\Carbon::parse($h->lastUpdated)->diffInSeconds() < 2419200
                                                            ? Carbon\Carbon::parse($h->lastUpdated)->diffInWeeks() . ' weeks ago'
                                                            : (Carbon\Carbon::parse($h->lastUpdated)->diffInSeconds() < 29030400
                                                                ? Carbon\Carbon::parse($h->lastUpdated)->diffInMonths() . ' months ago'
                                                                : Carbon\Carbon::parse($h->lastUpdated)->diffInYears() . ' years ago'))))) }}
                                    </p>
                                </div>
                            </li>
                        </a>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
