<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStore;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function contact()
    {
        /* Set meta */
        $settings = getMainSettings();
        $metaTitle =  "Liên hệ - Fin Việt Nam";
        $metaDescription = $settings['site_description'] ? $settings['site_description'] : config("f9web-laravel-meta.description-default");
        meta()->set('title', $metaTitle)
            ->set('og:title', $metaTitle)
            ->set('description', $metaDescription)
            ->set('og:description', $metaDescription)
            ->set('canonical', route('fe.contact'));

        meta()->set('robots', 'noindex');

        /* Hết Set meta */
        return view('front_end.contacts.index');
    }
    public function submitContact(ContactStore $request)
    {
        $data = $request->validated();
        Contact::create($data);
        $now = Carbon::now()->format('d-m-Y');
        $titleMail = "Fin Việt Nam " . ' ' . $now;
        $email = $request->email;
        $content = $request->name;
        $data = array("name" => $titleMail, "body" => $content, 'email' => $email);

        /*  Mail::send(
            'front_end.contacts.mail', ['data' => $data], function ($message) use ($titleMail, $data) {
                $message->to($data['email'])->subject($titleMail);
                $message->from($data['email'], $titleMail);
            }
        );*/
        return redirect()->back()->with('success', 'Thông tin của bạn đã được hệ thống ghi nhận');
    }
}
