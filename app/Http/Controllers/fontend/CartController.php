<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\support\Facades\Auth;


class CartController extends Controller
{
    public function index()
    {
        $list_cart = session('carts', []);
        return view("fontend.cart", compact('list_cart'));
    }


    public function addcart()
    {

        $productid = $_GET["productid"];
        $qty = $_GET["qty"];
        $product = Product::find($productid);

        //cau truc them 1 item vao gio hang
        $cartitem = array(
            'id' => $productid,
            'image' => $product->image,
            'name' => $product->name,
            'qty' => $qty,
            'price' => ($product->pricesale > 0) ? $product->pricesale : $product->price,
        );
        //gio hang mang 2 chieu
        $carts = session('carts', []);
        if (count($carts) == 0) {
            array_push($carts, $cartitem);
        } else {
            $check = true;
            foreach ($carts as $key => $cart) {
                if (in_array($productid, $cart)) {
                    $carts[$key]['qty'] += $qty;
                    $check = false;
                    break;
                }
            }
            if ($check == true) {
                array_push($carts, $cartitem);
            }
        }
        session(['carts' => $carts]);
    }
    public function update(Request $request)
    {
        $carts = session('carts', []);
        $list_qty = $request->qty;
        foreach ($carts  as $key => $cart) {
            foreach ($list_qty  as $productid => $qtyvakue) {
                if ($carts[$key]['id'] == $productid) {
                    $carts[$key]['qty'] = $qtyvakue;
                }
            }
        }
        session(['carts' => $carts]);
        return redirect()->route('site.cart.index');
    }
    public function delete($id)
    {
        $carts = session('carts', []);
        foreach ($carts  as $key => $cart) {
            if ($carts[$key]['id'] == $id) {
                unset($carts[$key]);
            }
        }
        session(['carts' => $carts]);
        return redirect()->route('site.cart.index');
    }

    public function checkout()
    {
        $list_cart = session('carts', []);
        return view("fontend.checkout", compact('list_cart'));
    }

    public function docheckout(Request $request)
    {
        $user = Auth::user();
        $carts = session('carts', []);
        if (count($carts) > 0) {
            $order = new Order();
            $order->user_id = $user->id;
            $order->delivery_name = $request->name;
            $order->delivery_gender = $user->gender;
            $order->delivery_email = $request->email;
            $order->delivery_phone = $request->phone;
            $order->delivery_address = $request->address;
            $order->note = $request->note;
            $order->created_at = date('Y-m-d H:i:s');
            $order->type = 'online';
            $order->status = 2;
            if ($order->save()) {
                foreach ($carts as $cart) {
                    $orderdetail = new Orderdetail();
                    $orderdetail->order_id = $order->id;
                    $orderdetail->product_id = $cart['id'];
                    $orderdetail->price = $cart['price'];
                    $orderdetail->qty = $cart['qty'];
                    $orderdetail->discount = 0;
                    $orderdetail->amount = $cart['price'] * $cart['qty'];
                    $orderdetail->save();
                }
            }

            session(['carts' => []]);
        }
        return redirect()->route('site.home')->with('success', 'Đặt hàng thành công! Cảm ơn bạn đã mua hàng.');
    }
}
