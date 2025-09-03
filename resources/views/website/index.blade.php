@include('website.layout.navbar')
    <!-- start header  -->
    <section  id="Home">
        <header class="container">
            <div class="Htext">
                <h1>Browse & Select</h1>
                <h1>Bravo-Books</h1>
                <p>Find the best e-books from your favorite writers, explore hundreds of books with all possible categories, take advantage of the 50% discount and much more.</p>
                <button>Explore Now</button>
            </div>
            <div class="Himages swiper ">
                <div class="himgcon swiper-wrapper">
                     @forelse ($Book as $key => $book)
                      <img src="{{ asset('storage/' . $book->image) }}" alt="book image"  class="swiper-slide">

                    @empty
   <h1 class="text-center text-danger">No Exist Books</h1>
@endforelse
                </div>
            </div>
        </header>
    </section>
    <!-- end header  -->
     <!-- Satrt Featured -->
    <section class="container" id="Featured">
        <div class="main-tittle">
            <h1>Featured</h1>
        </div>
        <div class="Fboxes">
            <div class="Fbox">
                <i class='bx bxs-truck'></i>
                <h1>Free Shoping</h1>
                <h3>Order More Than <span>100$</span></h3>
            </div>
            <div class="Fbox">
                <i class='bx bxs-trophy' ></i>
                <h1>Free Shoping</h1>
                <h3>Order More Than <span>200$</span></h3>
            </div>
            <div class="Fbox">
                <i class='bx bxs-badge-dollar' ></i>
                <h1>Free Shoping</h1>
                <h3>Order More Than <span>800$</span></h3>
            </div>
        </div>

    </section>
    <!--End Featured  -->

    <!-- Start New Book -->
   <section class="container" id="New Books">
    <div class="main-tittle">
        <h1>New Books</h1>
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
   <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
  <a href="{{ route('AllBooks.index') }}" class="btn btn-primary btn-lg">All Books</a>
</div>

   </section>
    <!-- End New Book -->

    <!-- Start DisCount -->

    <section class="container" id="Discount">
        <div class="main-tittle">
            <h1>Discount</h1>
        </div>
        <div class="discount">
            <div class="disText">
                <h1>Up To 50% Discount
                </h1>
                <p>Take advantage of the discount days we have for you, buy books from your favorite writers, the more you buy, the more discounts we have for you.</p>
                <button>Shop Now</button>
            </div>
            <div class="disImage">
                <img class="img1" src="{{asset('web')}}/images/discount-book-1.png" alt="discount">
                <img class="img2" src="{{asset('web')}}/images/discount-book-2.png" alt="discount">
            </div>
        </div>

    </section>
    <!-- End DisCount -->

    <!-- Start Testimonial -->
    <section class="container" id="Testimonials">
        <div class="testimnial swiper">
            <div class="Tboxes swiper-wrapper">
                <div class="Tbox swiper-slide">
                    <img src="{{asset('web')}}/images/testimonial-perfil-1.png" alt="testimonial">
                    <h1>Mariem Khaled</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste eos explicabo est temporibus blanditiis accusantium ab officia consequatur libero deserunt provident incidunt numquam harum eum, ea illum voluptatibus doloribus. Reiciendis, aliquid voluptatibus cupiditate, dignissimos vel ad harum animi omnis unde id tempora magni sed autem similique, aperiam odio doloremque quia!</p>
                    <div class="iconStar">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                    </div>
                </div>
                 <div class="Tbox swiper-slide">
                    <img src="{{asset('web')}}/images/testimonial-perfil-2.png" alt="testimonial">
                    <h1>Ahmed Sayed</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste eos explicabo est temporibus blanditiis accusantium ab officia consequatur libero deserunt provident incidunt numquam harum eum, ea illum voluptatibus doloribus. Reiciendis, aliquid voluptatibus cupiditate, dignissimos vel ad harum animi omnis unde id tempora magni sed autem similique, aperiam odio doloremque quia!</p>
                    <div class="iconStar">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star-half' ></i>
                    </div>
                </div>
                <div class="Tbox swiper-slide">
                    <img src="{{asset('web')}}/images/testimonial-perfil-3.png" alt="testimonial">
                    <h1>Sara Hany</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste eos explicabo est temporibus blanditiis accusantium ab officia consequatur libero deserunt provident incidunt numquam harum eum, ea illum voluptatibus doloribus. Reiciendis, aliquid voluptatibus cupiditate, dignissimos vel ad harum animi omnis unde id tempora magni sed autem similique, aperiam odio doloremque quia!</p>
                    <div class="iconStar">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                        <i class='bx bx-star'></i>
                    </div>
                </div>
                <div class="Tbox swiper-slide">
                    <img src="{{asset('web')}}/images/testimonial-perfil-4.png" alt="testimonial">
                    <h1>Zayed Omar</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste eos explicabo est temporibus blanditiis accusantium ab officia consequatur libero deserunt provident incidunt numquam harum eum, ea illum voluptatibus doloribus. Reiciendis, aliquid voluptatibus cupiditate, dignissimos vel ad harum animi omnis unde id tempora magni sed autem similique, aperiam odio doloremque quia!</p>
                    <div class="iconStar">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                        <i class='bx bx-star'></i>
                        <i class='bx bx-star'></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial -->

@include('website.layout.footer')
