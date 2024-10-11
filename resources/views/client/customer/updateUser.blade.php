@extends('client.layouts.master')
@section('content')
    <form action="{{ route('UpdateBehail') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container mb-3">
            <h1>Cập nhật tài khoản</h1>
            <p>Vui lòng điền vào mẫu này để cập nhật tài khoản.</p>
            <hr>
            <label for="full_name" class="form-label"><b>Họ và tên</b></label>
            <input type="text" class="form-control w-50" placeholder="Họ và tên" name="full_name"
                value="{{ old('full_name', $user->full_name) }}">
            @error('full_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <hr>
            <label for="use_name" class="form-label"><b>Tên tài khoản</b></label>
            <input type="text" class="form-control w-50" name="use_name" value="{{ old('use_name', $user->use_name) }}">
            @error('use_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <hr>
            <label for="avatar"><b>Ảnh đại diện</b></label><br>
            <input type="file" class="mb-3 w-50" name="avatar"><br>
            <img src="{{ \Storage::url($user->avatar) }}" alt="" width="150">
            @error('avatar')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <hr>
            <label for="email"><b>Email</b></label>
            <input type="email" class="form-control w-50" name="email" value="{{ old('email', $user->email) }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <hr>
            <p>Bằng cách tạo một tài khoản, bạn đồng ý với chúng tôi <a href="#">Điều khoản & Quyền riêng tư</a>.</p>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        <br>
        <div class="container signin">
            <p>Bạn có sẵn sàng để tạo một tài khoản? <a href="{{ route('login') }}">Đăng nhập</a>.</p>
        </div>
    </form>
@endsection
