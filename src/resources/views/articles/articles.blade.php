@foreach ($articles as $article)
<article class="article-item">
    <div class="article-title"><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></div>
    <div class="article-info">
        {{ $article->created_at }}｜{{ $article->user->name }}
    </div>
    <div class="article-control">
        @if (!Auth::user()->is_bookmark($article->id))
        <form action="{{ route('bookmark.store', $article) }}" method="post">
            @csrf
            <button>お気に入り登録</button>
        </form>
        @else
        <form action="{{ route('bookmark.destroy', $article) }}" method="post">
            @csrf
            @method('delete')
            <button>お気に入り解除</button>
        </form>
        @endif
    </div>
</article>
@endforeach

{{ $articles->links() }}