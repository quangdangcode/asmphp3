@extends('client.layouts.master')
@section('content')
    <form action="{{ route('passwordBehail') }}" method="POST">
        @csrf
        <div class="container">
            <h1>Đổi mật khẩu</h1>
            <p>Vui lòng điền vào mẫu này để đổi mật khẩu.</p>
            <hr>
            <label for="current_password"><b>Mật khẩu hiện tại</b></label><br>
            <input type="password" class="form-control w-50" placeholder="Mật khẩu hiện tại" name="current_password">
            @error('current_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <hr>
            <label for="new_password"><b>Mật khẩu mới</b></label><br>
            <input type="password" class="form-control w-50" placeholder="Mật khẩu mới" name="new_password">
            @error('new_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <hr>
            <label for="new_password_confirmation"><b>Xác nhận mật khẩu mới</b></label><br>
            <input type="password" class="form-control w-50" placeholder="Xác nhận mật khẩu mới"
                name="new_password_confirmation">
            @error('new_password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <hr>
            <p>Bằng cách tạo một tài khoản, bạn đồng ý với chúng tôi <a href="#">Điều khoản & Quyền riêng tư</a>.</p>
            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
        </div><br>
        <div class="container signin">
            <p>Nếu bạn chưa có tài khoản hãy <a href="{{ route('register') }}">Đăng ký</a>.</p>
        </div>
        <div class="container signin">
            <p>Nếu bạn quên mật khẩu <a href="">Lấy lại mật khẩu</a>.</p>
        </div>
    </form>
@endsection
