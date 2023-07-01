<x-layout>
    <h1> Video List</h1>
    @foreach ( $videos as $video)
    <h1><a href="/videos/{{ $video ->id }}">{{ $video->title }}</a></h1>

    @endforeach
</x-layout>
