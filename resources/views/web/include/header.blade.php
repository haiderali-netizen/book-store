<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
    $url = URL::current();
    if ($MainMenu != null) {
    $title="Home";
    foreach ($MainMenu as $main) {
    $lin = $main->link;
    if ($main->link != null) {
    if (strpos($url,$lin)) {
    $title = $main->name;
    }
    }
    }
    }
    @endphp
    @if(isset($meta))
    <title>{{$meta->title}}</title>
    <meta name="description" content="{{$meta->description}}">
    <meta name="Keywords" content="{{$meta->keywordsimp}}">
    @else
    <title>Book Store</title>
    @endif
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        window.OneSignal = window.OneSignal || [];
      OneSignal.push(function() {
        OneSignal.init({
          appId: "e7a89dbf-b086-4970-b82f-19b35b6c1334",
        });
      });
    </script>
    <!-- Fav Icon -->
    <link rel="icon" type="image/png" href="{{URL::to('storage/app')}}/{{$favicon != null ? $favicon->image : ''}}">
    <!-- style file -->
    <link href="{{ asset('assests/css/style.css')}}" rel="stylesheet">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- fontawesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!-- owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</head>

<body>
    <div class="wrapper">
        <form action="{{URL::to('searchItemFind')}}" method="post">
            <div class="container">
                <header class="bg-white">
                    <div class="row bd-bottom">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <nav class="">
                                <div class="row">
                                    <div class="w10">
                                        <a class="navbar-brand" href="{{URL::to('/')}}"><img
                                                src="{{URL::to('storage/app')}}/{{$logo != null ? $logo->image : ''}}"
                                                class="img-fluid" alt="logo" class="img-fluid"
                                                style="width: 100px;"></a>
                                    </div>
                                    <div class="w20">
                                        <div class="input-group ml5" style="padding-left: 68px">
                                            <div class="input-group-prepend" id="inputGroupSelect03">

                                                <div class="dropdown">
                                                    <button class="dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        All
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#" type="all" src="All">All</a>
                                                        @foreach($AllBookCategories as $bookCat)
                                                        <a class="dropdown-item show-read-more" href="#" type="category"
                                                            src="{{$bookCat->id}}">{{$bookCat->name}}</a>
                                                        @endforeach
                                                        @foreach($AllBookTypes as $bookTyp)
                                                        <a class="dropdown-item show-read-more" href="#" type="type"
                                                            src="{{$bookTyp->id}}">{{$bookTyp->name}}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="width-input">
                                                <input type="search" name="terms"
                                                    class="form-control form-control-height searchsite" id="searchsite"
                                                    required autocomplete="off">
                                            </div>
                                            <div>
                                                <button class="input-group-append bordr btn p-0 bg-white" type="submit">
                                                    <i class="fas fa-search form-control-height"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w30">
                                        <div class="d-flex">
                                            @if(Session::has('onlineClient'))
                                            @php
                                            $onlineClientData = Session::get('onlineClient');
                                            $getCartQuantity =
                                            App\Models\AddToCartModel::where('userId',$onlineClientData->id)->get();
                                            @endphp
                                            <a href="{{URL::to('/shoping-cart')}}" class="btn btn-ligh mr-3"><i
                                                    class="fa fa-shopping-cart"></i><sup
                                                    class="addOnCartClick">{{count($getCartQuantity) == 0 ? '' : count($getCartQuantity)}}</sup></a>
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle background-remove"
                                                    data-toggle="dropdown">
                                                    <img class="rounded-circle"
                                                        src="{{URL::to('public/admin/assets/images/avatars/profile-image-2.png')}}"
                                                        width="40px" height="40px">
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="{{URL::to('/orders')}}" class="dropdown-item">My Orders</a>
                                                    <a href="{{URL::to('/logout')}}" class="dropdown-item">Logout</a>
                                                </div>
                                            </div>
                                            @else
                                            @php
                                            $uniqid = Session::get('uniqid');
                                            $getCartQuantity =
                                            App\Models\AddToCartModel::where('sessionId',$uniqid)->get();
                                            @endphp
                                            <a href="{{URL::to('/shoping-cart')}}" class="btn btn-ligh mr-3"><i
                                                    class="fa fa-shopping-cart"></i><sup
                                                    class="addOnCartClick">{{count($getCartQuantity) == 0 ? '' : count($getCartQuantity)}}</sup></a>
                                            <a href="{{URL::to('/login')}}" class="btn btn-ligh mr-3">Login</a>
                                            <a href="{{URL::to('/author-signup')}}" class="btn btn-ligh mr-3">Admin
                                                Panel</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </header>
            </div>
        </form>
        <div class="container shadow">
            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <ul class="nav justify-content-center p-2">
                            @foreach ($MainMenu as $menu)
                            <li>
                                <a class="dropdown-item" href="{{URL::to('')}}/{{$menu->link}}">{{$menu->name}}</a>
                            </li>
                            @endforeach

                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <style>
            .bordr i {
                padding: 10px !important;
            }

            #dropdownMenuButton::before {
                content: "\f038";
                font-family: "Font Awesome 5 Free";
                font-size: 23px;
                border: none;
                top: 2px;
                left: 20px;
                display: inline-block;
            }

            .background-remove {
                background-color: white;
                padding: 0px 8px;
            }

            .dropdown-toggle::after {
                display: none !important;
            }
        </style>
