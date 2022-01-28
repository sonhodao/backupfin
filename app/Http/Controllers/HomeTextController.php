<?php

namespace App\Http\Controllers;

use App\Models\HomeText;
use App\Models\OperationLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class HomeTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('home_texts.index');
        $homeTexts = HomeText::get();
        return view('home_texts.index', compact('homeTexts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function log(Request $request)
    {
        $this->authorize('home_texts.log');
        $requestAll = Arr::except($request->all(), ['page', '_pjax']);
        $methods = OperationLog::$methods;
        $logs    = OperationLog::when($request->user, function ($query) use ($request) {
            $query->where('user_id', 'LIKE', '%' . $request->user . '%');
        })
            ->when($request->path, function ($query) use ($request) {
                $query->where('path', 'LIKE', '%' . $request->path . '%');
            })
            ->when($request->getMethod(), function ($query) use ($request) {
                $query->where('method', '==', $request->getMethod());
            })
            ->when($request->ip, function ($query) use ($request) {
                $query->where('ip', 'LIKE', '%' . $request->ip . '%');
            })
            ->when($request->created_at, function ($query) use ($request) {
                $query->whereBetween('created_at', dateRangePicker($request->created_at));
            })
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate();
        /*Todo*/
        $users = User::with('roles')->with('permissions')->get();
        return view('home_texts.log', compact('logs', 'requestAll', 'methods', 'users'));
    }
    public function update(Request $request)
    {
        $this->authorize('home_texts.update');
        $data = Arr::except($request->all(), ['_token', '_pjax']);
        if ( empty($data['isHome_k1']) ) {
            $data['isHome_k1'] = 0;
        }
        if ( empty($data['isHome_k2']) ) {
            $data['isHome_k2'] = 0;
        }
        if ( empty($data['isHome_k3']) ) {
            $data['isHome_k3'] = 0;
        }
        if ( empty($data['isHome_k4']) ) {
            $data['isHome_k4'] = 0;
        }
        if ( empty($data['isHome_k5']) ) {
            $data['isHome_k5'] = 0;
        }
        if ( empty($data['isHome_k6']) ) {
            $data['isHome_k6'] = 0;
        }
        foreach ($data as $name => $value) {
            $homeText = HomeText::where('text_name', '=', $name)->update(["text_value" => $value]);
        }
        if (!empty($request->header) ) {
            file_put_contents('script_add_header.txt', $request->header);
        }
        return redirect()->route('home_texts.index')->with('success', __('Updated success'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('home_texts.destroy');
        $ids = explode(',', $id);
        if ($ids && !OperationLog::destroy(array_filter($ids))) {
            throw new AccessDeniedHttpException;
        }
    }
}
