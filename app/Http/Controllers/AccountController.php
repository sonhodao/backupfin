<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('accounts.index');
        $accounts = Account::filter($request->all())
            ->orderByDesc('id')
            ->paginate();
        return view('accounts.index', compact('accounts'));
    }
    public function destroy(Account $account)
    {
        $account->delete();
    }
    public function blockAccount($account)
    {
        $account = Account::where('id', $account)->update(['block' => 1]);
        return redirect()->back()->with('success', 'Đã khóa tài khoản này');
    }

    public function unblockAccount($account)
    {
        $account = Account::where('id', $account)->update(['block' => 0]);
        return redirect()->back()->with('success', 'Đã mở khóa tài khoản này');
    }
}
