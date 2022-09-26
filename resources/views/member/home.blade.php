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
                            <h1 class="text-center fs-1">Dashboard @if( auth()->user()->role == "admin" ) Admin @else Member @endif</h1>
                        </div>
                    </div>
                    <!-- Page Heading -->
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