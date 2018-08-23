    

@foreach( $comments as $comment )
        
            @if( $loop->first && $comment->parent_id==0 )
                @if( $comments->count() > 1)
                <a class="toggler" data-toggle="collapse" href=".collapseExample{{ $comment->parent_id }}" role="button" aria-expanded="false" aria-controls="collapseExample{{ $comment->parent_id }}"><small class="text-muted">{{$comments->count()}} comments</small></a>
                @else
                <a class="toggler" data-toggle="collapse" href=".collapseExample{{ $comment->parent_id }}" role="button" aria-expanded="false" aria-controls="collapseExample{{ $comment->parent_id }}"><small class="text-muted">{{$comments->count()}} comment</small></a>
                @endif
            @endif

             @if( $loop->first && $comment->parent_id!=0 )
                @if( $comments->count() > 1)
                <a class="toggler" data-toggle="collapse" href=".collapseExample{{ $comment->parent_id }}" role="button" aria-expanded="false" aria-controls="collapseExample{{ $comment->parent_id }}"><small class="text-muted">{{$comments->count()}} replies</small></a>
                @else
                <a class="toggler" data-toggle="collapse" href=".collapseExample{{ $comment->parent_id }}" role="button" aria-expanded="false" aria-controls="collapseExample{{ $comment->parent_id }}"><small class="text-muted">{{$comments->count()}} reply</small></a>
                @endif
            @endif
       
           

    <div class="display-comment collapse collapseExample{{ $comment->parent_id }}" >
        
        <strong class="text-muted">{{ $comment->user->name }}</strong>
                    
        <p>{{ $comment->body }}</p>
              
        
        @auth
            @if($comment->parent_id==0) <!--limit the comment nesting to only one level-->
                <form method="post" action="{{ route('reply.add') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="comment_body" class="form-control" required/>
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