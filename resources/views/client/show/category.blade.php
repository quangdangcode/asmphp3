@extends('client.layouts.master')

@section('content')
    <div class="container-fluid py-3">
        <div class="w-75 mx-auto">
            <h3 class="mb-3 mt-2">Mới nhất</h3>
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
                @foreach ($posts as $post)
                    <div class="position-relative overflow-hidden mb-3" style="width: 330px; height: 300px;">
                        <img src="{{ \Storage::url($post->image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1" style="font-size: 13px;">
                                <a class="text-white" href="">{{ $post->created_at->format('F d, Y') }}</a>
                            </div>
                            <a class="h4 m-0 text-white" href="{{ route('show', $post) }}">{{ $post->title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
