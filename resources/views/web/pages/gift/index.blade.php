@include ('web.include.header')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <div class="mainPage">
                    <div class="sidebar" layout-padding>
                        <div class="parent-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Category Option</h3>
                                </div>
                            </div>
                            <ul class="faq">
                                <div>
                                    <li>
                                        <div class="sort1">
                                            <h6 class="">
                                                <a href="{{ url('gift') }}" class="pl-4 text-dark">ALL
                                                </a>
                                            </h6>
                                            @foreach ($categories as $category)
                                            <h6 class="">
                                                <a href="{{ url('gift', $category->slug) }}"
                                                    class="pl-4 text-dark">{{ $category->name }}
                                                </a>
                                                <small class="text-danger">({{ $category->gifts_count }})</small>
                                            </h6>
                                            @endforeach

                                        </div>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="window_panel">
                        @foreach ($gifts as $gift)
                        <div class="product">
                            {{-- <a href="{{URL::to('/book-detail')}}/<%product.id%>"> --}}
                            <img src="{{ $gift->image }}" alt="" width="150px" height="200px">
                            {{-- </a> --}}
                            <br>
                            <div ng-hide="changeText">
                                <h6>{{ $gift->title }}</h6>
                                </p>{{ $gift->category? $gift->category->name : ''  }}</p>
                                {{-- <p>
                                    @for ($i=0;$i < 5; $i++) <i
                                        class="fa fa-star <% {{$i}} < product.rating ? 'text-warning' : '' %>"></i>
                                    @endfor
                                    </p> --}}
                            </div>
                            <div>
                                <p>
                                    {{ $gift->price }}
                                    <span class="text-dull"><s>{{ $gift->price*1.2 }}</s></span>
                                </p>
                                <div class="btn btn-primary btn-sm AddToCart" productPrice="{{ $gift->price }}"
                                    productType="gift" productid="{{ $gift->id }}">Add To Cart
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="text-center">
                {{ $gifts->links() }}
            </div>
        </div>
    </div>
</div>





@include ('web/include/footer')

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/2.4.1/lodash.js"></script>
<style>
    nav svg {
        width: 27px;
    }

    .sort1 {
        position: relative;
    }

    .sort1 .plus-minus-toggle1:after {
        content: "\f107";
        font-family: "Font Awesome 5 Free";
        font-size: 20px;
        color: #a29f9f52;
        border: none;
        position: absolute;
        top: 10px;
        right: 20px;
        display: inline-block;
        font-weight: 900;
        -webkit-transition: 0.15s ease-in-out;
        transition: 0.15s ease-in-out;
    }

    .plus-minus-toggle1.collapsed:after {
        transform: rotate(-180deg);
    }

    .mainPage {
        display: flex;
    }

    .sidebar {
        width: 23%
    }

    .window_panel {
        width: 75%;
        display: flex;
        flex-flow: row wrap;
        justify-content: center;
        height: 100%;
    }

    .product {
        padding: 13px;
        margin: 5px;
        border: 1px solid #f7f7f7;
        border-radius: 5px;
    }

    li {
        list-style: none;
    }

    .sort a {
        text-decoration: none;
    }

    li span {
        display: inline;
        font-size: 12px;
    }

    .plus-minus-toggle {
        cursor: pointer;
        height: 21px;
        position: relative;
        width: 21px;
    }

    .plus-minus-toggle:before,
    .plus-minus-toggle:after {
        background: #000;
        content: '';
        height: 5px;
        left: 0;
        position: absolute;
        top: 9px;
        width: 13px;
        transition: transform 500ms ease;
    }

    .plus-minus-toggle:after {
        transform-origin: center;
    }

    .plus-minus-toggle.collapsed:after {
        transform: rotate(90deg);
    }

    .plus-minus-toggle.collapsed:before {
        transform: rotate(180deg);
    }

    .ng-binding {
        width: 140px !important;
    }

    .sort1 {
        border: 1px solid #f7f7f7;
        border-radius: 9px;
        padding: 10px;
        margin-bottom: 15px;
    }

    .product img {
        border-radius: 12px;
    }

    .leading-5 {
        display: none;
    }
</style>
