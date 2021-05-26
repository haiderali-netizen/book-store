@extends("admin.layout.interface")
@section("breadcrumb")
<li class="breadcrumb-item">
    <a href="{{URL::to('/admin')}}">Admin</a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="{{ Route('stationary.index') }}">Stationary</a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="{{ Route('stationary-category.index') }}">Category</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Update</li>
@endsection
@section("content")
@if(Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<form action="{{ Route('stationary-category.update', $category->id) }}" method="post">
    @method('PUT')
    @csrf
    <label for="">Category Name </label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ $category->name }}">
    @error('name')
    <p class="alert alert-danger">{{ $message }}</p>
    @enderror
    <br>
    <input type="submit" class="btn btn-primary" value="Update">
</form>

@endsection
