<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat with Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-10">

    <div class="w-full max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">💬 Chat with Admin</h1>
        <div class="text-center mt-4">
    <a href="{{ route('posts.index') }}"
        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Go to Home Page</a>
</div>

        {{-- Messages Section --}}
        <div class="bg-gray-50 border border-gray-300 rounded-lg p-4 max-h-96 overflow-y-auto space-y-4 mb-6">
            @forelse($messages as $message)
                <div class="max-w-md mx-auto border border-gray-300 bg-white rounded-md p-4 shadow">
                    <div class="flex justify-between text-sm text-gray-600 mb-1">
                        <span class="{{ $message->user->is_admin ? 'text-red-600 font-semibold' : 'text-blue-600' }}">
                            {{ $message->user->is_admin ? '👑 Admin' : $message->user->email }}
                        </span>
                        <span class="text-gray-400 text-xs">{{ $message->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-gray-800">{{ $message->content }}</p>
                </div>
            @empty
                <p class="text-center text-gray-500">No messages yet. Start the conversation!</p>
            @endforelse
        </div>

        {{-- Send Message Form --}}
        <form action="{{ route('chat.store') }}" method="POST" class="flex gap-3">
            @csrf
            <input type="text" name="content" placeholder="Type your message..."
                   class="flex-grow border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                   required>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                Send
            </button>
        </form>
    </div>

</body>
</html>




<!-- 
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded mt-10">
    <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">💬 Chat with Admin</h2>

    {{-- Chat messages --}}
    <div class="bg-gray-100 border border-gray-300 rounded p-4 max-h-96 overflow-y-auto space-y-4 mb-6">
        @forelse($messages as $message)
            <div class="max-w-md mx-auto border border-gray-300 bg-white rounded-lg shadow p-3">
                <div class="text-sm text-gray-600 mb-1">
                    <span class="font-semibold {{ $message->user->is_admin ? 'text-red-600' : 'text-blue-600' }}">
                        {{ $message->user->is_admin ? '👑 Admin' : $message->user->email }}
                    </span>
                    <span class="text-xs text-gray-400 float-right">
                        {{ $message->created_at->diffForHumans() }}
                    </span>
                </div>
                <p class="text-gray-800">{{ $message->content }}</p>
            </div>
        @empty
            <p class="text-center text-gray-500">No messages yet. Start the conversation!</p>
        @endforelse
    </div>

    {{-- Message form --}}
    <form action="{{ route('chat.store') }}" method="POST" class="flex items-center gap-3">
        @csrf
        <input type="text" name="content" placeholder="Type your message..."
               class="flex-grow border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg shadow">
            Send
        </button>
    </form>
</div>
 -->



<!-- 


  <h1 class="text-2xl font-bold text-center">Chat Room</h1>
  <p class="text-center mt-4">Try out new ideas here.</p>
  <div class="text-center mt-4">
    <a href="{{ route('experiments.index') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Go to Experiments Page</a>
  </div>

<div class="max-w-3xl mx-auto p-4 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Chat with Admin</h1>

    <div class="mb-4 max-h-96 overflow-y-auto border p-4 bg-gray-50 rounded">
        @foreach($messages as $message)
            <div class="mb-3">
                <strong class="text-sm text-gray-700">
                    {{ $message->user->is_admin ? 'Admin' : $message->user->email }}
                    <span class="text-xs text-gray-500">({{ $message->created_at->diffForHumans() }})</span>
                </strong>
                <p class="text-gray-800">{{ $message->content }}</p>
            </div>
        @endforeach
    </div>

    <form action="{{ route('chat.store') }}" method="POST" class="flex items-center gap-2">
        @csrf
        <input type="text" name="content" class="w-full border rounded p-2" placeholder="Type your message..." required>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Send</button>
    </form>
</div> -->