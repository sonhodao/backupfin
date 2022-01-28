<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewStoreRequest;
use App\Models\ReviewLike;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function postRatingImage(Request $request)
    {
        $image = $request->file('formData');
        $newImage = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/images/testimonial'), $newImage);
        return response()->json(['url' => $request->getSchemeAndHttpHost() . '/storage/images/testimonial/' . $newImage]);
    }

    public function store(ReviewStoreRequest $request)
    {
        $data = $request->validated();
        Review::create($data);
        return response()->json(['success' => 1], 200);
    }
    public function index(Request $request)
    {
        $sort = !empty($request->post_id) ? $request->post_id : 0;
        $reviews = Review::withCount('childrens')->where('post_id', $request->post_id)
            ->where('approved', 1)
            ->where('parent_id', 0);
        if ($sort == 'like') {
            $reviews = $reviews->orderByDesc('count_like');
        }

        $reviews = $reviews->orderByDesc('id')->paginate();
        $totalComment = $reviews->total();
        $totalPage    = $reviews->lastPage();
        return response()->json(
            [
                'view' => view('front_end.reviews.index', compact('reviews'))->render(),
                'totalComment' => $totalComment,
                'totalPage' => $totalPage,
            ]
        );
    }

    public function reply(Request $request)
    {
        $parent_id = !empty($request->parent_id) ? $request->parent_id : 0;
        $reviews = Review::where('approved', 1)
            ->where('parent_id', $parent_id)
            ->orderByDesc('id')->get();

        return response()->json(
            [
                'view' => view('front_end.reviews.reply', compact('reviews'))->render()
            ]
        );
    }


    public function like(Request $request)
    {
        $accountId  = Auth::guard('account')->user()->id;
        $model      = Review::class;
        $modelId    = $request->get('model_id');
        $data       = ["account_id" => $accountId, 'model' => $model, 'model_id' => $modelId, 'like' => 1];
        $reviewLike = ReviewLike::where('model', $model)->where('model_id', $modelId)->where('account_id', $accountId)->first();
        if (!empty($reviewLike)) {
            $like = 0;
            if ($reviewLike->like == 0) {
                $like = 1;
            }
            $reviewLike->update(["like" => $like]);
            $countLike = ReviewLike::where('model', $model)->where('model_id', $modelId)->where('like', 1)->count();
            Review::where('id', $modelId)->update(["count_like" => $countLike]);
           
        } else {
            ReviewLike::create($data);
            $countLike =  ReviewLike::where('model', $model)->where('model_id', $modelId)->where('like', 1)->count();;
            Review::where('id', $modelId)->update(["count_like" => $countLike]);
        
        }
        if ($countLike==0) {
            $countLike = '';
        }
        return response()->json(
            [
                'total_like' =>$countLike
            ]
        );
    }
}
