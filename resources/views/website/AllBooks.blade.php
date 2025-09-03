@include('website.layout.navbar')
    <!-- Start New Book -->
   <section class="container" id="New Books">
    <div class="main-tittle">
        <h1>All Books</h1>
    </div>
         @if(session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif
 @if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

    <div class="Nboxes gap-6">

    @forelse ($Book as $key => $book)
        <div class="Nbox">
            <img src="{{ asset('storage/' . $book->image) }}" alt="book image" width="300" >


              <h2>Title : <span>{{ $book->title }}</span></h2>
              <h2>Author : <span>{{ $book->author }}</span></h2>

            <h2>Staus : <span>{{ $book->status }}</span></h2>
            @if($book->status =="Available")
               <a href="{{ route('MyBooks.show',$book->id) }}" class="btn btn-primary btn-lg mt-3 mb-3">Take</a>
            @endif

            <div class="Ficons">
                <i class='bx bx-shopping-bag'></i>
                <i class='bx bx-dollar-circle' ></i>
                <i class='bx bxs-magic-wand'></i>
            </div>

        </div>


                    @empty
 <h1 class="text-center text-danger">No Exist Books</h1>
@endforelse


    </div>


   </section>
    <!-- End New Book -->
    @include('website.layout.footer')

