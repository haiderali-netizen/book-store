@include ('web.include.header')
<div class="container mt-4">
    <section class=" mt-5">
        <div class="row">
            <div class="col-md-12 col-md-12 text-center">
                <h2 class="text-color mb-5">Our Authors</h2>
                <div class="row">
                    @foreach ($totalAuthor as $auth)
                    @php $data1 = $auth->GetUserInfo() ; @endphp

                    <div class="col-md-3 col-sm-4 col-3">
                        <div class="item m-3">
                            <div class="card7">
                                <div class="bg-author">
                                    <div class="autor-img">
                                        <p class="text-center">
                                            <img src="{{ asset($data1->image) }}" alt="featured image"
                                                class="img-fluid p-3 mb-1" style="height:200px; width:200px">
                                        </p>
                                    </div>
                                </div>
                                <div class="card-body border-0 text-left">
                                    <h5 class="card-title text-color">{{$data1->name}}</h5>

                                    <p class="card-text">{{$data1->description}}</p>
                                    <a href="{{URL::to('author-profile')}}/{{$data1->id}}">
                                        <h6>Author Shop</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
@include ('web.include.footer')
