<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminCustomer extends Controller
{
    const PATH_VIEW = 'admin.customer.';
    public function customer()
    {
        $customer = User::where('active', '1')->get();
        return view(self::PATH_VIEW . 'list', compact('customer'));
    }

    public function recycle()
    {
        $customer = User::where('active', '0')->get();
        return view(self::PATH_VIEW . 'recycle', compact('customer'));
    }
    public function deleteUser(User $user)
    {
        $user->update(['active' => 0]);
        return redirect()->route('admin.customer');
    }

    public function recycleUser(User $user)
    {
        $user->update(['active' => 1]);
        return redirect()->route('admin.customer');
    }
}
