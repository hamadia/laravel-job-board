<x-layout :title="$pageTitle">
    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
        <div class="flex items-start justify-between gap-4 p-6 border-b border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900 flex-1 leading-tight">
                {{ $post->title }}
            </h2>

            <div class="flex items-center gap-2 flex-shrink-0">
                <span class="text-sm font-medium text-gray-700">
                    {{ $post->author }}
                </span>
            </div>
        </div>
        <div class="p-6">
            <p class="text-gray-700 leading-relaxed">
                {{ $post->body }}
            </p>
        </div>
        <div class="border-t border-gray-200 bg-gray-50 p-6">
            @forelse ($post->comments as $comment)
                <div class="bg-white p-4 rounded-lg shadow-sm mb-3">
                    <p class="text-gray-700 mb-2">
                        {{ $comment->content }}
                    </p>
                    <p class="text-sm text-gray-900">
                        {{ $comment->author }}
                    </p>
                </div>
            @empty
                <p class="text-gray-500 text-center">No comments yet. Be the first to comment!</p>
            @endforelse
        </div>
        <form method="POST" action="/comments" class="space-y-4">
            @csrf

            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="mb-4">
                <textarea name="content" rows="3" placeholder="Write your comment here..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none transition-all"
                    required>{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <div class="flex gap-3 items-start">
                <div class="flex-1">
                    <input type="text" name="author" placeholder="Your name..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all h-[54px]"
                        value="{{ old('author') }}" required>
                    @error('author')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-colors duration-200 whitespace-nowrap h-[54px]">
                    Publish
                </button>
            </div>
        </form>
    </article>
</x-layout>
