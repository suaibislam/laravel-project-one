<!DOCTYPE html>
<html lang="en">

<head>
  <title>FoodMart - Free eCommerce Grocery Store HTML Website Template</title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="frontend/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="frontend/style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

</head>
<style>
  .cartone {
    background-color: coral;
    border-radius: 50%;
    width: 15px;
    position: fixed;
    top: 1.3rem;
    right: 1.5rem;
    z-index: 10;
    font-weight: 100;
    font-size: small;

    .margincart {
      margin-bottom: 1rem;
    }
  }
</style>

<body>



  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <defs>
      <symbol xmlns="http://www.w3.org/2000/svg" id="link" viewBox="0 0 24 24">
        <path fill="currentColor" d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
        <path fill="currentColor" d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="category" viewBox="0 0 24 24">
        <path fill="currentColor" d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
        <path fill="currentColor" d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
        <path fill="currentColor" d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
        <path fill="currentColor" d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
        <path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24">
        <path fill="currentColor" d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="check" viewBox="0 0 24 24">
        <path fill="currentColor" d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="trash" viewBox="0 0 24 24">
        <path fill="currentColor" d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
        <path fill="currentColor" d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
        <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
        <path fill="currentColor" d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 15 15">
        <path fill="currentColor" d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
      </symbol>
    </defs>
  </svg>

  <div class="preloader-wrapper">
    <div class="preloader">
    </div>
  </div>



  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart" style="width: 600px;">
    <div class="offcanvas-header ">
      <button type="button" class="btn-close ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary " style="margin-left: 14rem;">Your cart</span>

        </h4>

        <!-- Product List -->
        <div class="row" id="product-list">
          <!-- Products will be dynamically added here -->
        </div>

        <hr>

        <!-- Cart -->
        <h2 style="font-size:large;" class="text-primary">Cart</h2>
        <table class="table" id="cart-table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Image</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="cart-items">
            <!-- Cart items will be dynamically added here -->
          </tbody>
        </table>

        <h2 style="font-size:large;" class="text-primary">User Information</h2>
        <form id="user-info-form" class="border p-3 shadow-sm rounded w-50 mx-auto" style="background: antiquewhite;">
          <div class="mb-3">
            <label for="user-name" class="form-label">Name</label>
            <input type="text" id="user-name" class="form-control" placeholder="Enter your name" required>
          </div>
          <div class="mb-3">
            <label for="user-address" class="form-label">Address</label>
            <input type="text" id="user-address" class="form-control" placeholder="Enter your address" required>
          </div>
          <div class="mb-3">
            <label for="user-phone" class="form-label">Phone</label>
            <input type="text" id="user-phone" class="form-control" placeholder="Enter your phone number" required>
          </div>
        </form>


        <div class="d-flex justify-content-between ">
          <h3>Total: $<span id="cart-total">0</span></h3>
          <button class="btn btn-danger mb-2" id="clear-cart">Clear Cart</button>
        </div>

        <button class="w-100 btn btn-primary btn-lg margincart " id="checkout-cart">Continue to checkout</button>

      </div>
    </div>
  </div>

  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch" aria-labelledby="Search">
    <div class="offcanvas-header justify-content-center">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Search</span>
        </h4>
        <form role="search" action="index.html" method="get" class="d-flex mt-3 gap-0">
          <input class="form-control rounded-start rounded-0 bg-light" type="email" placeholder="What are you looking for?" aria-label="What are you looking for?">
          <button class="btn btn-dark rounded-end rounded-0" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>

  <header>
    <div class="container-fluid">
      <div class="row py-3 border-bottom">

        <div class="col-sm-4 col-lg-3 text-center text-sm-start">
          <div class="main-logo">
            <a href="index.html">
              <img src="frontend/images/logo.png" alt="logo" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
          <div class="search-bar row bg-light p-2 my-2 rounded-4">
            <div class="col-md-4 d-none d-md-block">
              <select class="form-select border-0 bg-transparent">
                <option>All Categories</option>
                <option>Groceries</option>
                <option>Drinks</option>
                <option>Chocolates</option>
              </select>
            </div>
            <div class="col-11 col-md-7">
              <form id="search-form" class="text-center" action="index.html" method="post">
                <input type="text" class="form-control border-0 bg-transparent" placeholder="Search for more than 20,000 products" />
              </form>
            </div>
            <div class="col-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
              </svg>
            </div>
          </div>
        </div>

        <div class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
          <div class="support-box text-end d-none d-xl-block">
            <span class="fs-6 text-muted">For Support?</span>
            <h5 class="mb-0">+980-34984089</h5>
          </div>

          <ul class="d-flex justify-content-end list-unstyled m-0">
            <li>
              <a href="#" class="rounded-circle bg-light p-2 mx-1">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#user"></use>
                </svg>
              </a>
            </li>
            <li>
              <a href="#" class="rounded-circle bg-light p-2 mx-1">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#heart"></use>
                </svg>
              </a>
            </li>
            <li class="d-lg-none">
              <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#cart"></use>
                </svg>
              </a>
            </li>
            <li class="d-lg-none">
              <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#search"></use>
                </svg>
              </a>
            </li>
          </ul>

          <div class="cart text-end d-none d-lg-block dropdown">
            <button class="border-0 bg-transparent d-flex flex-column gap-2 lh-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
              <span class="fs-6 text-muted "><img class="dropdown-toggle" src="/img/cart.png" width="40px" alt="" srcset=""></span>
              <!-- <h3>Total: $<span id="cart-total">0</span></h3> -->
              <h4 id="dynamicHeading" class="cartone"></h4>


            </button>
          </div>
        </div>

      </div>
    </div>






    <section class="py-5">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">

            <div class="bootstrap-tabs product-tabs">
              <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                <h3>Trending Products</h3>
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a href="#" class="nav-link text-uppercase fs-6 active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all">All</a>
                    <a href="#" class="nav-link text-uppercase fs-6" id="nav-fruits-tab" data-bs-toggle="tab" data-bs-target="#nav-fruits">Fruits & Veges</a>
                    <a href="#" class="nav-link text-uppercase fs-6" id="nav-juices-tab" data-bs-toggle="tab" data-bs-target="#nav-juices">Juices</a>
                  </div>
                </nav>
              </div>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">

                  <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                    @if ($products->isNotEmpty())
                    @foreach ($products as $product)

                    <div class="col" id="products">
                      <div class="product-item product" data-id="{{$product->id}}" data-price="{{$product->price}}">
                        <span class="badge bg-success position-absolute m-3">-30%</span>
                        <a href="#" class="btn-wishlist"><svg width="24" height="24">
                            <use xlink:href="#heart"></use>
                          </svg></a>
                        <figure>
                          <a href="{{ route('products.indextwo',$product->id) }}" title="Product Title">
                            @if ($product->image != "")
                            <img class="tab-image" src="{{ asset('uploads/products/'.$product->image) }}" alt="">
                            @endif
                          </a>
                        </figure>

                        <h3>{{ $product->name }}</h3>
                        <!-- <p>{{ $product->description }}</p> -->
                        <td>{!! html_entity_decode($product->description) !!}</td>
                        <!-- <p>{!! html_entity_decode( $product->description) !!}</p> -->
                        <!-- <p>{!! $product->description !!}</p> -->
                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                            <use xlink:href="#star-solid"></use>
                          </svg> 4.5</span>
                        <span class="price">${{ $product->price }}</span>
                        <div class="d-flex align-items-center justify-content-between">
                          <!-- <div class="input-group product-qty">
                            <span class="input-group-btn">
                              <button type="button" class="quantity-left-minus btn btn-danger btn-number decrement" data-id="{{ $product->id }}" data-type="minus">
                                <svg width="16" height="16">
                                  <use xlink:href="#minus"></use>
                                </svg>
                              </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                            <span class="input-group-btn">
                              <button type="button" class="quantity-right-plus btn btn-success btn-number increment" data-id="{{ $product->id }}" data-type="plus">
                                <svg width="16" height="16">
                                  <use xlink:href="#plus"></use>
                                </svg>
                              </button>
                            </span>
                          </div> -->
                          <!-- <a href="#" class="nav-link">Add to Cart <iconify-icon icon="uil:shopping-cart"></a> -->
                          <!-- <button class="nav-link add-to-cart">Add to Cart</button> -->
                          <button class="btn btn-primary add-to-cart" id=" " data-id="{{ $product->id }}">Add to Cart</button>
                        </div>
                      </div>
                    </div>
                    <!-- @yield('scripts') -->
                    @endforeach
                    @endif




                    <!-- / product-grid -->

                    <!-- </div> -->

                  </div>
                </div>

              </div>
            </div>
          </div>
    </section>



    @include('welchild.footer');
    <div id="footer-bottom">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 copyright">
            <p>© 2023 Foodmart. All rights reserved.</p>
          </div>
          <div class="col-md-6 credit-link text-start text-md-end">
            <p>Free HTML Template by <a href="https://templatesjungle.com/">TemplatesJungle</a> Distributed by <a href="https://themewagon">ThemeWagon</a></p>
          </div>
        </div>
      </div>
    </div>


    <script src="frontend/js/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="frontend/js/plugins.js"></script>
    <script src="frontend/js/script.js"></script>



    <script>
      // Sample product data (assuming data is coming from backend)
      let products = @json($products);

      // Cart object
      let cart = {};
      let cartItemCount = 0;

      // Update the cart display
      function updateCart() {
        const cartItems = document.getElementById('cart-items');
        cartItems.innerHTML = ''; // Clear current cart items
        let total = 0;

        // Loop through cart items and create table rows
        Object.values(cart).forEach(item => {
          const itemRow = document.createElement('tr');
          itemRow.innerHTML = `
      <td>${item.name}</td>
      <td><img src="/uploads/products/${item.image}" alt="${item.name}" width="50"></td>
      <td>$${item.price}</td>
      <td>${item.quantity}</td>
      <td>$${item.price * item.quantity}</td>
      <td>
        <button class="btn btn-success increment" data-id="${item.id}">+</button>
        <button class="btn btn-warning decrement" data-id="${item.id}">-</button>
        <button class="btn btn-danger delete" data-id="${item.id}">Delete</button>
      </td>
    `;
          cartItems.appendChild(itemRow);
          total += item.price * item.quantity;
        });


        document.getElementById('cart-total').textContent = total.toFixed(2);
      }

      // Event listener for Add to Cart (assuming you have product buttons)
      document.addEventListener('click', (e) => {
        if (e.target.classList.contains('add-to-cart')) {
          const productId = e.target.dataset.id;
          const product = products.find(p => p.id == productId);

          if (cart[productId]) {
            cart[productId].quantity++;
          } else {
            cart[productId] = {
              ...product,
              quantity: 1
            };
            cartItemCount++;
          }

          document.getElementById('dynamicHeading').innerText = cartItemCount;
          updateCart();
        }
      });

      // Event listeners for cart actions (increment, decrement, delete)
      document.addEventListener('click', (e) => {
        const productId = e.target.dataset.id;

        if (e.target.classList.contains('increment')) {
          cart[productId].quantity++;
        } else if (e.target.classList.contains('decrement')) {
          if (cart[productId].quantity > 1) {
            cart[productId].quantity--;
          } else {
            delete cart[productId];
            cartItemCount--;
          }
        } else if (e.target.classList.contains('delete')) {
          delete cart[productId];
          cartItemCount--;
        }
        document.getElementById('dynamicHeading').innerText = cartItemCount;
        updateCart();
      });

      // Event listener for clearing the cart
      document.getElementById('clear-cart').addEventListener('click', () => {
        cart = {};
        cartItemCount = 0;
        document.getElementById('dynamicHeading').innerText = cartItemCount;
        updateCart();
      });

      // document.getElementById('checkout-cart').addEventListener('click', () => {
      //   if (Object.keys(cart).length === 0) {
      //     alert('Your cart is empty!');
      //     return;
      //   }



      //   // Get user information
      //   const userName = document.getElementById('user-name').value.trim();
      //   const userAddress = document.getElementById('user-address').value.trim();
      //   const userPhone = document.getElementById('user-phone').value.trim();


      //   if (!userName || !userAddress || !userPhone) {
      //     alert('Please fill out all user information fields.');
      //     return;
      //   }

      //   // Prepare data for submission
      //   const data = {
      //     cart,
      //     user: {
      //       name: userName,
      //       address: userAddress,
      //       phone: userPhone,

      //     },
      //   };

      //   // Send the data to the server
      //   fetch('/submit-cart', {
      //       method: 'POST',
      //       headers: {
      //         'Content-Type': 'application/json',
      //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Laravel CSRF token
      //       },
      //       body: JSON.stringify(data),
      //     })
      //     .then(response => {
      //       if (response.ok) {
      //         return response.json();
      //       }
      //       throw new Error('Network response was not ok');
      //     })
      //     .then(data => {
      //       // Display success message
      //       alert('Order submitted successfully!');

      //       // Clear the cart and user information
      //       cart = {};
      //       cartitem = 0;
      //       document.getElementById('dynamicHeading').innerText = cartitem;
      //       updateCart();
      //       document.getElementById('user-info-form').reset();
      //     })
      //     .catch(error => {
      //       console.error('There was a problem with the fetch operation:', error);
      //       alert('Failed to submit the order. Please try again.');
      //     });
      // });




      // Event listener for Checkout
      document.getElementById('checkout-cart').addEventListener('click', () => {
        // Prepare the data to send to the backend
        const userName = document.getElementById('user-name').value;
        const userAddress = document.getElementById('user-address').value;
        const userPhone = document.getElementById('user-phone').value;

        if (!userName || !userAddress) {
          alert("Please fill all the details before proceeding.");
          return;
        }
        const phonePattern = /^[0-9]{11}$/;
        if (!phonePattern.test(userPhone)) {
          alert('Please enter a valid 11-digit phone number.');
          return;
        }

        const cartItems = Object.values(cart);
        const totalAmount = parseFloat(document.getElementById('cart-total').textContent);

        const orderData = {
          userName,
          userAddress,
          userPhone,
          cartItems,
          totalAmount,
        };

        // Send data to the backend for further processing
        fetch('/checkout', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // CSRF token for Laravel
            },
            body: JSON.stringify(orderData),
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              // Redirect to the payment page
              window.location.href = '/payment/' + data.orderId; // Redirect with the orderId
            } else {
              alert('Error during checkout');
            }
          })
          .catch(error => {
            console.error('Error:', error);
          });
      });
    </script>

    <!-- Bootstrap JS and Popper.js -->



</body>

</html>