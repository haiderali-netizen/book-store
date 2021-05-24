@include ('web/include/header')
    <div class="container">
        <section class="mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-title text-center mb-5">All Sale Books</h2>
                    <div class="row">
                        @foreach ($SaleBooks as $saleBook)
                            @php
                                $bok = $saleBook->GetBook();
                                $category = $bok->GetCategory();
                            @endphp
                            <div class=" col-md-2 col-12 mb-3">
                                <a href="{{URL::to('book-detail')}}/{{$bok->id}}">
                                    <img src="{{URL::to('storage/app')}}/{{$bok->cover_image}}" alt="featured image" class="w-100 mb-1" height="226px">
                                    <div class="card-body border-0 p-0 text-left">
                                        <h6 class="card-title text-color mb-0 book-title-character">{{$bok->name}}</h6>
                                        <p class="text-blue m-0"  style="font-size:13px;">{{$category->name}}</p>
                                        <span class="text-dark">${{$bok->price}}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @if(count($SaleBooks) == 12)
                        <div class="mt-5">
                            <a href="{{URL::to('sale-books')}}" class="btn btn-block btn-blue p-3">Veiw More Books</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-title text-center mb-5">All Special Sale Books</h2>
                    <div class="row">
                        @foreach ($SpecialBooks as $specialBook)
                            @php
                                $bok = $specialBook->GetBook();
                                $category = $bok->GetCategory();
                            @endphp
                            <div class=" col-md-2 col-12 mb-3">
                                <a href="{{URL::to('book-detail')}}/{{$bok->id}}">
                                    <img src="{{URL::to('storage/app')}}/{{$bok->cover_image}}" alt="featured image" class="w-100 mb-1" height="226px">
                                    <div class="card-body border-0 p-0 text-left">
                                        <h6 class="card-title text-color mb-0 book-title-character">{{$bok->name}}</h6>
                                        <p class="text-blue m-0"  style="font-size:13px;">{{$category->name}}</p>
                                        <span class="text-dark">${{$bok->price}}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @if(count($SpecialBooks) == 12)
                        <div class="mt-5">
                            <a href="{{URL::to('special-books')}}" class="btn btn-block btn-blue p-3">Veiw More Books</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-title text-center mb-5">All Flash Sale Books</h2>
                    <div class="row">
                        @foreach ($FlashBooks as $flashBook)
                            @php
                                $bok = $flashBook->GetBook();
                                $category = $bok->GetCategory();
                            @endphp
                            <div class=" col-md-2 col-12 mb-3">
                                <a href="{{URL::to('book-detail')}}/{{$bok->id}}">
                                    <img src="{{URL::to('storage/app')}}/{{$bok->cover_image}}" alt="featured image" class="w-100 mb-1" height="226px">
                                    <div class="card-body border-0 p-0 text-left">
                                        <h6 class="card-title text-color mb-0 book-title-character">{{$bok->name}}</h6>
                                        <p class="text-blue m-0"  style="font-size:13px;">{{$category->name}}</p>
                                        <span class="text-dark">${{$bok->price}}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @if(count($FlashBooks) == 12)
                        <div class="mt-5">
                            <a href="{{URL::to('flash-books')}}" class="btn btn-block btn-blue p-3">Veiw More Books</a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@include ('web/include/footer')
