<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Order::where('order.status', '!=', 0)
            ->join('orderdetail', 'order.id', '=', 'orderdetail.order_id')
            ->join('product', 'orderdetail.product_id', '=', 'product.id')
            ->select('order.id', 'order.type', 'order.delivery_name', 'order.delivery_email', 'order.delivery_phone', 'order.status', 'order.created_at', 'product.name as productname', 'orderdetail.qty as productqty', 'orderdetail.price as productprice')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('backend.order.index', compact('list'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }

        $list = Order::join('orderdetail', 'order.id', '=', 'orderdetail.order_id')
            ->join('product', 'orderdetail.product_id', '=', 'product.id')
            ->where('order.id', $id) // chỉ lấy sản phẩm của đơn này
            ->select(
                'product.name as productname',
                'orderdetail.qty as productqty',
                'orderdetail.price as productprice'
            )
            ->get();

        return view('backend.order.show', compact('list', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $list = order::where('status', '!=', 0)
            ->select('id', 'delivery_name', 'delivery_email', 'delivery_phone', 'status', 'created_at')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('backend.order.edit', compact('list', 'order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->delivery_name = $request->delivery_name;
        $order->delivery_email = $request->delivery_email;
        $order->delivery_phone = $request->delivery_phone;
        $order->created_at = $request->created_at;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id() ?? 1;
        $order->save();

        return redirect()->route('admin.order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->delete();

        return redirect()->route('admin.order.trash');
    }

    public function status(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->status = ($order->status == 2) ? 1 : 2;
        $order->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $order->updated_by = Auth::id() ?? 1; //id quản trị
        $order->save();

        return redirect()->route('admin.order.index');
    }

    public function delete(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->status = 0;
        $order->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $order->updated_by = Auth::id() ?? 1; //id quản trị

        $order->save();

        return redirect()->route('admin.order.index');
    }

    public function trash()
    {
        $list = Order::where('status', '=', 0)
            ->select('id', 'delivery_name', 'delivery_email', 'delivery_phone', 'status', 'created_at')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('backend.order.trash', compact('list'));
    }

    public function restore(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->status = 2;
        $order->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $order->updated_by = Auth::id() ?? 1; //id quản trị

        $order->save();

        return redirect()->route('admin.order.trash');
    }

    public function done($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 3; // 3 = Hoàn thành
        $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Đơn hàng đã được cập nhật thành Hoàn thành.');
    }
}
