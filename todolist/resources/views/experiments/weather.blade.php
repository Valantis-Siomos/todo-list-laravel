


<!-- <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Check the Weather</h1>

    @if ($weather)
        <p class="text-lg">Temperature: {{ $weather['main']['temp'] }}°C</p>
        <p class="text-lg">Description: {{ $weather['weather'][0]['description'] }}</p>
        <p class="text-lg">Humidity: {{ $weather['main']['humidity'] }}%</p>
        <p class="text-lg">Wind: {{ $weather['wind']['speed'] }} m/s</p>
    @else
        <p class="text-red-500">Unable to fetch weather data.</p>
    @endif
</div>

<a href="{{ route('experiments.index') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Go to Experiments Page</a>
  </div> -->

<div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Check the Weather</h1>

    <form method="GET" action="{{ route('experiments.weather') }}" class="mb-6">
        <label for="city" class="block mb-2 font-semibold">Enter a city name:</label>
        <input type="text" name="city" id="city" value="{{ old('city', $city) }}"
               placeholder="e.g. Athens, London, Tokyo"
               class="w-full px-4 py-2 border rounded" required>

        <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Check Weather
        </button>
    </form>

    @if ($city && $weather === false)
        <div class="text-red-600 font-semibold">City not found or API error. Please try again.</div>
    @elseif ($weather)
        <div class="text-gray-800">
            <h2 class="text-xl font-semibold mb-2">Weather in {{ ucfirst($city) }}</h2>
            <p><strong>Temperature:</strong> {{ $weather['main']['temp'] }}°C</p>
            <p><strong>Description:</strong> {{ $weather['weather'][0]['description'] }}</p>
            <p><strong>Humidity:</strong> {{ $weather['main']['humidity'] }}%</p>
            <p><strong>Wind:</strong> {{ $weather['wind']['speed'] }} m/s</p>
        </div>
    @endif

    <a href="{{ route('experiments.index') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Go to Experiments Page</a>
  </div>

</div>