<!DOCTYPE html>
<html>
<head>
  <title>All Posts</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body class="bg-gray-100 p-8">
 
@if(auth()->user() && auth()->user()->isAdmin())
  <div class="bg-yellow-100 text-yellow-300 px-4 py-2 rounded mb-4">
      You are logged in as <strong>Admin</strong>
  </div>
@endif
  
<div class="flex justify-end space-x-4 mb-6">
  <a
    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
    {{Auth::user()->email}}
  </a>
    <a href="{{ route('experiments.index') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Experiments
    </a>
    @if (auth()->user()->is_admin)
    <a href="{{ route('dashboard') }}" class="bg-yellow-100 text-white px-3 py-2 rounded hover:bg-yellow-300">Dashboard</a>
  @endif

    @if(Auth::check())
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    @endif
</div>


  @if (session('success'))
  <!-- Modal Background -->
    <div id="success-modal" class="fixed inset-0 bg-white/30 backdrop-blur-md flex items-center justify-center z-50">
    <!-- Modal Box -->
        <div class="bg-white bg-opacity-90 rounded-lg shadow-xl max-w-md w-full p-6 text-center animate-fade-in">
      <h2 class="text-2xl font-bold text-green-600 mb-2">Success</h2>
      <p class="text-gray-700">{{ session('success') }}</p>
    </div>
  </div>

  <script>
      setTimeout(() => {
          const modal = document.getElementById('success-modal');
          if (modal) {
              modal.classList.add('opacity-0');
              setTimeout(() => modal.remove(), 300); // Remove after fade
          }
      }, 3000); // 3 seconds
  </script>

  <style>
      /* Simple fade-in animation */
      .animate-fade-in {
          animation: fadeIn 0.3s ease-out;
      }

      @keyframes fadeIn {
          from { opacity: 0; transform: scale(0.95); }
          to { opacity: 1; transform: scale(1); }
      }
  </style>
@endif

  <h1 class="text-4xl font-bold mb-6 text-center text-gray-800">All Posts</h1>

  <div class="mb-6 text-center">
    <a href="{{ route('posts.create') }}"
       class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
      Create New Post
    </a>
  </div>

  <div class="max-w-3xl mx-auto">
    @foreach($posts as $post)
      <div class="bg-white rounded shadow p-6 mb-4">
        {{-- Show post owner name ONLY if user is admin --}}
      @if(auth()->user()->is_admin)
        <div class="text-sm text-gray-500 mb-1">
          Posted by: <span class="font-medium">{{ $post->user->name ?? 'Unknown' }}</br>
          From this Email: <span class="font-medium">{{ $post->user->email ?? 'Unknown' }}</span>
           <!-- @if (auth()->user()->is_admin)
    <a href="{{ route('dashboard') }}" class="bg-gray-800 text-white px-3 py-2 rounded hover:bg-gray-700">Dashboard</a>
  @endif -->
        </div>
      @endif
        <h2 class="text-2xl font-semibold text-gray-900 mb-2">{{ $post->title }}</h2>
        <p class="text-gray-700">{{ $post->content }}</p>

        <div class="mt-4 flex space-x-2">
          <!-- Edit button -->
          <a href="{{ route('posts.edit', $post->id) }}"
             class="inline-flex items-center bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition"
   title="Edit Post">
    <!-- Pencil Icon SVG -->
    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
         class="w-5 h-5">
      <path stroke-linecap="round" stroke-linejoin="round"
            d="M16.862 3.487a2.1 2.1 0 0 1 2.97 2.97l-11.1 11.1a2.1 2.1 0 0 1-.878.53l-3.47 1.04 1.04-3.47a2.1 2.1 0 0 1 .53-.878l11.1-11.1Z" />
    </svg>
          </a>

          <!-- Delete button -->
          @if(auth()->id() === $post->user_id || auth()->user()->is_admin)
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="inline-flex items-center bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition"
                    title="Delete Post">
                🗑️ Delete
            </button>
        </form>
    @endif
        </div>
      </div>
    @endforeach
  </div>
</body>
</html>
