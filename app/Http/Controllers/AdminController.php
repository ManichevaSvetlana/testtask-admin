<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index',[
            'currentPage' => ''
        ]);
    }

    public function getUsers()
    {
        $isGroup = false;
        return view('admin.table-basic',[
            'currentPage' => 'User Management',
            'isGroup' => $isGroup
        ]);
    }

    public function getGroups()
    {
        $isGroup = true;
        return view('admin.table-basic',[
            'currentPage' => 'Group Management',
            'isGroup' => $isGroup
        ]);
    }
}
