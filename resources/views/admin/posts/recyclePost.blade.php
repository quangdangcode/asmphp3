@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Danh sách bản tin
            </h1>
        </section>
        <section class="content">
            <div class="row container-fluid">
                <div class="col-md-11">
                    <div class="box box-primary">
                        <table class="table">
                            <tr>
                                <th scope="col" class="col-1">Id</th>
                                <th scope="col" class="col-2">Tiêu đề</th>
                                <th scope="col" class="col-4">Nội dung</th>
                                <th scope="col" class="col-2">Ảnh</th>
                                <th scope="col" class="col-2">Chuyên mục</th>
                                <th scope="col" class="col-1">Thao tác</th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td>
                                        <img width="100px" src="{{ \Storage::url($post->image) }}" alt="">
                                    </td>
                                    <td>
                                        {{ $post->category->name }}</td>
                                    <td>
                                        <form action="{{ route('admin.recoverPost', $post) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success"
                                                onclick="return confirm('Bạn có chắc chắn muốn phục hồi bản tin này?')">Phục
                                                hồi</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{ $posts->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection
