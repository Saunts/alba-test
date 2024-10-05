<div style="border:1px solid black;" class="mt-4 ml-4 mr-4">
    <div>
        <h1>{{$post->title}}</h1>
    </div>

    <div class="mt-4">
        <img src="{{ asset($post->image) }}" alt="" style="max-height: 1000px; max-width:1000px">
    </div>

    <div class="mt-4">
        {{ $post->post }}
    </div>

    @if (is_countable($bookmarks) && sizeof($bookmarks) != 0 && $bookmarks->contains('post_id', $post->id))
        <div class="mt-4">
            <form action="{{ route('bookmark.delete',$post->id) }}" method="POST">
            @csrf
            @method('POST')

            <button class="btn btn-primary btn-sm">Unfavorite</button>
            </form>
        </div>
    @else
        <div class="mt-4">
            <form action="{{ route('bookmark.add',$post->id) }}" method="POST">
            @csrf
            @method('POST')

                <button class="btn btn-primary btn-sm">Favorite</button>
            </form>
        </div>
    @endif


    @if ( $user->role == 'Admin')
        <div class="mt-4">
            <form action="{{ route('editPost',$post->id) }}" method="GET">
                @csrf
                @method('GET')

                <button class="btn btn-primary btn-sm">Edit</button>
            </form>
        </div>
        <div class="mt-4">
            <form action="{{ route('post.delete',$post->id) }}" method="POST">
            @csrf
            @method('POST')

            <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
    @endif
</div>
