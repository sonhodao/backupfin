<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsLetterStore;
use Illuminate\Http\Request;
use App\Models\Newsletter;


class NewsletterController extends Controller
{
    //
    public function postNewsletter(NewsLetterStore $request)
    {
        $email = $request->get('email');
        $isEmail = Newsletter::where('email',$email)->first();
        if(!empty($isEmail)) {
            return 0;
        }
        else {
            $input = $request -> all();
            Newsletter::create($input);
            return 1;
        }    
    }
}
