@extends('layouts.app')

@section('title')
    dashboard
@endsection

@section('styles')
    <style>
        .icon-dashboard.icon-shape-dashboard {
            width: 80px;
            height: 80px;
        }

        .icon-dashboard.icon-shape-dashboard svg {
            width: 48px;
            height: 48px;
        }

        .textbaru {
            color: #ffffff;
            background-image: linear-gradient(310deg, #750b30 50%, #bd005f 100%) !important;
            box-shadow: inset 0 0px 3px rgba(117, 11, 48, 0.3), 0 5px 10px rgba(0, 0, 0, 0.1) !important;
        }

        .textbaru h6 {
            color: #ffffff;
        }

        .menuwhite {
            background-color: #ffffff !important;
        }

        .card-dashboard {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Transisi halus */
            box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
            --bs-card-spacer-y: 1rem;
            --bs-card-spacer-x: 1rem;
            --bs-card-title-spacer-y: 0.5rem;
            --bs-card-border-width: 0;
            --bs-card-border-color: rgba(0, 0, 0, 0.125);
            --bs-card-border-radius: 1rem;
            --bs-card-box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
            --bs-card-inner-border-radius: 1rem;
            --bs-card-cap-padding-y: 0.5rem;
            --bs-card-cap-padding-x: 1rem;
            --bs-card-cap-bg: #fff;
            --bs-card-cap-color: ;
            --bs-card-height: ;
            --bs-card-color: ;
            --bs-card-bg: #fff;
            --bs-card-img-overlay-padding: 1rem;
            --bs-card-group-margin: 0.75rem;
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            height: var(--bs-card-height);
            word-wrap: break-word;
            background-color: var(--bs-card-bg);
            background-clip: border-box;
            border: var(--bs-card-border-width) solid var(--bs-card-border-color);
            border-radius: var(--bs-card-border-radius);
        }

        .card-dashboard:hover {
            transform: translateY(-5px);
            /* Menggeser card ke atas */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            /* Bayangan lebih kuat */
        }

        @media (min-width: 992px) {
            .col-5th {
                width: 20%;
                float: left;
            }
        }

        .btn-logout {
            margin-bottom: 1rem;
            letter-spacing: -0.025rem;
            text-transform: uppercase;
            background-size: 150%;
            background-position-x: 25%;
        }

        @media (max-width: 767.98px) {
            .brand-logo {
                width: 30px;
                height: 30px;
            }
        }

        @media (min-width: 768px) {
            .brand-logo {
                width: 60px;
                height: 60px;
            }
        }

        .bg-color {
            color: #750b30;
        }

        .row.flex-nowrap {
            white-space: nowrap;
            overflow-x: auto;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .row.flex-nowrap::-webkit-scrollbar {
            display: none;
        }

        .arrow-btn {
            cursor: pointer;
            padding: 10px;
            border: none;
            background-color: transparent;
        }

        #cardContainer {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
    white-space: nowrap;
}
    </style>
@endsection

@section('navbar')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2">
            {{-- <a class="navbar-brand" href="#">
                <img src="../../assets/img/logo_antvgo_blank.png" width="30" height="30" alt="Brand Logo">
              </a> --}}
            <div class="container-fluid py-1">
                <a class="navbar-brand" href="#">
                    <img class="brand-logo" src="../../assets/img/logo_antvgo_blank.png" width="60" height="60"
                        alt="Brand Logo">
                </a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-2 ps-2 me-sm-6 me-5">
                        <h6 class="text-white font-weight-bolder ms-2">Dashboard</h6>
                    </ol>
                </nav>
                {{-- <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none">
                    <a href="javascript:;" class="nav-link text-white p-0">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </div> --}}
                <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            {{-- <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here..."> --}}
                        </div>
                    </div>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="nav-link text-white font-weight-bold px-0">
                                @csrf
                                <button type="submit" class="btn-logout nav-link text-white font-weight-bold px-0"
                                    style="">
                                    <i class="fa fa-sign-out-alt me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Log Out</span>
                                </button>
                            </form>
                        </li>
                        {{-- <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end px-2 py-3 ms-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../../../assets/img/team-2.jpg" class="avatar avatar-xl position-relative avatar-sm me-3"
                                                    alt="user image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../../../assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm bg-gradient-dark me-3" alt="logo spotify">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g id="Rounded-Icons"
                                                            transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                            fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="page-header min-height-150 border-radius-xl mt-4 bg-gradient-primary">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="../../../assets/img/bruce-mars.jpg" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ auth()->user()->username }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Department
                            </p>
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-flex align-items-center">
                        <div class="avatar avatar-xl position-relative me-3">
                            <img src="../../../assets/img/vivat-go.png" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                        <div class="avatar avatar-xl position-relative">
                            <img src="../../../assets/img/vivat-go.png" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <button class="btn col-12 bg-gradient-primary">Live</button>
    {{-- <div class="row">    
      
        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain" style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal" data-bs-target="#imageModal1">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/banner.jpeg" style="object-fit: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/banner.jpeg">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain" style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal" data-bs-target="#imageModal2">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/vivat-go.png" style="object-fit: cover; background-position: 50%; background-size: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal2" tabindex="-1" aria-labelledby="imageModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/vivat-go.png">
                    </div>
                </div>
            </div>
        </div>
       
        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain" style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal" data-bs-target="#imageModal2">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/vivat-go.png" style="object-fit: cover; background-position: 50%; background-size: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal2" tabindex="-1" aria-labelledby="imageModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/vivat-go.png">
                    </div>
                </div>
            </div>
        </div>
   
        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain" style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal" data-bs-target="#imageModal2">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/vivat-go.png" style="object-fit: cover; background-position: 50%; background-size: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal2" tabindex="-1" aria-labelledby="imageModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/vivat-go.png">
                    </div>
                </div>
            </div>
        </div>
     
        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain" style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal" data-bs-target="#imageModal2">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/vivat-go.png" style="object-fit: cover; background-position: 50%; background-size: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal2" tabindex="-1" aria-labelledby="imageModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/vivat-go.png">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain" style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal" data-bs-target="#imageModal2">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/vivat-go.png" style="object-fit: cover; background-position: 50%; background-size: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal2" tabindex="-1" aria-labelledby="imageModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/vivat-go.png">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="row">    
        <!-- pertama -->
        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain" style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal" data-bs-target="#imageModal1">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/banner.jpeg" style="object-fit: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <div id="carouselExample1" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 border-radius-md" src="./assets/img/banner.jpeg">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 border-radius-md" src="./assets/img/vivat-go.png">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExample1" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExample1" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- kedua -->
        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain" style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal" data-bs-target="#imageModal2">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/vivat-go.png" style="object-fit: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal2" tabindex="-1" aria-labelledby="imageModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel2">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <div id="carouselExample2" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 border-radius-md" src="./assets/img/vivat-go.png">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 border-radius-md" src="./assets/img/banner.jpeg">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExample2" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExample2" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Tambahkan lebih banyak kartu dan modal dengan ID yang berbeda seperti di atas -->
    </div> --}}

    {{-- <div class="row flex-nowrap overflow-auto" style="white-space: nowrap;">
        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain"
                style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal"
                data-bs-target="#imageModal1">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/banner.jpeg" style="object-fit: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/banner.jpeg">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain"
                style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal"
                data-bs-target="#imageModal2">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/vivat-go.png"
                            style="object-fit: cover; background-position: 50%; background-size: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal2" tabindex="-1" aria-labelledby="imageModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/vivat-go.png">
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat the same structure for additional cards -->
        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain"
                style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;"
                data-bs-toggle="modal" data-bs-target="#imageModal3">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/another-image.png"
                            style="object-fit: cover; background-position: 50%; background-size: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal3" tabindex="-1" aria-labelledby="imageModalLabel3" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel3">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/another-image.png">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain"
                style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;"
                data-bs-toggle="modal" data-bs-target="#imageModal3">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/another-image.png"
                            style="object-fit: cover; background-position: 50%; background-size: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal3" tabindex="-1" aria-labelledby="imageModalLabel3" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel3">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/another-image.png">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain"
                style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;"
                data-bs-toggle="modal" data-bs-target="#imageModal3">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/another-image.png"
                            style="object-fit: cover; background-position: 50%; background-size: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal3" tabindex="-1" aria-labelledby="imageModalLabel3" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel3">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/another-image.png">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain"
                style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;"
                data-bs-toggle="modal" data-bs-target="#imageModal3">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/another-image.png"
                            style="object-fit: cover; background-position: 50%; background-size: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal3" tabindex="-1" aria-labelledby="imageModalLabel3" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel3">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/another-image.png">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain"
                style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;"
                data-bs-toggle="modal" data-bs-target="#imageModal3">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/another-image.png"
                            style="object-fit: cover; background-position: 50%; background-size: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal3" tabindex="-1" aria-labelledby="imageModalLabel3" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel3">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/another-image.png">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain"
                style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;"
                data-bs-toggle="modal" data-bs-target="#imageModal3">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/another-image.png"
                            style="object-fit: cover; background-position: 50%; background-size: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal3" tabindex="-1" aria-labelledby="imageModalLabel3" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel3">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/another-image.png">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 mb-4">
            <div class="card card-profile card-plain"
                style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;"
                data-bs-toggle="modal" data-bs-target="#imageModal3">
                <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                    <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                        <img class="w-100 h-100 border-radius-md" src="./assets/img/another-image.png"
                            style="object-fit: cover; background-position: 50%; background-size: cover;">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModal3" tabindex="-1" aria-labelledby="imageModalLabel3" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel3">What's on</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="w-100 border-radius-md" src="./assets/img/another-image.png">
                    </div>
                </div>
            </div>
        </div>

        <!-- Add more cards here -->
    </div> --}}

    <div class="container mt-5">
        <div class="d-flex align-items-center">
            <!-- Left Arrow -->
            <button class="btn btn-primary" onclick="scrollLeftFunction()">Left</button>

            <div id="cardContainer" class="row flex-nowrap overflow-auto" style="white-space: nowrap;">
                <div class="col-lg-2 col-md-4 mb-4">
                    <div class="card card-profile card-plain"
                        style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal"
                        data-bs-target="#imageModal1">
                        <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                            <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                                <img class="w-100 h-100 border-radius-md" src="./assets/img/banner.jpeg" style="object-fit: cover;">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="w-100 border-radius-md" src="./assets/img/banner.jpeg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <div class="card card-profile card-plain"
                        style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal"
                        data-bs-target="#imageModal1">
                        <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                            <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                                <img class="w-100 h-100 border-radius-md" src="./assets/img/banner.jpeg" style="object-fit: cover;">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="w-100 border-radius-md" src="./assets/img/banner.jpeg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <div class="card card-profile card-plain"
                        style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal"
                        data-bs-target="#imageModal1">
                        <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                            <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                                <img class="w-100 h-100 border-radius-md" src="./assets/img/banner.jpeg" style="object-fit: cover;">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="w-100 border-radius-md" src="./assets/img/banner.jpeg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <div class="card card-profile card-plain"
                        style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal"
                        data-bs-target="#imageModal1">
                        <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                            <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                                <img class="w-100 h-100 border-radius-md" src="./assets/img/banner.jpeg" style="object-fit: cover;">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="w-100 border-radius-md" src="./assets/img/banner.jpeg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <div class="card card-profile card-plain"
                        style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal"
                        data-bs-target="#imageModal1">
                        <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                            <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                                <img class="w-100 h-100 border-radius-md" src="./assets/img/banner.jpeg" style="object-fit: cover;">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="w-100 border-radius-md" src="./assets/img/banner.jpeg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <div class="card card-profile card-plain"
                        style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal"
                        data-bs-target="#imageModal1">
                        <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                            <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                                <img class="w-100 h-100 border-radius-md" src="./assets/img/banner.jpeg" style="object-fit: cover;">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="w-100 border-radius-md" src="./assets/img/banner.jpeg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <div class="card card-profile card-plain"
                        style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal"
                        data-bs-target="#imageModal1">
                        <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                            <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                                <img class="w-100 h-100 border-radius-md" src="./assets/img/banner.jpeg" style="object-fit: cover;">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="w-100 border-radius-md" src="./assets/img/banner.jpeg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <div class="card card-profile card-plain"
                        style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal"
                        data-bs-target="#imageModal1">
                        <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                            <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                                <img class="w-100 h-100 border-radius-md" src="./assets/img/banner.jpeg" style="object-fit: cover;">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="w-100 border-radius-md" src="./assets/img/banner.jpeg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <div class="card card-profile card-plain"
                        style="box-shadow: 8px 8px 0 rgba(168, 168, 168, 0.5); width: 200px; height: 300px;" data-bs-toggle="modal"
                        data-bs-target="#imageModal1">
                        <div class="card-body text-center bg-white shadow border-radius-lg p-3" style="padding: 0;">
                            <a href="javascript:;" style="cursor: pointer; display: block; height: 100%;">
                                <img class="w-100 h-100 border-radius-md" src="./assets/img/banner.jpeg" style="object-fit: cover;">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel1">What's on</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img class="w-100 border-radius-md" src="./assets/img/banner.jpeg">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Arrow -->
            <button class="btn btn-primary" onclick="scrollRightFunction()">Right</button>

        </div>
    </div>

    

   

    <div class="row">
        <div class="col-lg-12 position-relative">
            <div class="row">
                @foreach ($dashboard as $dashboard)
                    <div class="col-lg-2 col-md-4 col-6 mt-sm-0 mt-4">
                        <div class="card-dashboard mb-4">
                            <a href="{{ route('download.index') }}" class="card-body p-3 text-decoration-none text-dark">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <div
                                            class="icon-dashboard icon-shape-dashboard bg-gradient-primary shadow text-center d-flex align-items-center justify-content-center border-radius-md mb-3 mx-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                                {!! $dashboard->svg !!}
                                            </svg>
                                        </div>
                                        <div class="">
                                            <p class="mb-0 text-capitalize font-weight-bold">{{ $dashboard->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                @foreach ($menus as $menu)
                    <div class="col-lg-2 col-md-4 col-6 mt-sm-0 mt-4">
                        <div class="card-dashboard mb-4">
                            <a href="{{ $menu->menu->url }}" class="card-body p-3 text-decoration-none text-dark"
                                target="_blank">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <div
                                            class="icon-dashboard icon-shape-dashboard bg-gradient-primary shadow text-center d-flex align-items-center justify-content-center border-radius-md mb-3 mx-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                                {!! $menu->menu->svg !!}
                                            </svg>
                                        </div>
                                        <div class="">
                                            <p class="mb-0 text-capitalize font-weight-bold">{{ $menu->menu->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-2 col-md-4 col-6 mt-sm-0 mt-4">
                    <div class="card-dashboard mb-4">
                        <a href="#" class="card-body p-3 text-decoration-none text-dark">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div
                                        class="icon-dashboard icon-shape-dashboard bg-gradient-primary shadow text-center d-flex align-items-center justify-content-center border-radius-md mb-3 mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#e8eaed">
                                            <path
                                                d="M560-600q-17 0-28.5-11.5T520-640v-160q0-17 11.5-28.5T560-840h240q17 0 28.5 11.5T840-800v160q0 17-11.5 28.5T800-600H560ZM160-440q-17 0-28.5-11.5T120-480v-320q0-17 11.5-28.5T160-840h240q17 0 28.5 11.5T440-800v320q0 17-11.5 28.5T400-440H160Zm400 320q-17 0-28.5-11.5T520-160v-320q0-17 11.5-28.5T560-520h240q17 0 28.5 11.5T840-480v320q0 17-11.5 28.5T800-120H560Zm-400 0q-17 0-28.5-11.5T120-160v-160q0-17 11.5-28.5T160-360h240q17 0 28.5 11.5T440-320v160q0 17-11.5 28.5T400-120H160Z" />
                                        </svg>
                                    </div>
                                    <div class="">
                                        <p class="mb-0 text-capitalize font-weight-bold">Dashboard</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mt-sm-0 mt-4">
                    <div class="card-dashboard mb-4">
                        <a href="#" class="card-body p-3 text-decoration-none text-dark">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div
                                        class="icon-dashboard icon-shape-dashboard bg-gradient-primary shadow text-center d-flex align-items-center justify-content-center border-radius-md mb-3 mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#e8eaed">
                                            <path
                                                d="M560-600q-17 0-28.5-11.5T520-640v-160q0-17 11.5-28.5T560-840h240q17 0 28.5 11.5T840-800v160q0 17-11.5 28.5T800-600H560ZM160-440q-17 0-28.5-11.5T120-480v-320q0-17 11.5-28.5T160-840h240q17 0 28.5 11.5T440-800v320q0 17-11.5 28.5T400-440H160Zm400 320q-17 0-28.5-11.5T520-160v-320q0-17 11.5-28.5T560-520h240q17 0 28.5 11.5T840-480v320q0 17-11.5 28.5T800-120H560Zm-400 0q-17 0-28.5-11.5T120-160v-160q0-17 11.5-28.5T160-360h240q17 0 28.5 11.5T440-320v160q0 17-11.5 28.5T400-120H160Z" />
                                        </svg>
                                    </div>
                                    <div class="">
                                        <p class="mb-0 text-capitalize font-weight-bold">Dashboard</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mt-sm-0 mt-4">
                    <div class="card-dashboard mb-4">
                        <a href="#" class="card-body p-3 text-decoration-none text-dark">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div
                                        class="icon-dashboard icon-shape-dashboard bg-gradient-primary shadow text-center d-flex align-items-center justify-content-center border-radius-md mb-3 mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#e8eaed">
                                            <path
                                                d="M560-600q-17 0-28.5-11.5T520-640v-160q0-17 11.5-28.5T560-840h240q17 0 28.5 11.5T840-800v160q0 17-11.5 28.5T800-600H560ZM160-440q-17 0-28.5-11.5T120-480v-320q0-17 11.5-28.5T160-840h240q17 0 28.5 11.5T440-800v320q0 17-11.5 28.5T400-440H160Zm400 320q-17 0-28.5-11.5T520-160v-320q0-17 11.5-28.5T560-520h240q17 0 28.5 11.5T840-480v320q0 17-11.5 28.5T800-120H560Zm-400 0q-17 0-28.5-11.5T120-160v-160q0-17 11.5-28.5T160-360h240q17 0 28.5 11.5T440-320v160q0 17-11.5 28.5T400-120H160Z" />
                                        </svg>
                                    </div>
                                    <div class="">
                                        <p class="mb-0 text-capitalize font-weight-bold">Dashboard</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mt-sm-0 mt-4">
                    <div class="card-dashboard mb-4">
                        <a href="#" class="card-body p-3 text-decoration-none text-dark">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div
                                        class="icon-dashboard icon-shape-dashboard bg-gradient-primary shadow text-center d-flex align-items-center justify-content-center border-radius-md mb-3 mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#e8eaed">
                                            <path
                                                d="M560-600q-17 0-28.5-11.5T520-640v-160q0-17 11.5-28.5T560-840h240q17 0 28.5 11.5T840-800v160q0 17-11.5 28.5T800-600H560ZM160-440q-17 0-28.5-11.5T120-480v-320q0-17 11.5-28.5T160-840h240q17 0 28.5 11.5T440-800v320q0 17-11.5 28.5T400-440H160Zm400 320q-17 0-28.5-11.5T520-160v-320q0-17 11.5-28.5T560-520h240q17 0 28.5 11.5T840-480v320q0 17-11.5 28.5T800-120H560Zm-400 0q-17 0-28.5-11.5T120-160v-160q0-17 11.5-28.5T160-360h240q17 0 28.5 11.5T440-320v160q0 17-11.5 28.5T400-120H160Z" />
                                        </svg>
                                    </div>
                                    <div class="">
                                        <p class="mb-0 text-capitalize font-weight-bold">Dashboard</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mt-sm-0 mt-4">
                    <div class="card-dashboard mb-4">
                        <a href="#" class="card-body p-3 text-decoration-none text-dark">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div
                                        class="icon-dashboard icon-shape-dashboard bg-gradient-primary shadow text-center d-flex align-items-center justify-content-center border-radius-md mb-3 mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#e8eaed">
                                            <path
                                                d="M560-600q-17 0-28.5-11.5T520-640v-160q0-17 11.5-28.5T560-840h240q17 0 28.5 11.5T840-800v160q0 17-11.5 28.5T800-600H560ZM160-440q-17 0-28.5-11.5T120-480v-320q0-17 11.5-28.5T160-840h240q17 0 28.5 11.5T440-800v320q0 17-11.5 28.5T400-440H160Zm400 320q-17 0-28.5-11.5T520-160v-320q0-17 11.5-28.5T560-520h240q17 0 28.5 11.5T840-480v320q0 17-11.5 28.5T800-120H560Zm-400 0q-17 0-28.5-11.5T120-160v-160q0-17 11.5-28.5T160-360h240q17 0 28.5 11.5T440-320v160q0 17-11.5 28.5T400-120H160Z" />
                                        </svg>
                                    </div>
                                    <div class="">
                                        <p class="mb-0 text-capitalize font-weight-bold">Dashboard</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
    {{-- <div class="">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Conversations</h6>
          </div>
          <div class="card-body ">
            <div class="row">
                <div class="col-2">
                    <div class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../../../assets/img/ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Ivanna</h6>
                        <p class="mb-0 text-xs">About files I can..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../../../assets/img/ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Ivanna</h6>
                        <p class="mb-0 text-xs">About files I can..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../../../assets/img/ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Ivanna</h6>
                        <p class="mb-0 text-xs">About files I can..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../../../assets/img/ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Ivanna</h6>
                        <p class="mb-0 text-xs">About files I can..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../../../assets/img/ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Ivanna</h6>
                        <p class="mb-0 text-xs">About files I can..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../../../assets/img/ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Ivanna</h6>
                        <p class="mb-0 text-xs">About files I can..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                    </div>
                  </div>
               
                
              </div>
              
          </div>
        </div>
    </div> --}}
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-lg-3 text-center">
                {{-- <img src="../../../assets/img/confeti3.png" alt="Left Image" class="img-fluid"> --}}
            </div>
            <div class="col-12 col-lg-6 mt-lg-0 mt-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Today's Birthday</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                <div class="avatar avatar-xl position-relative me-3">
                                    <img src="../../../assets/img/kal-visuals-square.jpg" alt="kal"
                                        class="border-radius-lg shadow">
                                </div>
                                <div class="d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">Sophie B.</h6>
                                    {{-- <p class="mb-0 text-xs">Hi! I need more information..</p> --}}
                                </div>
                                {{-- <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a> --}}
                            </li>
                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                <div class="avatar avatar-xl position-relative me-3">
                                    <img src="../../../assets/img/marie.jpg" alt="kal"
                                        class="border-radius-lg shadow">
                                </div>
                                <div class="d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">Anne Marie</h6>
                                    {{-- <p class="mb-0 text-xs">Awesome work, can you..</p> --}}
                                </div>
                                {{-- <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a> --}}
                            </li>
                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                <div class="avatar avatar-xl position-relative me-3">
                                    <img src="../../../assets/img/team-4.jpg" alt="kal"
                                        class="border-radius-lg shadow">
                                </div>
                                <div class="d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">Peterson</h6>
                                    {{-- <p class="mb-0 text-xs">Have a great afternoon..</p> --}}
                                </div>
                                {{-- <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a> --}}
                            </li>
                            <li class="list-group-item border-0 d-flex align-items-center px-0">
                                <div class="avatar avatar-xl position-relative me-3">
                                    <img src="../../../assets/img/team-3.jpg" alt="kal"
                                        class="border-radius-lg shadow">
                                </div>
                                <div class="d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">Nick Daniel</h6>
                                    {{-- <p class="mb-0 text-xs">Hi! I need more information..</p> --}}
                                </div>
                                {{-- <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 text-center">
                {{-- <img src="../../../assets/img/confeti2.png" alt="Right Image" class="img-fluid"> --}}
            </div>
        </div>
    </div>
@endsection

{{-- @section('footer')
<footer class="footer pt-7">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="copyright text-center text-sm text-muted text-lg-start">
            © <script>
              document.write(new Date().getFullYear())
            </script>,
            made by
          </div>
        </div>
      </div>
    </div>
  </footer>
@endsection --}}

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <script>
        function scrollLeftFunction() {
    let container = document.getElementById('cardContainer');
    // Cek apakah bisa scroll ke kiri
    if (container.scrollLeft > 0) {
        container.scrollBy({
            left: -200, // Adjust the scroll amount as needed
            behavior: 'smooth'
        });
    }
}

function scrollRightFunction() {
    let container = document.getElementById('cardContainer');
    // Cek apakah bisa scroll ke kanan
    if (container.scrollLeft + container.clientWidth < container.scrollWidth) {
        container.scrollBy({
            left: 200, // Adjust the scroll amount as needed
            behavior: 'smooth'
        });
    }
}


    </script>
@endsection
