<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Admin</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    
    <style>
        .tambahkategori {
            transition: 0.8s;
        }

        .plus {
            transition: 0.8s;
        }

        .tambahkategori:hover .plus {
            transition: 0.8s;
            transform: scale(1.4) rotate(360deg);
        }

        i.fas.fa-backward.backkategori {
            transition: 0.8s;
        }
        i.fas.fa-backward.backkategori2 {
            transition: 0.8s;
        }

        .backkat {
            transition: 0.8s;
        }
        .textkategori {
            font-size: ;
            transition: 0.8s;
        }

        i.fas.fa-backward , i.fas.fa-forward {
            transition: 0.8s;
        }

        .backkat:hover i.fas.fa-backward  {
            transition: 0.8s;
            transform: translateX(-180px) rotate(360deg);
        }
        .backkat:hover i.fas.fa-forward  {
            transition: 0.8s;
            transform: translateX(180px) rotate(-360deg);
        }
        .backkat:hover .textkategori {
            transition: 0.8s;
            font-size: 20px;
        }   

        
    </style>
</head>