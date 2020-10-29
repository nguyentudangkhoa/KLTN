<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{
    public function DeleteUser(Request $req)
    {
        $user = User::find($req->id);
        if (!$user) {
            return response()->json(['report' => 'Đã có lỗi trong quá trình xóa người dùng']);
        } else {
            User::where('id', $req->id)->delete();
            return response()->json(['success' => 'Xóa người dùng thành công']);
        }
    }
}
