@extends("admin.layout.interface")
@section("breadcrumb")
<li class="breadcrumb-item">
    <a href="{{URL::to('/admin')}}">Admin</a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="{{ Route('stationary.index') }}">Stationary</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Update</li>
@endsection
@section("content")
@if(Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<form action="{{ Route('stationary.update', $stationary->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $stationary->name }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="">Price</label>
            <input type="number" min="1" name="price" class="form-control" value="{{ $stationary->price }}">

            @error('price')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="">Stock</label>
            <input type="number" min="1" name="stock" class="form-control" value="{{ $stationary->stock }}">
            @error('stock')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-sm-6">
            <img src="{{ $stationary->image }}" alt="" class="mt-1" id="imgDis" width="100px" height="100px">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="">Category</label>
            <select name="category" class="form-control" required>
                <option value="" selected disabled>Select Category</option>
                @foreach ($categories as $category)
                @if($stationary->category)
                <option {{ $stationary->category->id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                    {{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">
                    {{ $category->name }}</option>
                @endif
                @endforeach
            </select>
            @error('category')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
            <label for=""> Image</label>
            <input type="file" name="image" id="img" class="form-control" accept="image/*">
            @error('image')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label for=""> Short Description</label>
            <textarea name="short_description" class="form-control">{{ $stationary->short_description }}</textarea>
            @error('short_description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label for=""> Detail Description</label>
            <textarea name="description" class="form-control">{{ $stationary->description }}</textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div><br>
    {{-- <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label for=""> Recommded For You All</label>
            <input type="checkbox" class="mr-3" name="recommded_all" value="1" style="height: 11px;">
            <label for=""> Recommded For You Only</label>
            <input type="checkbox" name="recommded_only" value="1" style="height: 11px;">
        </div>
    </div><br /> --}}

    <input type="submit" class="btn btn-primary" value="Update">
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
