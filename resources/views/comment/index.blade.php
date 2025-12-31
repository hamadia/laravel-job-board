<x-layout :title="$pageTitle">
    <h2>
        Comments Exploring (testing)
    </h2>
    @foreach ($comments as $comment)
        <p class="text-3xl">{{ $comment->post->title }}</p>
        <h1 class="text-2xl">{{ $comment->content }}</h1>
        <p>{{ $comment->author }}</p>
    @endforeach
</x-layout>