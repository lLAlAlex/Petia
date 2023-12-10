@extends('master')

@section('title', 'Pets')

@section('content')
    <div class="container">
        <div class="mt-20 flex flex-wrap w-screen justify-center">
            @foreach ($pets as $p)
                <div
                    class="bg-white relative rounded-xl h-64 flex flex-col mx-5 shadow-xl cursor-pointer hover:scale-110 ease-in-out duration-300">
                    <div class="flex absolute w-12 h-12 bg-white/50 rounded-full top-0 right-0 mt-2 mr-2">
                        <form class="flex mx-auto self-center wishlistForm"
                            action="{{ $wishlists->contains('petID', $p->id) ? "/removeFromWishlist/{$wishlists->where('petID', $p->id)->where('userID', auth()->user()->id)->first()->id}" : "/addToWishlist/{$p->id}" }}"
                            method="POST">
                            @csrf
                            <svg class="wishlistBtn" width="28" height="27" viewBox="0 0 18 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.81784 14.5315L7.81712 14.5309C5.55416 12.4788 3.71609 10.8089 2.43791 9.24513C1.16523 7.68809 0.5 6.2975 0.5 4.8125C0.5 2.38549 2.39305 0.5 4.8125 0.5C6.18385 0.5 7.50831 1.14098 8.37058 2.14564L8.75 2.58771L9.12941 2.14564C9.99168 1.14098 11.3161 0.5 12.6875 0.5C15.1069 0.5 17 2.38549 17 4.8125C17 6.2975 16.3348 7.68809 15.0621 9.24513C13.7839 10.8089 11.9458 12.4788 9.68287 14.5309L9.68216 14.5315L8.75 15.3801L7.81784 14.5315Z"
                                    fill="{{ $wishlists->contains('petID', $p->id) ? '#FF0000' : '#DEDEDE' }}"
                                    stroke="black" />
                            </svg>
                        </form>
                    </div>
                    <a href="/detail/{{ $p->id }}">
                        <img class="object-cover rounded-t-xl h-48 w-48" src="{{ URL::asset('storage/' . $p->image) }}">
                    </a>
                    <div class="text-center my-auto">{{ $p->name }}</div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-16 flex justify-center">
        <div class="bg-white p-4 rounded-lg shadow-lg">
            {{ $pets->links() }}
        </div>
    </div>
@endsection
