<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupUsers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Exception\ErrorException;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        ResourceController::store(User::class, $request);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $isUser = true;
        return view('admin.pages-profile',[
            'currentPage' => 'Edit',
            'isUser' => $isUser,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        try{
            ResourceController::update($request, $id, User::class);
            $groups = DB::table('group_users');
            $groups = $groups->where('user_id', $id);
            $groups->delete();
           foreach ($request->groups as $group){
               DB::table('group_users')->insert([
                   'user_id' => $id,
                   'group_id' => $group
               ]);
            };
        }
        catch(ErrorException $e){
            return 'Something went wrong.';
        }
    }

    public function destroy($id)
    {
        $groups = DB::table('group_users');
        $groups = $groups->where('user_id', $id);
        $groups->delete();
        ResourceController::destroy(User::class, $id);
    }
}
