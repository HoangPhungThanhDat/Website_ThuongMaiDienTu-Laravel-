<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại

        // Lấy danh sách đơn hàng, tổng tiền và hình ảnh sản phẩm
        $orders = Order::select('order.id', 'order.user_id', 'order.created_at', 'order.status', 'user.address') // Chỉ chọn các cột cần thiết
            ->selectRaw('SUM(hptd_orderdetail.price * hptd_orderdetail.qty) as total') // Tính tổng tiền
            ->addSelect('product.image as product_image') // Lấy hình ảnh sản phẩm
            ->leftJoin('orderdetail', 'order.id', '=', 'orderdetail.order_id') // Join với bảng orderdetail
            ->leftJoin('product', 'orderdetail.product_id', '=', 'product.id') // Join với bảng product
            ->leftJoin('user', 'order.user_id', '=', 'user.id')
            ->where('order.user_id', $user->id)
            ->groupBy('order.id', 'order.user_id', 'order.created_at', 'order.status', 'product.image', 'user.address') // Nhóm theo các cột đã chọn
            ->orderBy('order.created_at', 'desc')
            ->get();

        return view('fontend.profile', compact('user', 'orders'));
    }


    public function orderDetail($id)
    {
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại

        // Lấy thông tin đơn hàng
        $order = Order::where('id', $id)
            ->where('user_id', $user->id) // Đảm bảo người dùng chỉ xem được đơn hàng của họ
            ->firstOrFail();

        // Lấy chi tiết sản phẩm trong đơn hàng
        $orderDetails = $order->orderDetails()
            ->join('product', 'orderdetail.product_id', '=', 'product.id')
            ->select('product.name', 'product.image', 'orderdetail.price', 'orderdetail.qty')
            ->get();

        return view('fontend.order_detail', compact('order', 'orderDetails'));
    }




    // Cập nhật thông tin cá nhân
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'gender' => 'nullable|in:1,2',
            'address' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->save();

        return redirect()->back()->with('success', 'Thông tin cá nhân đã được cập nhật.');
    }


    public function cancelOrder($id)
    {
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại

        // Tìm đơn hàng theo ID và đảm bảo đơn hàng thuộc về người dùng hiện tại
        $order = Order::where('id', $id)->where('user_id', $user->id)->firstOrFail();

        // Kiểm tra trạng thái đơn hàng
        if ($order->status != 1) {
            return redirect()->back()->with('error', 'Chỉ có thể hủy đơn hàng ở trạng thái Chờ xử lý.');
        }

        // Cập nhật trạng thái đơn hàng thành 0 (Đã hủy)
        $order->status = 0;
        $order->save();

        // Thông báo thành công
        return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công.');
    }
}
