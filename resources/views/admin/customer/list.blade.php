@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Danh sách khách hàng
            </h1>
        </section>
        <section class="content">
            <div class="row container-fluid">
                <div class="col-md-11">
                    <div class="box box-primary">
                        <table class="table">
                            <tr>
                                <th scope="col" class="col-1 text-center">Id</th>
                                <th scope="col" class="col-7 text-center">Tên khách hàng</th>
                                <th scope="col" class="col-7 text-center">Tên tài khoản</th>
                                <th scope="col" class="col-7 text-center">Ảnh đại diện</th>
                                <th scope="col" class="col-2 text-center">Email</th>
                                <th scope="col" class="col-2 text-center">Mật khẩu</th>
                            </tr>
                            @foreach ($customer as $customer)
                                <tr>
                                    <td class="text-center">{{ $customer->id }}</td>
                                    <td class="text-center">{{ $customer->full_name }}</td>
                                    <td class="text-center">{{ $customer->use_name }}</td>
                                    <td class="text-center">
                                        <img src="{{ \Storage::url($customer->avatar) }}" alt="" width="100">
                                    </td>
                                    <td class="text-center">{{ $customer->email }}</td>
                                    <td class="text-center">{{ $customer->password }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.deleteUser', $customer) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn bỏ kích hoạt tài khoản này?')">Bỏ kích hoạt</button>
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
