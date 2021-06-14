@include ('web.include.header')
<div class="container">
    <section class="mt-5">
        @if (Session::has('message'))
        <div class="alert alert-success">
            <p class="text-weight-bold">
                {{ Session::get('message') }}
            </p>
        </div>
        @endif
        <div class="row">
            <h2 class="text-title text-center mb-5">PDF ORDER</h2>
            <form action="{{ Route('pdf-order.store') }}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                        <label for="">File</label>
                        <input type="file" name="file" class="form-control" style="height: 44px;" required>
                        @error('file')
                        <p class="text-danger">{{ $message  }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                        <label for="">Pages</label>
                        <input type="number" name="pages" class="form-control" id="pages" required>
                        @error('pages')
                        <p class="text-danger">{{ $message  }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                        <label for="">Size</label>
                        <input type="text" name="size" class="form-control" required>
                        @error('size')
                        <p class="text-danger">{{ $message  }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                        <label for="">Color</label>
                        <select name="color" class="form-control" required>
                            <option value="" selected disabled>Choose pages color ...</option>
                            <option value="Black">Black</option>
                            <option value="Multi">Multi</option>
                        </select>
                        @error('color')
                        <p class="text-danger">{{ $message  }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                        <label for="">Qty</label>
                        <input type="number" name="qty" value="1" min="1" class="form-control" required>
                        @error('qty')
                        <p class="text-danger">{{ $message  }}</p>
                        @enderror
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <input type="submit" class="btn btn-purple mt-2" value="Place Order">
                    </div>
            </form>
        </div>
    </section>
</div>
@include ('web.include.footer')
