    
@if(@$comment->parent_id!=0)
    @if( @$comments->count() > 1 )
        <small class="text-muted">{{$comments->count()}} replies</small>
    @else
    <small class="text-muted">{{$comments->count()}} reply</small>
    @endif
@endif

@foreach($comments as $comment)

    <div class="display-comment">
        <strong class="text-muted">{{ $comment->user->name }}</strong>
                    
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        @auth
            @if(@$comment->parent_id==0) <!--limit the comment nesting to only one level-->
                <form method="post" action="{{ route('reply.add') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="comment_body" class="form-control" />
                        <input type="hidden" name="pub_id" value="{{ $pub_id }}" />
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-primary btn-sm" value="Reply" />
                    </div>
                </form>
            @endif
        @endauth
            @include('layouts.partials._comment_replies', ['comments' => $comment->replies])
        
    </div>
@endforeach