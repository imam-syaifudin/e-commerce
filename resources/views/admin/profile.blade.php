@include('home.header')<body id="page-top">
    <style>
        .card{
            border:none;

            position:relative;
            overflow:hidden;
            border-radius:8px;
            cursor:pointer;
        }

        .card:before{
            
            content:"";
            position:absolute;
            left:0;
            top:0;
            width:4px;
            height:100%;
            background-color:#efbebe;
            transform:scaleY(1);
            transition:all 0.5s;
            transform-origin: bottom
        }

        .card:after{
            
            content:"";
            position:absolute;
            left:0;
            top:0;
            width:4px;
            height:100%;
            background-color:#ff0000;
            transform:scaleY(0);
            transition:all 0.5s;
            transform-origin: bottom
        }

        .card:hover::after{
            transform:scaleY(1);
        }


        .fonts{
            font-size:11px;
        }

        .social-list{
            display:flex;
            list-style:none;
            justify-content:center;
            padding:0;
        }

        .social-list li{
            padding:10px;
            color:#8E24AA;
            font-size:19px;
        }


        .buttons button:nth-child(1){
            border:1px solid #ff0000A !important;
            color:#ff0000;
            height:40px;
        }

        .buttons button:nth-child(1):hover{
            border:1px solid #ff0000 !important;
            color:#fff;
            height:40px;
            background-color:#ff0000;
        }

        .buttons button:nth-child(2){
            border:1px solid #ff0000 !important;
            background-color:#ff0000;
            color:#fff;
                height:40px;
        }
    </style>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('home.sidebar')
        <!-- End of Sidebar -->
        
            <div class="container">

                <div class="row d-flex justify-content-center" style="margin-top: 100px;">
        
                    <div class="col-lg-7">
                        
                        <div class="card p-3 py-4 border shadow-lg  ">
                            
                            <div class="text-center">
                                <img src="{{ asset('images/undraw_profile.svg') }}" width="100" class="rounded-circle">
                            </div>
                            
                            <div class="text-center mt-3">
                                <h3 class="mt-2 mb-0 text-uppercase">profile</h3>
                                
                                <div class="datadiri mt-3 text-dark">
                                    <p>Status : <span class="text-success text-uppercase">{{ auth()->user()->role }}</span></p>
                                    <p>Name : {{ auth()->user()->name }}</p>
                                    <p>Email : {{ auth()->user()->email }}</p>
                                    <p>Created : {{ auth()->user()->created_at }}</p>
                                </div>
                                
                                <div class="buttons">
                                    
                                    <a class="btn btn-outline-danger px-4" href="{{ url('home') }}">Back To Dashboard</a>
                                    <a class="btn btn-danger px-4 ms-3">Settings</a>
                                </div>
                                
                                
                            </div>
                            
                           
                            
                            
                        </div>
                        
                    </div>
                    
                </div>

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