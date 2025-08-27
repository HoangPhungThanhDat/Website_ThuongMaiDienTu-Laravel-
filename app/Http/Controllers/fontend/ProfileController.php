<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;

class ProfileController extends Controller
{
    // Hiển thị trang hồ sơ người dùng
    public function profile()
    {
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại
        // Lấy danh sách đơn hàng của người dùng
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
    
        return view('fontend.profile', compact('user', 'orders'));
    }

    // Cập nhật thông tin cá nhân
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'gender' => 'nullable|in:1,2',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->save();

        return redirect()->back()->with('success', 'Thông tin cá nhân đã được cập nhật.');
    }
}