@extends('layouts.app')
@section('content')
<article class="article-detail">
    <h1 class="article-title">{{ $article->title }}</h1>
    <div class="article-info">{{ $article->created_at }}</div>
    <div class="article-body">{!! nl2br(e($article->body)) !!}</div>
    @can('update', $article)
    <div class="article-control">
        <a href="{{ route('articles.edit', $article) }}">編集</a>
        <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('articles.destroy', $article) }}" method="post">
            @csrf 
            @method('delete')
            <button type="submit">削除</button>
        </form>
    </div>
    @endcan
</article>
@endsection
