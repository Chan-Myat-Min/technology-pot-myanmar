@props(['blogs'])

<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">

       <x-categories/>

      {{-- <select name="" id="" class="p-1 rounded-pill mx-3">
        <option value="">Filter by Tag</option>
      </select> --}}

    </div>
    
    <form
     method="GET"
     action=""
     class="my-3">
    <div class="input-group mb-3">

     @if ( request('category'))
     <input type="hidden" name="category" value="{{ request('category') }}">
     @endif

     @if ( request('author'))
     <input type="hidden" name="author" value="{{ request('author') }}">
     @endif

    <input
        value="{{ request('search') }}"
        name="search"
          type="text"
          autocomplete="false"
          class="form-control"
          placeholder="Search Blogs..."
        />
        <button
          class="input-group-text bg-primary text-light" id="basic-addon2" type="submit" >Search </button>
      </div>
    </form>

    <!-- blogs card -->
    <div class="row">
      @foreach ($blogs as $blog)
      <div class="col-md-4 mb-4">
        <x-blog-card :blog="$blog" />
   </div>
      @endforeach
    {{$blogs->links()}}

  </section>
