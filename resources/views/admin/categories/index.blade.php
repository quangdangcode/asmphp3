@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Danh sách chuyên mục
            </h1>
        </section>
        <section class="content">
            <div class="row container-fluid">
                <div class="col-md-11">
                    <div class="box box-primary">
                        <table class="table">
                            <tr>
                                <th scope="col" class="col-1 text-center">Id</th>
                                <th scope="col" class="col-7 text-center">Chuyên mục</th>
                                <th scope="col" class="col-2 text-center">Thao tác</th>
                            </tr>
                            @foreach ($categories as $cate)
                                <tr>
                                    <td class="text-center">{{ $cate->id }}</td>
                                    <td class="text-center">{{ $cate->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.edit', $cate) }}">
                                            <button class="btn btn-success">Sửa</button>
                                        </a>
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
