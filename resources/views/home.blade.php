@include('home.header')
<style>
    .card:hover {
        transition: 0.8s;
        transform: scale(1.1);
        border-top-color: red;
        border-bottom-color: red;
    }

    .card {
        transition: 0.8s;
    }
</style>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('home.sidebar')
        <!-- End of Sidebar -->
        
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h1 class="text-center fs-1">Dashboard Admin</h1>
                        </div>
                    </div>
                    <!-- Page Heading -->
                    <div class="row mt-3">
                        <div class="col-xl-4 col-md-6 mb-5">
                            <div class="card border-left-danger shadow-sm h-100 py-2">
                                <a href="" class="text-decoration-none">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col ml-3">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Product</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($data['product'])}}</div>
                                            </div>
                                            <div class="col-auto mr-3">
                                                <i class="bi bi-people-fill fa-2x text-dark-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-5">
                            <div class="card border-left-danger shadow-sm h-100 py-2">
                                <a href="" class="text-decoration-none">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col ml-3">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Kategori</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($data['kategori']) }}</div>
                                            </div>
                                            <div class="col-auto mr-3">
                                                <i class="bi bi-people-fill fa-2x text-dark-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-5">
                            <div class="card border-left-danger shadow-sm h-100 py-2">
                                <a href="" class="text-decoration-none">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col ml-3">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    User</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($data['user']) }}</div>
                                            </div>
                                            <div class="col-auto mr-3">
                                                <i class="bi bi-people-fill fa-2x text-dark-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
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