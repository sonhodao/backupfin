<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{__('Recently Added Posts')}}</h3>

        <div class="card-tools cms-action">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">{{__('Thumbnail')}}</th>
                <th scope="col">{{__('Link')}}</th>
                <th scope="col">{{__('Content')}}</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($recentlyAddedPosts as $post)
              <tr>
                <th scope="row">{{$post->id}}</th>
                <td style="padding: 10px">
                    @if (!empty($post->thumbnail))
                            <img src="{{ get_image_url($post->thumbnail, 'smallest') }}" alt="{{ $post->title }}" class="img-size-50">
                    @endif
                </td>
                <td>
                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="post-title">{{ $post->title }}
                    </a>
                </td>
                <td>
                    <span class="post-description">
                        {{ (new \Html2Text\Html2Text($post->excerpt))->getText() }}
                    </span>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer text-center">
        <a href="{{ route('posts.index') }}" class="uppercase">{{__('View All Posts')}}</a>
    </div>
    <!-- /.card-footer -->
</div>
<!-- /.card -->
