<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::where('role', '!=', 2);

        return DataTables::of($users)
//            ->addIndexColumn()
////            ->editColumn('status', function($row) {
////                return $row->is_confirmed != null
////                    ? '<span class="badge rounded-pill text-bg-success">Confirmed</span>'
////                    : '<span class="badge rounded-pill text-bg-info">Never Connected</span>';
////            })
//            ->rawColumns(['status'])
            ->make(true);

    }
}
