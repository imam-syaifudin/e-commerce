@include('home.header')<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('home.sidebar')
        <!-- End of Sidebar -->
        
                <div class="container">
                    <div class="row">
                        <div class="col">
                            @if ( isset($result) )
                                <h1 class="text-center fs-1">Found {{ count($result) }}</h1>
                            @else
                                <h1 class="text-center fs-1">Data Product</h1>
                            @endif
                        </div>
                    </div>
                    <!-- Page Heading -->
                    
                    <div class="row mt-3 justify-content-between">
                        <div class="col-lg-8">
                            <a href="{{ url('admin/product/create') }}" class="btn btn-success mb-3 tambahkategori" style="color: white;"><i class="fas fa-plus plus"></i> Tambah Product</a>
                        </div>
                        <div class="col-lg-4">
                            <form action="{{ url('admin/product/cari/') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control searchKategori" name="value" value="{{ request('value') }}" placeholder="Search Product" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                      <button class="btn btn-outline-danger" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                        <div class="row justify-content-center">
                        <div class="col-lg-12 justify-content-center text-center">
                            <div class="table-responsive rounded">
                                <table class="table table-striped shadow-sm table-bordered">
                                    <thead class="text-light"  style="background-color: #f7444e;">
                                      <tr class="" style="font-size: 14px;">
                                        <th scope="col" style="vertical-align: middle;">NO</th>
                                        <th scope="col" style="vertical-align: middle;">NAME</th>
                                        <th scope="col" style="vertical-align: middle;">IMAGE</th>
                                        <th scope="col" style="vertical-align: middle;">PRICE ( RP )</th>
                                        <th scope="col" style="vertical-align: middle;">STOK</th>
                                        <th scope="col" style="vertical-align: middle;">KATEGORI</th>
                                        <th scope="col" style="vertical-align: middle;">KETERANGAN</th>
                                        <th scope="col" style="vertical-align: middle;">ACTION</th>
                                      </tr>
                                    </thead>
                                    <tbody style="color: black;" >
                                    @if( !count($product) == 0 )
                                        @foreach( $product as $pro)
                                        <tr>
                                            <th class="pt-3">{{ $product->firstItem()  + $loop->index }}</th>
                                            <td class="pt-3" style="vertical-align: middle">{{ $pro->name }}</td>
                                            <td class="pt-3" style="vertical-align: middle"><img src="{{ url('storage/' . $pro->image ) }}" width="100" height="100" alt="Product Image"></td>
                                            <td class="pt-3 text-success" style="vertical-align: middle; font-size: 20px;">Rp {{ 
                                            $pro->price }}</td>
                                            <td class="pt-3" style="vertical-align: middle; font-size: 20px;">{{ 
                                            $pro->stok }}</td>
                                            @if( isset($pro->kategori) )
                                                <td class="pt-3" style="vertical-align: middle">{{ $pro->kategori->name }}</td>
                                            @else 
                                                <td class="pt-3" style="vertical-align: middle">Tidak Ada</td>
                                            @endif
                                            <td class="pt-3"style="font-size: 13px; vertical-align: middle;">{{ $pro->keterangan }}</td>
                                                <td style="vertical-align: middle;">
                                                    <a href="{{ url('admin/product/' . $pro->id . '/edit') }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ url('product/hapus/' . $pro->id ) }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-outline-danger" style="margin-top: 5px;"><i class="fas fa-trash"></i></a>
                                                </td>                                   
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                  </table>
                                  {{ $product->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
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
   

</body>

</html>