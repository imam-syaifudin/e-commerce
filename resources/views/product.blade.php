<link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
@include('template.head')
   <body class="sub_page">
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               @include('template.navbar')
            </div>
         </header>
         <!-- end header section -->
      </div>
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Our Product</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding" > 
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row justify-content-center">
               <div class="col-lg-6">
                  <form action="{{ url('product/cari/') }}" method="GET">
                     <div class="input-group mb-3">
                         <input type="text" class="form-control searchKategori" name="value" value="{{ request('value') }}" placeholder="Search Product" aria-label="Recipient's username" aria-describedby="basic-addon2">
                         <div class="input-group-append">
                           <button class="btn btn-outline-danger" type="submit"><i class="fas fa-search"></i></button>
                         </div>
                     </div>
                 </form>
               </div>
            </div>
            <div class="row" id="products">
            @if( isset($pesan) )
               <h1 class="text-center mt-5">{{ $pesan }}</h1>
            @endif
             @foreach ( $product as $pro )
               <div class="col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{ url('product/' . $pro->id . '/show#products') }}" class="option1">
                           Detail Produk
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="{{ url('storage/' . $pro->image  ) }}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{ $pro->name }}
                        </h5>
                     </div>
                     <p class="mt-3 text-center">Rp. {{ $pro->price }}</p>
                  </div>
               </div>
            @endforeach
            </div>
            <div class="row">
               <div class="col-md-12 mt-5 d-flex justify-content-center">
                  {{ $product->fragment('products')->links('pagination::bootstrap-4') }}
               </div>
            </div>
         </div>
      </section>
      <!-- end product section -->
      <!-- footer section -->
      @include('template.footer')
      <!-- footer section -->
      <!-- jQery -->
         
   </body>
</html>