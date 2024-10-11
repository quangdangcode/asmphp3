@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Danh sách bình luận
            </h1>
        </section>
        <section class="content">
            <div class="row container-fluid">
                <div class="col-md-11">
                    <div class="box box-primary">
                        <table class="table">
                            <tr>
                                <th scope="col" class="col-1 text-center">Id</th>
                                <th scope="col" class="col-7 text-center">Bài viết</th>
                                <th scope="col" class="col-7 text-center">Người bình luận</th>
                                <th scope="col" class="col-7 text-center">Nôi dung</th>
                                <th scope="col" class="col-2 text-center">Thời gian</th>
                                <th scope="col" class="col-2 text-center">Mật khẩu</th>
                            </tr>
                            @foreach ($comments as $commnet)
                                <tr>
                                    <td class="text-center">{{ $commnet->id }}</td>
                                    <td class="text-center">{{ $commnet->post->title }}</td>
                                    <td class="text-center">{{ $commnet->user->use_name }}</td>
                                    <td class="text-center">{{ $commnet->content }}</td>
                                    <td class="text-center">{{ $commnet->created_at->format('F d, Y') }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.deleteComment', $commnet) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
