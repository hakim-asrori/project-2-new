<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Conquerors Team">

    <meta name="keywords" content="Foodcourt">
    <meta name="description" content="">

    <title>Silihin :: @yield('title', "Home")</title>


    <link href="/assets/front/css/main.css" rel="stylesheet">

    <link href="/assets/chosen/chosen.min.css" rel="stylesheet" />
    <link href="/assets/pnotify/dist/pnotify-all.css" rel="stylesheet">


    <script src="/assets/front/js/jquery-3.3.1.min.js"></script>
    <!-- <script src="/assets/sweetalert2/dist/sweetalert2.all.min.js"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript" src="/assets/site/js/jquery.validate.min.js"></script>    
    <style>
    html {
        scroll-behavior: smooth;
    }
</style>

</head>

<body>
    <div id="pesan"></div>
    <?php if (Session::get('logged_in')['telepon']==''): ?>
        <script src="/assets/front/js/bootstrap.min.js"></script>
        @include('modal.telepon')
        <script>
            $("#telepon-modal").modal("show")
        </script>
    <?php endif ?>

    <?php if (session('message')): ?>
        <?= session('message') ?>
    <?php endif ?>
    <div class="main-wrapper">

        @include('layout.nav')

        <div class="container pt-8 pb-8">
            @yield('content')
        </div>

        @include('layout.footer')
    </div>

    @include('modal.load')


    <script src="/assets/front/js/bootstrap.min.js"></script>
    <script src="/assets/front/js/search-box.js"></script>
    <script src="/assets/front/js/bootstrap.offcanvas.js"></script>

    <script type="text/javascript" src="/assets/chosen/chosen.jquery.min.js"></script>

    <script type="text/javascript" src="/assets/pnotify/dist/pnotify.js"></script>
    <script type="text/javascript" src="/assets/pnotify/dist/pnotify.animate.js"></script>
    <script type="text/javascript" src="/assets/pnotify/dist/pnotify.buttons.js"></script>
    <script type="text/javascript" src="/assets/pnotify/dist/pnotify.callbacks.js"></script>
    <script type="text/javascript" src="/assets/pnotify/dist/pnotify.confirm.js"></script>
    <script type="text/javascript" src="/assets/pnotify/dist/pnotify.desktop.js"></script>

    <script src="/assets/front/js/ResizeSensor.min.js" type="text/javascript"></script>
    <script src="/assets/front/js/theia-sticky-sidebar.min.js" type="text/javascript"></script>
    <script src="/assets/front/js/validate.js" type="text/javascript"></script>

</body>
</html>
