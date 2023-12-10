@extends('master')

@section('title', 'Create New Adoption')

@section('content')
    <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Create New Adoption</h2>
        </div>
        <form action="{{ route('register') }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
            @csrf
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="firstName" class="block text-sm font-semibold leading-6 text-gray-900">Pet Name</label>
                    <div class="mt-2.5">
                        <input type="text" name="firstName" id="firstName" autocomplete="given-name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="username" class="block text-sm font-semibold leading-6 text-gray-900"></label>
                    <div class="mt-2.5">
                        <input type="text" name="username" id="username" autocomplete="nickname"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="type" class="block text-sm font-semibold leading-6 text-gray-900">Pet Type</label>
                    <div class="relative mt-2.5">
                        <div class="absolute inset-y-0 left-0 flex items-center w-full">
                            <label for="type" class="sr-only">Pet Type</label>
                            <select id="type" name="type"
                                class="h-full w-full rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-4 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                <option>Dog</option>
                                <option>Cat</option>
                            </select>
                        </div>
                        <input type="text" name="type" id="type"
                            class="block w-full rounded-md border-0 px-3.5 py-2 pl-20 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
            <div class="mt-10">
                <button type="submit"
                    class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
            </div>
        </form>
    </div>
@endsection
