<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\Hash; // Import Hash để mã hóa mật khẩu
class AuthController extends Controller
{
    public function getlogin()
    {
        return view("login");
    }

    public function dologin(Request $request)
    {
        // Lấy thông tin từ form đăng nhập
        $credentials = [
            'password' => $request->password,
            'status' => 1
        ];

        // Kiểm tra nếu username là email hợp lệ thì đăng nhập bằng email, ngược lại đăng nhập bằng username
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $credentials["email"] = $request->username;
        } else {
            $credentials["username"] = $request->username;
        }

        // Thử đăng nhập
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Đăng nhập thành công, chuyển hướng đến trang chủ (route có tên 'site.home')
            return redirect()->route('site.home');
        } else {
            // Đăng nhập không thành công, quay lại trang đăng nhập và hiển thị thông báo lỗi
            return redirect()->route('website.getlogin')->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng!');
        }
    }
    function logout()
    {

        Auth::logout();
        return redirect()->route('site.home');
    }



    // Hiển thị form đăng ký
    public function getregister()
    {
        return view("register");
    }

    // Xử lý đăng ký
    public function doregister(Request $request)
    {
        // Validate dữ liệu từ form đăng ký
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user,username',
            'email' => 'required|email|unique:user,email',
            'phone' => 'required|digits_between:10,15|unique:user,phone',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required|in:1,2', // Giới tính phải là 1 (Nam) hoặc 2 (Nữ)
        ], [
            'gender.required' => 'Vui lòng chọn giới tính.',
            'gender.in' => 'Giới tính không hợp lệ.',
        ]);

        // Tạo người dùng mới
        $user = new User();
        $user->name = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender; // Lưu giới tính
        $user->password = Hash::make($request->password);
        $user->status = 1;
        $user->created_by = 0;
        $user->roles = 'customer';
        $user->save();

        // Chuyển hướng đến trang đăng nhập với thông báo thành công
        return redirect()->route('website.getlogin')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }
}
