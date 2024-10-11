<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{

    const PATH_VIEW = 'client.customer.';


    public function register()
    {
        return view(self::PATH_VIEW . 'register');
    }

    public function registerBehail(Request $request)
    {
        $validated = $request->validate([
            'use_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'use_name.required' => 'Vui lòng nhập tên tài khoản',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',
        ]);

        User::create([
            'use_name' => $validated['use_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công');
    }

    public function updateUser()
    {
        $user = Auth::user();
        return view(self::PATH_VIEW . 'updateUser', compact('user'));
    }


    public function UpdateBehail(Request $request, User $user)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'use_name' => 'required|string|max:255',
            'email' => 'required|email',
            'avatar' => 'required|image|max:2048',
        ], [
            'full_name.required' => 'Vui lòng nhập họ và tên',
            'use_name.required' => 'Vui lòng nhập tên tài khoản',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'avatar.required' => 'Vui lòng chọn hình ảnh',
        ]);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = Storage::put('avatars', $request->file('avatar'));
            // Storage::delete($user->avatar);
        }

        $user->update($validated);
        return redirect()->route('home')->with('success', 'Cập nhật thành công');
    }

    public function login()
    {
        return view(self::PATH_VIEW . 'login');
    }

    public function loginBehail(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);


        if (Auth::attempt($validated)) {
            $user = Auth::user();
            if ($user->active == 0) {
                Auth::logout();
                return back()->with(['success' => 'Tài khoản của bạn đã bị vô hiệu hóa']);
            }

            $request->session()->regenerateToken();
            return redirect()->route('home')->with('success', 'Đăng nhập thành công');
        }

        return back()->withErrors(['password' => 'Thông tin đăng nhập không chính xác'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Đăng xuất thành công');
    }

    public function password()
    {
        return view(self::PATH_VIEW . 'password');
    }

    public function passwordBehail(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|different:current_password',
            'new_password_confirmation' => 'required|same:new_password',
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự',
            'new_password.different' => 'Mật khẩu mới phải khác mật khẩu hiện tại',
            'new_password_confirmation.required' => 'Vui lòng xác nhận mật khẩu mới',
            'new_password_confirmation.same' => 'Xác nhận mật khẩu không khớp với mật khẩu mới',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('home')->with('success', 'Đổi mật khẩu thành công');
    }
}
