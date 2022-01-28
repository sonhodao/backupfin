<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStore;
use App\Http\Requests\PostUpdate;
use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PostsExport;
use Spatie\Tags\Tag;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize('posts.index');

        $requestAll = Arr::except($request->all(), ['page', '_pjax']);

        $postStatus = Post::STATUS;

        $posts = Post::filter($request->all())
            ->withoutGlobalScope('enabled')
            ->withoutGlobalScope('published')
            ->with('categories')
            ->orderByDesc('id')
            ->paginate();
        return view('posts.index', compact('posts', 'requestAll', 'postStatus'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create(Request $request)
    {
        if (!$request->user()->can('posts.store')) {
            throw new AccessDeniedHttpException;
        }
        return view('posts.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\PostStore $request
     *
     * @return mixed
     */
    public function store(PostStore $request)
    {

        $data = $request->validated();
        $post = Post::create($data);

        $this->storeExtraData($post, $data);
        return redirect()->route('posts.index')->with('success', __('Created post: :title', ['title' => $post->title]));
        
    }

    /**
     * Store post extra data
     *
     * @param \App\Models\Post $post
     * @param array            $data
     *
     * @return void
     */
    public function storeExtraData(Post $post, array $data): void
    {
        if (!empty($data['categories'])) {
            $post->categories()->sync($data['categories']);
        }
        // SEO
        if (!empty($post->seo)) {
            $post->seo->update($data['seo']);
        } else {
            $post->seo()->create($data['seo']);
        }
        // Tag
        $post->syncTagsWithType($data['tags'] ?: [], 'post');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post         $post
     *
     * @return mixed
     */
    public function edit($post)
    {

        $this->authorize('posts.update');

        $post = Post::withoutGlobalScope('enabled')
            ->withoutGlobalScope('published')
            ->findOrFail($post);

        return view('posts.form', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePost $request
     * @param \App\Models\Post              $post
     *
     * @return mixed
     */
    public function update(PostUpdate $request,$post)
    {
        $post = Post::withoutGlobalScope('enabled')
            ->withoutGlobalScope('published')
            ->findOrFail($post);
        $data = $request->all();
        if ($post->update($data)) {
            $this->storeExtraData($post, $data);
        }

        return redirect()->route('posts.index')->with('success', __('Updated post: :title', ['title' => $post->title]));
        // dd($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post         $post
     *
     * @return void
     * @throws \Exception
     */
    public function delete( $post): void
    {
        $post = Post::withoutGlobalScope('enabled')
            ->withoutGlobalScope('published')
            ->findOrFail($post);

        $this->authorize('posts.destroy');

        $post->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post         $post
     *
     * @return void
     * @throws \Exception
     */
    public function destroy($post): void
    {
        $post = Post::where('id', $post);

        $this->authorize('posts.destroy');

        $post->forceDelete();
    }


    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function quickUpdate(Request $request): JsonResponse
    {
        $this->authorize('posts.update');
        $type = $request->input('type');
        $value = $request->input('value');
        $id = $request->input('id');
        $dataUpdate = [$type => $value];
        $result = Post::where('id', '=', $id)
            ->withoutGlobalScope('published')
            ->update($dataUpdate);

        if ($result) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }


    /**
     * Export posts list as excel.
     *
     * @return \Maatwebsite\Excel\BinaryFileResponse|BinaryFileResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export()
    {
        return Excel::download(new PostsExport, 'posts_' . date('Ymd_His') . '.xlsx');
    }
    public function deleteList()
    {
        $postStatus = Post::STATUS;
        $posts = Post::onlyTrashed()
            ->withoutGlobalScope('enabled')
            ->withoutGlobalScope('published')

            ->orderByDesc('id')->paginate();
        return view(
            'posts.delete', compact('postStatus'), [
            'posts' => $posts
            ]
        );
    }
    public function restorePostDelete($id)
    {
        $post = Post::onlyTrashed()
            ->withoutGlobalScope('enabled')
            ->withoutGlobalScope('published')
            ->findOrFail($id);
        if ($post->restore()) {
            return response()->json(['status' => 1]);
        }
        return response()->json(['status' => 0]);
    }

    public function tags(Request $request)
    {
        return Tag::whereType('post')
            ->where('name->' . config('app.locale'), 'LIKE', $request->get('term', '') . '%')
            ->take(20)
            ->get()
            ->pluck('name');
    }

}
