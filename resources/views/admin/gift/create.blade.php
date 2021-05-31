@extends("admin.layout.interface")
@section("breadcrumb")
<li class="breadcrumb-item">
    <a href="{{URL::to('/admin')}}">Admin</a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="{{ Route('gift.index') }}">Gift</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection
@section("content")
@if(Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<form action="{{ Route('gift.store') }}" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror"
                value="{{ old('title') }}">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="">Price</label>
            <input type="number" min="1" name="price" class="form-control @error('price') is-invalid @enderror"
                value="{{ old('price') }}">

            @error('price')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="">Stock</label>
            <input type="number" min="1" name="stock" class="form-control @error('stock') is-invalid @enderror"
                value="{{ old('stock') }}">
            @error('stock')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-sm-6">
            <img src="" alt="" class="d-none mt-1" id="imgDis" width="100px" height="100px">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="">Category</label>
            <select name="category" class="form-control @error('category') is-invalid @enderror" required>
                <option value="" selected disabled>Select Category</option>
                @foreach ($categories as $category)
                <option {{ old('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                    {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
            <label for=""> Image</label>
            <input type="file" name="image" id="img" class="form-control @error('image') is-invalid @enderror"
                accept="image/*">
            @error('image')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label for="">Description</label>
            <textarea name="description"
                class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <br>

    <input type="submit" class="btn btn-primary" value="Save">
</form>

@endsection

@section('scripts')
<script>
    const img = document.querySelector("#img")
    const imgDis = document.querySelector("#imgDis")

    img.addEventListener('change', (e) => {
        let file = e.target.files[0];
        let url = URL.createObjectURL(file);

        imgDis.setAttribute('src', url)
        imgDis.classList.remove('d-none')
    });
</script>
@endsection
