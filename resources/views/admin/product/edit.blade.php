@include('home.header')
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('home.sidebar')
        <!-- End of Sidebar -->
        
                <div class="container">
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-12 text-center">
                            <h3>Tambah Product</h3>
                        </div>
                    </div>
                <div class="row justify-content-center mt-1">
                    <div class="col-lg-12 p-3 mb-5" style="color: black;">
                        <a href="{{ url('admin/product') }}" class="btn btn-primary btn-block mb-3 backkat"><i class="fas fa-backward"></i> <span class="textkategori">Back To Product </span><i class="fas fa-forward"></i></a>

                        <form action="{{ route('product.update',$data['product']->id ) }}" method="POST" class="mt-5" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <label for="name">NAMA PRODUCT</label>
                              <input type="text" name="name" value="{{ old('name',$data['product']->name ) }}" class="form-control" id="name" aria-describedby="NamaHelp" placeholder="Nama Product" required>
                            </div>

                            <label for="name">HARGA PRODUCT</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Harga</span>
                                  <span class="input-group-text">Rp . </span>
                                </div>
                                <input type="text" class="form-control" value="{{ old('price',$data['product']->price) }}" name="price" placeholder="2.000.00,00">
                              </div>

                              <div class="form-group">
                                <label for="stok">STOK PRODUCT</label>
                                <input type="number" name="stok" value="{{ old('stok',$data['product']->stok ) }}" class="form-control" id="stok" aria-describedby="NamaHelp" placeholder="Stok Product" required>
                              </div>

                              <label for="name">KATEGORI</label>
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
                                </div>
                                <select name="kategori" class="custom-select" id="inputGroupSelect01">
                                  @foreach( $data['kategori'] as $kat )  
                                    <option value="{{ $kat->id }}" 
                                        @if ( $kat->id == $data['product']->kategori_id )
                                            selected
                                        @endif>{{ $kat->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                              
                              <p>IMAGE :</p>
                              <img src="{{ url('storage/' . $data['product']->image ) }}" width="200" class="mb-3" alt="IMG PRODUCT">
                              <div class="input-group mb-3">
                                  <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="inputGroupFile02" name="image">
                                  <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                </div>
                              </div>

                              <label for="name">KETERANGAN PRODUCT</label>
                              <div class="form-group" >
                                <textarea class="form-control" placeholder="Keterangan" style="resize: both; overflow: auto;" name="keterangan" id="exampleFormControlTextarea1" rows="3">{{ old('keterangan',$data['product']->keterangan ) }}</textarea>
                              </div>

                            <button type="submit" class="btn btn-danger btn-block">Submit</button>
                          </form>

                    </div>
                 </div>
                </div>
                <!-- /.container-fluid -->

            <!-- End of Main Content -->

            <!-- Footer -->
            
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
        @include('home.footer')
    </div>
    <!-- End of Page Wrapper -->

   
    <!-- Bootstrap core JavaScript-->
    @include('home.script')
    @include('sweetalert::alert')
   
    <script>
        $('#inputGroupFile02').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>

</body>

</html>