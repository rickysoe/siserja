<!DOCTYPE html>
<html lang="en">



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" href=" <?=base_url('assets/assets_admin/img/home.png')?> ">

    <title>SISERJA Admin Dashboard</title>


    <!-- Custom fonts for this template-->
    <link href=" <?=base_url('assets/assets_admin')?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="<?=base_url('assets/assets_admin')?>/js/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/assets_admin/vendor')?>/dist/Chart.min.css">


    <link href="  <?=base_url('assets/assets_admin')?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href=" <?=base_url('assets/assets_admin')?>/css/sb-admin-2.min.css" rel="stylesheet">
    <script src=" <?=base_url('assets/assets_admin/vendor')?>/dist/Chart.min.js"></script>
    <script src="<?=base_url('assets/assets_admin/chart/samples')?>/utils.js"></script>
     <!-- load jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

    <script>$(document).ready(function(){
    // saat tombol close di alert di-klik
    $(".alert .close").click(function(){
        // sembunyikan alert
        $(this).parent().fadeOut("slow");
    });
    });</script>

</head>