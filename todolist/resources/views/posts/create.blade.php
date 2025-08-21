<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<!-- <body>
    <h1>Create Post</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <input name="title" placeholder="Title" value="{{ old('title') }}"><br><br>
        <textarea name="content" placeholder="Content">{{ old('content') }}</textarea><br><br>
        <button type="submit">Save</button>
    </form>

    <a href="{{ route('posts.index') }}">Back to Posts List</a>
</body> -->

<body class="bg-gray-100 p-8">

    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Create Post</h1>

    @if ($errors->any())
        <div class="max-w-md mx-auto mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.store') }}" class="max-w-md mx-auto bg-white p-6 rounded shadow">
        @csrf
        <input name="title" placeholder="Title" value="{{ old('title') }}"
               class="w-full mb-4 px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600" />

        <textarea name="content" placeholder="Content"
                  class="w-full mb-4 px-3 py-2 border rounded h-32 resize-none focus:outline-none focus:ring-2 focus:ring-blue-600">{{ old('content') }}</textarea>

        <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
            Save
        </button>
    </form>

    <div class="max-w-md mx-auto mt-4 text-center">
        <a href="{{ route('posts.index') }}" class="text-blue-600 hover:underline">Back to Posts List</a>
    </div>

</body>

</html>
