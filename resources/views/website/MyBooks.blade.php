@include('website.layout.navbar')
    <!-- Start New Book -->
   <section class="container" id="New Books">
    <div class="main-tittle">
        <h1>My Books</h1>
    </div>
     @if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
 @if(session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif
    <div class="Nboxes gap-6">

@forelse($borrowedBooks as $borrow)
    <div class="Nbox">
        <img src="{{ asset('storage/' . $borrow->book->image) }}" alt="book image" width="300">

        <h2>Title : <span>{{ $borrow->book->title }}</span></h2>
        <h2>Author : <span>{{ $borrow->book->author }}</span></h2>
        <h2>Borrow Date : <span>{{ $borrow->borrow_date }}</span></h2>

        @if(is_null($borrow->return_date))

            <a href="{{ route('MyBooks.edit',$borrow->book->id) }}"
               class="btn btn-info btn-lg mt-3 mb-3">Return</a>
        @else

            <h2>Returned At : <span>{{ $borrow->return_date }}</span></h2>

            <form action="{{ route('MyBooks.destroy', $borrow->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this record?');">
                @csrf
                @method('DELETE')
               <button type="submit" class="btn btn-lg mt-3 mb-3 custom-red">Delete</button>
            </form>
        @endif

        <div class="Ficons">
            <i class='bx bx-shopping-bag'></i>
            <i class='bx bx-dollar-circle'></i>
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
