<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountStore;
use App\Http\Requests\AccountUpdate;
use App\Http\Requests\EmailLogin;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Rules\Captcha;
use Carbon\Carbon;
use Deployer\Component\PharUpdate\Update;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\ResponseCache\Facades\ResponseCache;

class AcountController extends Controller
{

    public function register()
    {
        /* Set meta */
        $metaTitle = 'Đăng kí - Fin Việt Nam';
        $metaDescription = 'Trung tâm mua sắm thiêt bị Digital & Audio số 1 Đà Nẵng. Chuyên Máy Ảnh, Điện Thoại, Macbook, Loa Bluetooth... Chuyên Setup âm thanh Phòng Phim, Karaoke, Nhà Hàng, Shop, âm thanh đa vùng ...';
        meta()->set('title', $metaTitle)
            ->set('og:title', $metaTitle)
            ->set('description', $metaDescription)
            ->set('og:description', $metaDescription);

        meta()->set('robots', 'noindex');

        /* Hết Set meta */
        return view('front_end.account.register');
    }

    public function registerStore(AccountStore $request)
    {
        $validated = $request->validated();
        $data = Account::create(
            [
            'email' => $validated['email'],
            'name' => $validated['name'],
            'mobile' => $validated['mobile'],
            'password' => bcrypt($validated['password']),
            'username' => $validated['username'],
            ]
        );
        return redirect()->route('fe.login')->with('success', 'Tạo tài khoản thành công');
    }

    public function login()
    {
        /* Set meta */
        $metaTitle = 'Đăng nhập - Fin Việt Nam';
        $metaDescription = 'Trung tâm mua sắm thiêt bị Digital & Audio số 1 Đà Nẵng. Chuyên Máy Ảnh, Điện Thoại, Macbook, Loa Bluetooth... Chuyên Setup âm thanh Phòng Phim, Karaoke, Nhà Hàng, Shop, âm thanh đa vùng ...';
        meta()->set('title', $metaTitle)
            ->set('og:title', $metaTitle)
            ->set('description', $metaDescription)
            ->set('og:description', $metaDescription);

        meta()->set('robots', 'noindex');

        /* Hết Set meta */

        return view('front_end.account.login');
    }

    public function signIn(Request $request)
    {
        $arr1 = [
            'email' => $request->account,
            'password' => $request->password,
        ];
        $arr2 = [
            'mobile' => $request->account,
            'password' => $request->password,
        ];
        $arr3 = [
            'username' => $request->account,
            'password' => $request->password,
        ];

        $account = Account::where('email', $arr1['email'])->orWhere('mobile', $arr2['mobile'])->orWhere('username', $arr3['username'])->first();
        if (empty($account)) {
            return redirect()->back()->with('error', 'Tài khoản không tồn tại');
        } elseif ($account->block == 1) {
            return redirect()->back()->with('error', 'Tài khoản đã bị block !');
        } elseif ($account->block == 0) {
            if (Auth::guard('account')->attempt($arr1)) {
                ResponseCache::clear();
                return redirect()->route('fe.home')->with('success', 'Đăng nhập thành công');
            } elseif (Auth::guard('account')->attempt($arr2)) {
                ResponseCache::clear();
                return redirect()->route('fe.home')->with('success', 'Đăng nhập thành công');
            }
            elseif (Auth::guard('account')->attempt($arr3)) {
                ResponseCache::clear();
                return redirect()->route('fe.home')->with('success', 'Đăng nhập thành công');
            }  else {
                return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng');
            }
        }
    }
    public function logoutAccount(Request $request)
    {

        Auth::guard('account')->logout();
        $request->session()->forget('account');
        ResponseCache::clear();
        return redirect()->route('fe.home');
    }
    public function resetPassword()
    {
        /* Set meta */
        $metaTitle = 'Đặt lại mật khẩu - Fin Việt Nam';
        $metaDescription = 'Trung tâm mua sắm thiêt bị Digital & Audio số 1 Đà Nẵng. Chuyên Máy Ảnh, Điện Thoại, Macbook, Loa Bluetooth... Chuyên Setup âm thanh Phòng Phim, Karaoke, Nhà Hàng, Shop, âm thanh đa vùng ...';
        meta()->set('title', $metaTitle)
            ->set('og:title', $metaTitle)
            ->set('description', $metaDescription)
            ->set('og:description', $metaDescription)
            ->set('canonical', route('fe.resetPassword'));

        meta()->set('robots', 'noindex');

        /* Hết Set meta */
        return view('front_end.account.password');
    }
    public function sendMailReset(EmailLogin $request)
    {
        $email = $request->email;
        $account = Account::where('email', $email)->first();
        $now = Carbon::now()->format('d-m-Y');
        $titleMail = "Lấy lại mật khẩu Website Anh Đức Digital" . ' ' . $now;

        $tokenRandom = Str::random(10);
        $acc = Account::find($account->id);
        $acc->remember_token =  $tokenRandom;
        $acc->save();

        $email = $account->email;
        $link = [
            'email' => $email,
            'token' => $tokenRandom
        ];
        $linkReset = Route('fe.update.pass', $link, true);
        $data = array("name" => $titleMail, "body" => $linkReset, 'email' => $email);

        Mail::send(
            'front_end.account.forget_pass_notify', ['data' => $data], function ($message) use ($titleMail, $data) {
                $message->to($data['email'])->subject($titleMail);
                $message->from($data['email'], $titleMail);
            }
        );
        return redirect()->route('fe.login')->with('success', 'Gửi mail thành công, vui lòng vào email để đặt lại mật khẩu');
    }
    public function updateNewPassword()
    {
        /* Set meta */
        $metaTitle = 'Cập nhật mật khẩu - Fin Việt Nam';
        $metaDescription = 'Trung tâm mua sắm thiêt bị Digital & Audio số 1 Đà Nẵng. Chuyên Máy Ảnh, Điện Thoại, Macbook, Loa Bluetooth... Chuyên Setup âm thanh Phòng Phim, Karaoke, Nhà Hàng, Shop, âm thanh đa vùng ...';
        meta()->set('title', $metaTitle)
            ->set('og:title', $metaTitle)
            ->set('description', $metaDescription)
            ->set('og:description', $metaDescription);

        meta()->set('robots', 'noindex');

        /* Hết Set meta */

        return view('front_end.account.new_pass');
    }
    public function resetNewPassword(Request $request)
    {
        $data = $request->all();
        $tokenRandom = Str::random(10);
        $account = Account::where('email', $data['email'])->orWhere('remember_token', $data['token'])->first();

        if (!empty($account)) {
            $acountId = $account['id'];
            $reset = Account::find($acountId);
            $reset->password = bcrypt($data['password']);
            $reset->remember_token = $tokenRandom;
            $reset->save();
            return redirect()->route('fe.login')->with('success', 'Mật khẩu đã được cập nhật');
        } else {
            return redirect()->route('fe.update.pass')->with('error', 'Cập nhật mật khẩu lỗi');
        }
    }
    public function getAccountInfo(Request $request)
    {
        /* Set meta */
        $metaTitle = 'Thông tin tài khoản - Fin Việt Nam';
        $metaDescription = 'Trung tâm mua sắm thiêt bị Digital & Audio số 1 Đà Nẵng. Chuyên Máy Ảnh, Điện Thoại, Macbook, Loa Bluetooth... Chuyên Setup âm thanh Phòng Phim, Karaoke, Nhà Hàng, Shop, âm thanh đa vùng ...';
        meta()->set('title', $metaTitle)
            ->set('og:title', $metaTitle)
            ->set('description', $metaDescription)
            ->set('og:description', $metaDescription);

        meta()->set('robots', 'noindex');

        /* Hết Set meta */
        return view('front_end.account.info.information');
    }
    public function editAccount(AccountUpdate $request)
    {
        $validated = $request->validated();
        $data = [
            'name' => $validated['name'],
            'password' => bcrypt($validated['password']),
        ];
        Account::findOrFail(Auth::guard('account')->user()->id)->update($data);

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công');
    }

