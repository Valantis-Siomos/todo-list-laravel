<!DOCTYPE html>
<html>
<head>
  <title>Edit Task</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

  <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Edit Task</h1>

  @if ($errors->any())
    <div class="max-w-md mx-auto mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
      <ul>
        @foreach ($errors->all() as $error)
          <li>• {{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('tasks.update', $task->id) }}"
        class="max-w-md mx-auto bg-white p-6 rounded shadow">
    @csrf
    @method('PUT')

    <label class="block mb-2 font-medium text-gray-700">Title</label>
    <input name="title" value="{{ old('title', $task->title) }}"
           class="w-full mb-4 px-3 py-2 border rounded focus:ring-2 focus:ring-blue-600"/>

    <label class="block mb-2 font-medium text-gray-700">description</label>
    <textarea name="description" rows="6"
              class="w-full mb-4 px-3 py-2 border rounded focus:ring-2 focus:ring-blue-600">{{ old('description', $task->description) }}</textarea>

    <div class="flex justify-between">
      <button type="submit"
              class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
        Update
      </button>
      <a href="{{ route('tasks.index') }}"
         class="text-gray-600 hover:underline self-center">Cancel</a>
    </div>
  </form>

</body>
</html>