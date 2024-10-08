<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $user = User::orderby("id", "DESC")->get()->all();
        return view('backend/users/listuser', ["user"=>$user]);
    }
    public function create(){
        return view('backend/users/adduser');
    }
    public function store(AddUserRequest $request){
        $user = new User();
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->level = $request->level;

        $user->save();
        $request->session()->flash("alert", "Đã thêm thành công!");
        return redirect("/admin/user");
    } 
    public function edit(Request $request){
        $id = $request->id;
        $user = User::find($id)->toArray();

        return view('backend/users/edituser', ["user"=>$user]);
    } 
    public function update(EditUserRequest $request){
        $id = $request->id;
        $user = User::find($id);
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->level = $request->level;
        $user->save();

        $request->session()->flash("alert", "đã sửa thành công");
        return redirect("/admin/user");
    }
    public function delete(Request $request){
        $user = User::find($request->id);
        $user->delete();
        $request->session()->flash("alert", "đã xóa thành công");

        return redirect("/admin/user");
    }
}
