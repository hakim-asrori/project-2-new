<?php
use Illuminate\Support\Facades\Session;
?>
<div class="navbar-wrapper">
    <nav class="navbar navbar-static-top ct-navbar-statictop fc-nav-bar {!! (Session::get('logged_in')) ? 'navbar-secondary' : '' !!}">
        <div class="container">
            <div class="row">
                <div class="ct-logo">
                    <div class="navbar-header ct-toggle2">
                        <button type="button" class="navbar-toggle offcanvas-toggle" data-toggle="offcanvas" data-target="#ct-bootstrap-offcanvas">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>

                        <a class="navbar-brand" href="/"><img class="img-responsive flogo" src="/assets/image/abu2.png"alt="FoodCourt">
                        </a>
                    </div>
                </div>
                <div class="ct-navbar">

                    <div class="navbar-offcanvas navbar-offcanvas-touch navbar-right" id="ct-bootstrap-offcanvas">
                        <ul class="nav navbar-nav ct-list ">
                            <?php if (Session::get('logged_in')) { ?>
                                <li><a href="/">Home</a></li>
                                <li><a href="/kendaraan">Kendaraan</a></li>
                                <li><a href="/pesanan">Pesanan</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown"><img src="/assets/front/images/user.png" class="nav-profile-img" alt="Your Account"> <?= Session::get('logged_in')['nama_lengkap'] ?>                
                                        <span class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/my-profile"><i class="pe pe-7s-user"></i> Profil Saya</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="/auth/logout"><i class="pe pe-7s-next-2"></i>logout</a></li>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li><a class="btn btn nav-btn" href="javascript:void(0);" onclick="show_popup('login')">Login</a></li>
                                <li><a class="btn btn nav-btn" href="javascript:void(0);" onclick="show_popup('signup')">Register</a></li>
                            <?php } ?>
                            <li class="hidden-xs">
                                <a class="nav-cart" href="https://plazafood.id/cart/index"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i><span id="items_cnt" class="fc-count">0</span></span> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>