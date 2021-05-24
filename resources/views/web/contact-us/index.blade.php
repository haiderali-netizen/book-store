@include ('web/include/header')

<style>
    .bg-map iframe {
        background: linear-gradient(rgba(255, 255, 255, 0), rgb(255, 255, 255, 1)) !important;
        background-size: cover;
        background-repeat: no-repeat;
        height: 300px;
        width: 100%;
    }
</style>

<div class="bg-map">

    {!! $FooterContent[8]->icon !!}

</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card8 shadow p-5">
                <h4 class="text-center">WE ARE HAPPY TO HEAR FROM YOU</h4>
                <form action="">
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="form-group input-boder">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group input-boder">
                                <input type="text" class="form-control" placeholder="Enter Mail">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="" class="form-control" placeholder="Write Message" id="" cols="30"
                                    rows="7"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-checkout">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





@include ('web/include/footer')
