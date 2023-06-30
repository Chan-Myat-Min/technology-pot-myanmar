   <x-layout>

       <!-- single blog section -->
       <div class="container">
         <div class="row">
           <div class="col-md-6 mx-auto text-center">
             <img
               src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
               class="card-img-top"
               alt="..."
             />
            <h3 class="my-3">{{$blog->title}}</h3>
             <div>
              <div><a class="" href="/users/{{$blog->author->username}}">Author -{{$blog->author->name}}</a> </div>
              <div><a href="/categories/{{$blog->category->slug}}"><span class="badge bg-primary">{{$blog->category->name}}</span></a></div>
              <div class=" text-secondary">{{$blog->created_at->diffForHumans()}}</div>
             </div>
             <p class="lh-md">
              {{$blog->body}}
             </p>
           </div>
           <x-comments :blog="$blog" :comments="$blog->comments" />
         </div>
       </div>

       <!-- subscribe new blogs -->

       <x-subscribe/>
      <x-blogs-you-may-like-section :randomBlogs="$randomBlogs"/>
      </x-layout>
