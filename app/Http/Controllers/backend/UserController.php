<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = User::where('status', '!=', 0)
            ->select('id', 'name', 'image', 'email', 'phone', 'roles', 'status', 'created_at', 'updated_at')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('backend.user.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();

        return view('backend.user.create', compact('user'));
    }

    public function trash()
    {
        $list = User::where('status', '=', 0)
            ->select('id', 'name', 'image', 'email', 'phone', 'roles', 'status')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('backend.user.trash', compact('list'));
    }

    public function store(StoreUserRequest $request)
    {

        $user = new User();

        // Tên trường || tên của thẻ input name
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->roles = $request->roles;
        $user->address = $request->address;
        $user->status = $request->status;

        //Upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            //Lấy đuôi file
            if (in_array($exten, ['png', 'jpg', 'jpeg', 'gif', 'webp'])) {
                $filename = $user->slug.'.'.$exten;
                $request->image->move(public_path('images/users'), $filename);
                $user->image = $filename;
            }
        }

        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = Auth::id() ?? 1; //Id của người quản trị

        $user->save();

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }

        return view('backend.user.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        if (! $user) {
            return redirect()->route('admin.user.index');
        }

        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->roles = $request->roles;
        $user->address = $request->address;
        $user->status = $request->status;

        //Upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            //Lấy đuôi file
            if (in_array($exten, ['png', 'jpg', 'jpeg', 'gif', 'webp'])) {
                $filename = $user->slug.'.'.$exten;
                $request->image->move(public_path('images/users'), $filename);
                $user->image = $filename;
            }
        }

        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1; //Id của người quản trị

        // Lưu vào csdl
        $user->save();

        // Xử lý
        // Chuyển hướng trang
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->delete();

        return redirect()->route('admin.user.trash');
    }

    public function status(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->status = ($user->status == 1) ? 2 : 1;
        $user->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $user->updated_by = Auth::id() ?? 1; //id quản trị
        $user->save();

        return redirect()->route('admin.user.index');
    }

    public function delete(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->status = 0;
        $user->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $user->updated_by = Auth::id() ?? 1; //id quản trị

        $user->save();

        return redirect()->route('admin.user.index');
    }

    public function restore(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->status = 2;
        $user->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $user->updated_by = Auth::id() ?? 1; //id quản trị

        $user->save();

        return redirect()->route('admin.user.trash');
    }

    public function profile()
    {
        $user = Auth::user();

        return view('fontend.profile', compact('user'));
    }

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
