


<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Admin Dashboard</h1>
    <div class="text-center mt-4">
    <a href="{{ route('posts.index') }}"
        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Go to Home Page</a>
</div>

    <p class="text-lg mb-6 text-gray-700">
        <strong>Total Posts:</strong> {{ $totalPosts }}
    </p>

    <h2 class="text-xl font-semibold mb-2 text-gray-800">Posts by Users:</h2>
    <ul class="list-disc list-inside text-gray-700">
        @foreach ($postsByUser as $user)
            <li>{{ $user->email }} – {{ $user->posts_count }} {{ Str::plural('post', $user->posts_count) }}</li>
        @endforeach
    </ul>
</div>

