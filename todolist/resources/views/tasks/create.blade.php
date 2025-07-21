<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>

<body class="bg-gray-100 p-8">

    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Create Task</h1>

    @if ($errors->any())
        <div class="max-w-md mx-auto mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tasks.store') }}" class="max-w-md mx-auto bg-white p-6 rounded shadow">
        @csrf
        <input name="title" placeholder="Title" value="{{ old('title') }}"
               class="w-full mb-4 px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600" />

        <textarea name="description" placeholder="description"
                  class="w-full mb-4 px-3 py-2 border rounded h-32 resize-none focus:outline-none focus:ring-2 focus:ring-blue-600">{{ old('description') }}</textarea>

        <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
            Save
        </button>
    </form>

    <div class="max-w-md mx-auto mt-4 text-center">
        <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:underline">Back to Tasks List</a>
    </div>

</body>

</html>
