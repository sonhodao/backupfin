<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\SocialProvider;
use App\Models\UserGoogle;
use Illuminate\Http\Request;
use Validator, Redirect, Response, File;
use Socialite;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Spatie\ResponseCache\Facades\ResponseCache;

class SocialController extends Controller
{
    public function redirect(Request $request, $social)
    {
        $url = url()->previous();
        if ($url == route('fe.register') || $url == route('fe.login') || $url == route('fe.resetPassword')) {
            $url = route('fe.home');
        }
        $urlRedirect = $request->session()->put('url',  $url);

        switch ($social) {
            case 'facebook':
                return Socialite::driver($social)->redirect();
                break;
            case 'google':
                return Socialite::driver($social)->redirect();
                break;
        }
    }

    public function callback($provider)
    {

        $getInfo = Socialite::driver($provider)->user();

        $user = $this->createUser($getInfo, $provider);

        Auth::guard('account')->login($user);
        ResponseCache::clear();

        return redirect(session()->get('url'))->with('success', 'Đăng nhập thành công');
    }
    function createUser($getInfo, $provider)
    {

        $user = Account::where('provider_id', $getInfo->id)->orWhere('email', $getInfo->email)->first();

        if (!$user) {
            $user = Account::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
        } elseif ($user->email == $getInfo->email) {
            $data = [
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ];
            $account = Account::where('email', $getInfo->email)->update($data);
        }
        return $user;
    }
}
