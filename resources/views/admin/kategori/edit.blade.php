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
                            <h3>Edit Kategori</h3>
                        </div>
                    </div>
                <div class="row justify-content-center mt-1">
                    <div class="col-lg-12 p-3 mb-5">
                        <a href="{{ url('admin/kategori') }}" class="btn btn-primary btn-block mb-3 backkat"><i class="fas fa-backward"></i> <span class="textkategori">Back To Kategori </span><i class="fas fa-forward"></i></a>
                        <form action="{{ route('kategori.update',$kategori->id) }}" method="POST" class="mt-5">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <input type="text" value="{{ $kategori->name }}" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputNama1" aria-describedby="NamaHelp" placeholder="Nama Kategori">
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
   

</body>

</html>