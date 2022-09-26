<style>

/*****************globals*************/
body{background-color: #000}.card{border:none}.product{background-color: #eee}.brand{font-size: 13px}.act-price{color:red;font-weight: 700}.dis-price{text-decoration: line-through}.about{font-size: 14px}.color{margin-bottom:10px}label.radio{cursor: pointer}label.radio input{position: absolute;top: 0;left: 0;visibility: hidden;pointer-events: none}label.radio span{padding: 2px 9px;border: 2px solid #ff0000;display: inline-block;color: #ff0000;border-radius: 3px;text-transform: uppercase}label.radio input:checked+span{border-color: #ff0000;background-color: #ff0000;color: #fff}.btn-danger{background-color: #ff0000 !important;border-color: #ff0000 !important}.btn-danger:hover{background-color: #da0606 !important;border-color: #da0606 !important}.btn-danger:focus{box-shadow: none}.cart i{margin-right: 10px}
</style>
@include('template.head')
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               @include('template.navbar')
            </div>
         </header>
         <!-- end header section -->
         <!-- slider section -->
    

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
       

        <div class="container mt-5 mb-5">
          <div class="row justify-content-center" id="products">
            @if ( isset($pesan) )
                <h1 class="text-center">{{ $pesan }}</h1>
            @endif
            <div class="col-md-10">
                  @if ( isset($product) )
                  <div class="card">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="images p-3">
                                  <div class="text-center p-4"> <img id="main-image" src="{{ asset('storage/' . $product->image) }}" width="250" /> </div>
                                  <div class="thumbnail text-center"> <img onclick="change_image(this)" src="{{ asset('storage/' . $product->image) }}" width="70"> <img onclick="change_image(this)" src="{{ asset('storage/' . $product->image) }}" width="70"> </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="product p-4">
                                  <div class="d-flex justify-content-between align-items-center">
                                      <div class="d-flex align-items-center"> <a href="/product#products" class="text-decoration-none"><i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i></a>
                                  </div>
                                  <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Kategori : <a @if( isset($product->kategori) ) href="{{ url('kategori/'  . $product->kategori->slug . '/list') }}" @endif class="text-decoration-none">@if( isset($product->kategori) ) {{ $product->kategori->name }} @else Tidak Ada @endif</a></span>
                                      <h5 class="text-uppercase">{{ $product->name }}</h5>
                                      <div class="price d-flex flex-row align-items-center"> <span class="act-price">Rp . {{ $product->price }}</span>
                      
                                      </div>
                                  </div>
                                  <p class="about">{{ $product->keterangan }}</p>
                                  <div class="sizes mt-5">
                                    <h1>THANKS TO VISIT THIS STORE</h1>
                                  </div>
                                  <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endif
              </div>
          </div>
      </div>
    </body>
</html>