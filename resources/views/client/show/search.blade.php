@extends('client.layouts.master')

@section('content')
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-3">
                        <div class="position-relative mb-3 h-60">
                            <img class="img-fluid w-100" src="{{ \Storage::url($post->image) }}" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <a class="h4" href="{{ route('show', $post) }}">{{ $post->title }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