    public function detail(Request $request)
    {
        /* Set meta */
        $metaTitle = 'Chi tiết tài khoản - Fin Việt Nam';
        $metaDescription = 'Trung tâm mua sắm thiêt bị Digital & Audio số 1 Đà Nẵng. Chuyên Máy Ảnh, Điện Thoại, Macbook, Loa Bluetooth... Chuyên Setup âm thanh Phòng Phim, Karaoke, Nhà Hàng, Shop, âm thanh đa vùng ...';
        meta()->set('title', $metaTitle)
            ->set('og:title', $metaTitle)
            ->set('description', $metaDescription)
            ->set('og:description', $metaDescription)
            ->set('canonical', route('fe.account.detail'));

        meta()->set('robots', 'noindex');

        /* Hết Set meta */

        return view('front_end.account.info.detail');
    }

    public function address(Request $request)
    {
        /* Set meta */
        $metaTitle = 'Địa chỉ - Fin Việt Nam';
        $metaDescription = 'Trung tâm mua sắm thiêt bị Digital & Audio số 1 Đà Nẵng. Chuyên Máy Ảnh, Điện Thoại, Macbook, Loa Bluetooth... Chuyên Setup âm thanh Phòng Phim, Karaoke, Nhà Hàng, Shop, âm thanh đa vùng ...';
        meta()->set('title', $metaTitle)
            ->set('og:title', $metaTitle)
            ->set('description', $metaDescription)
            ->set('og:description', $metaDescription);

        meta()->set('robots', 'noindex');

        /* Hết Set meta */
        return view('front_end.account.info.address');
    }

    public function signInPopup(Request $request)
    {
        $arr1 = [
            'email' => $request->account,
            'password' => $request->password,
        ];
        $arr2 = [
            'mobile' => $request->account,
            'password' => $request->password,
        ];
        $arr3 = [
            'username' => $request->account,
            'password' => $request->password,
        ];

        $account = Account::where('email', $arr1['email'])->orWhere('mobile', $arr2['mobile'])->orWhere('username', $arr3['username'])->first();

        if (empty($account)) {
            return 0;
        } elseif ($account->block == 1) {
            return 0;
        } elseif ($account->block == 0) {
            if (Auth::guard('account')->attempt($arr1)) {
                ResponseCache::clear();
                return 1;
            } elseif (Auth::guard('account')->attempt($arr2)) {
                ResponseCache::clear();
                return 1;
            }
            elseif (Auth::guard('account')->attempt($arr3)) {
                ResponseCache::clear();
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function loginPopup(Request $request)
    {
        return view('front_end.account.login-popup');
    }


}
