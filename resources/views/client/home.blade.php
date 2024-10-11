@extends('client.layouts.master')

@section('content')
    <div class="container-fluid py-3">
        <div class="w-75 mx-auto">
            <h3 class="mb-3 mt-2">Mới nhất</h3>
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
                @foreach ($postNew as $post)
                    <div class="position-relative overflow-hidden mb-3" style="width: 330px; height: 300px;">
                        <img src="{{ \Storage::url($post->image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1" style="font-size: 13px;">
                                <a class="text-white" href="">{{ $post->category->name }}</a>
                                <span class="px-1 text-white">/</span>
                                <a class="text-white" href="">{{ $post->created_at->format('F d, Y') }}</a>
                            </div>
                            <a class="h4 m-0 text-white" href="{{ route('show', $post) }}">{{ $post->title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container">
            @foreach ($categories as $category)
                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">{{ $category->name }}</h3>
                    <a class="text-secondary font-weight-medium text-decoration-none" href="{{ route('category', $category) }}">View All</a>
                </div>
                <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
                    @foreach ($category->post->where('IsActive', 1) as $post)
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img width="100px" src="{{ \Storage::url($post->image) }}" style="width: 100%; height: 100%; object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a class="text-white" href="">{{ $category->name }}</a>
                                    <span class="px-1 text-white">/</span>
                                    <a class="text-white" href="">{{ $post->created_at->format('F d, Y') }}</a>
                                </div>
                                <a class="h4 m-0 text-white" href="{{ route('show', $post) }}">{{ $post->title }}</a>
                            </div>
                        </div>
                    @endforeach
                </div><br>
            @endforeach
        </div>
    </div>
@endsection
