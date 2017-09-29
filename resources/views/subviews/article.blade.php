<article class="card @if (!$article->published) bg-secondary @endif">
                <div class="card-body @if (!$article->published) text-dark @endif">
                <h3>{{ $article->title }}</h3>
                Author: <a href="mailto:".{{$article->author->email}}>{{$article->author->name}}</a>
                <div>{!! $article->teaser !!}</div>
                <div>{!! $article->body !!}</div>
                <div>Tags: 
                @foreach($article->tags as $tag)
                    <a class="badge @if ($article->published) badge-primary @endif" href="/tag/{{$tag->id}}">{{$tag->name}}</a>
                @endforeach
                </div>
                </div>
            </article>