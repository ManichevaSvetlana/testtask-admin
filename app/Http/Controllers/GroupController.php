<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function index()
    {
        return Group::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);
        $isUser = false;
        return view('admin.pages-profile',[
            'currentPage' => 'Edit',
            'isUser' => $isUser,
            'group' => $group
        ]);
    }


    public function update(Request $request, $id)
    {
        ResourceController::update($request, $id, Group::class);
    }


    public function destroy($id)
    {
        $groups = DB::table('group_users');
        $groups = $groups->where('group_id', $id);
        $groups->delete();
        ResourceController::destroy(Group::class, $id);
    }


}
