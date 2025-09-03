<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('web')}}/style.css">
    <link rel="icon" href="{{asset('web')}}/images/icon.jpeg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
    <title>Book_Store</title>
</head>
<body >
    <!-- start nav-bar -->
    <section>
        <nav>
            <div class="logo">
                <i class='bx bx-book-reader'></i>
                <h2>Book Store</h2>
            </div>
            <div class="items">
                <ul>
                    <li><a href="{{ route('Home.index') }}">Home</a></li>
                    <li><a href="#Featured">Featured</a></li>
                    <li><a href="{{ route('MyBooks.index') }}">My Books</a></li>
                    <li><a href="{{ route("AllBooks.index") }}">All Books</a></li>
                    <li><a href="#Testimonials">Testimonials</a></li>
                </ul>
            </div>
            <div class="icons">

                <a href="{{ route('Login.index') }}">
                <i class='bx bx-user mainuser'></i>
                </a>
                <a href="{{ route('Login.create') }}">
                <i class='bx bx-log-out mainuser'></i>
                </a>


                <i class='bx bx-chevron-up up'></i>
            </div>

            <div class="nav-search ">
                <i class='bx bx-x searchX' ></i>
                <input type="text" placeholder="What are you looking for ?">
                <i class='bx bx-search-alt-2 childSearch' ></i>

            </div>






        </nav>
    </section>
    <!-- End nav-bar -->
