@include('home.header')<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('home.sidebar')
        <!-- End of Sidebar -->
        
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h1 class="text-center fs-1">Data Kategori</h1>
                        </div>
                    </div>
                    <!-- Page Heading -->
                    
                    <div class="row mt-3 justify-content-between">
                        <div class="col-lg-6">
                            <a href="{{ url('admin/kategori/create') }}" class="btn btn-success mb-3 tambahkategori" style="color: white;"><i class="fas fa-plus plus"></i> Tambah Kategori</a>
                        </div>
                        <div class="col-lg-4">
                            <form action="{{ url('admin/kategori/cari/') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control searchKategori" name="value" value="{{ request('value') }}" placeholder="Search Kategori" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                      <button class="btn btn-outline-danger" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="table-responsive rounded ">
                                <table class="table table-striped shadow-sm table-bordered">
                                    <thead class="text-light" style="background-color: #f7444e;">
                                      <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">ACTION</th>
                                      </tr>
                                    </thead>
                                    <tbody style="color: black;" >
                                        @php
                                            $i = 1;
                                        @endphp
                                        @if( !count($kategori) == 0 )
                                            @foreach( $kategori as $kat)
                                            <tr>
                                                <th class="pt-3">{{ $kategori->firstItem()  + $loop->index }}</th>
                                                <td class="pt-3">{{ $kat->name }}</td>
                                                    <td>
                                                        <a href="{{ url('admin/kategori/' . $kat->id . '/edit') }}" class="btn btn-primary" style="margin-top: -4px;"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ url('admin/kategori/hapus/' . $kat->id ) }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger" style="margin-top: -4px;"><i class="fas fa-trash"></i></a>
                                                    </td>                                   
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                  </table>
                                  {{ $kategori->links('pagination::bootstrap-4') }}
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