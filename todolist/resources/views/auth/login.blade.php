<h2>Login</h2>

@if(session('success'))
  <p style="color: green">{{ session('success') }}</p>
@endif

@if($errors->any())
  <p style="color: red">{{ $errors->first() }}</p>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>

<a href="{{ route('register') }}">Register</a>
