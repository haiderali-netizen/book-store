@include ('web/include/header')
    <div class="container">
        <section class="mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-title text-center mb-5">PDF Order</h2>
                    @if(Session::has('success'))
                        @php $message = Session::get('success'); @endphp
                        <div class="alert alert-success">{{$message}}</div>
                    @endif
                    <form action="" method="post" enctype= multipart/form-data>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                                <label for="">File</label>
                                <input type="file" name="pdfFile" class="form-control" style="height: 44px;" required>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                                <label for="">Pages</label>
                                <input type="number" name="pages" class="form-control" id="pages" required>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                                <label for="">Sides</label>
                                <input type="number" name="sides" class="form-control" required>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                                <label for="">Color</label>
                                <select name="color" class="form-control" required>
                                    <option value="Black">Black</option>
                                    <option value="Multi">Multi</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                                <label for="">Total</label>
                                <input type="text" name="total" value="0" class="form-control" id="total" disabled>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                        </div>
                        <label for="">Comment</label>
                        <textarea name="comment" class="form-control" required></textarea>
                        <input type="submit" class="btn btn-purple mt-2" value="Save">
                    </form>
                </div>
            </div>
        </section>
    </div>
@include ('web/include/footer')
<script>
    $("#pages").on("keyup",function() {
        var pages = $(this).val();
        var amount = pages * {{$totalPricePerPage->total_price}};
        $("#total").val(amount);
    });
</script>