
 <nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">Technology Pot</a>
    <div class="d-flex">
      <a href="/" class="nav-link">Home</a>
      <a href="/#blogs" class="nav-link">Blogs</a>
      <a href="/#subscribe" class="nav-link">Subscribe</a>




      {{-- @if (auth()->check()) --}}
        @auth

        <button class=" nav-link btn btn-link">
            <img
            width="50" class=" rounded-circle"
            src=" {{ auth()->user()->avatar }}"
            alt="">

          </button>

        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class=" nav-link btn btn-link">Logout
            </button>
          </form>
          @else
          <a href="/register" class="nav-link">Register</a>
          <a href="/login" class="nav-link">Login</a>
        @endauth

   {{-- @endif --}}


    </div>
  </div>
</nav>
