@props(['comments','blog'])

@if ($comments->count() )
<section class=" container">
    <div class=" col-md-8 mx-auto">
        <h5 class=" my-3 text-secondary">Comments ({{ $comments->count() }}) </h5>


        @auth
        <form action="/blogs/{{ $blog->slug }}/comments" method="POST">
            @csrf
        <textarea class=" form-control" name="body" cols="30" rows="10">
        </textarea>
            <button class=" btn btn-primary my-3">Add Comment</button>
        </form>
        @endauth


            @foreach ( $comments as $comment )
<x-single-comment :comment="$comment" />
            @endforeach

    </div>
</section>

@endif
