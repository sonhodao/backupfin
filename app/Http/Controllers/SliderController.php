<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\SliderStore;
use App\Http\Requests\SliderUpdate;
use Illuminate\Http\JsonResponse;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize('sliders.index');

        $sliders = Slider::search($request->get('q'))
            ->with('category')
            ->orderBy('sort', 'ASC')
            ->orderBy('id', 'DESC')
            ->paginate();

        return view('sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->user()->can('sliders.store')) {
            throw new AccessDeniedHttpException;
        }
        return view('sliders.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\\SliderStore $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SliderStore $request)
    {
        $validated = $request->validated();
        $slider = Slider::create($validated);

        return redirect()
            ->route('sliders.index')
            ->with('success', __('Created slider: :title', ['title' => $slider->title]));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Slider       $slider
     *
     * @return mixed
     */
    public function edit(Request $request, Slider $slider)
    {
        if (!$request->user()->can('sliders.update')) {
            throw new AccessDeniedHttpException;
        }
        return view('sliders.form', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\SliderUpdate $request
     * @param \App\Models\Slider              $slider
     *
     * @return mixed
     */
    public function update(SliderUpdate $request, Slider $slider)
    {
        $validated = $request->validated();
        $slider->update($validated);
        return redirect()
            ->route('sliders.index')
            ->with('success', __('Updated slider: :title', ['title' => $slider->title]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int                $id
     * @param \App\Models\Slider $slider
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Slider $slider)
    {
        if (!$request->user()->can('sliders.destroy')) {
            throw new AccessDeniedHttpException;
        }
        if (!$slider->delete()) {
            throw new AccessDeniedHttpException;
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function quickUpdate(Request $request): JsonResponse
    {
        $this->authorize('sliders.update');
        $type = $request->input('type');
        $value = $request->input('value');
        $id = $request->input('id');
        $dataUpdate = [$type => $value];
        $result = Slider::where('id', '=', $id)->update($dataUpdate);

        if ($result) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
}
