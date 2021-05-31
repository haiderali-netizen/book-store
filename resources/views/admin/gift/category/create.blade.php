@extends("admin.layout.interface")
@section("breadcrumb")
<li class="breadcrumb-item">
    <a href="{{URL::to('/admin')}}">Admin</a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="{{ Route('gift-category.index') }}">GIFT</a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="{{ Route('gift-category.index') }}">Category</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection
@section("content")
@if(Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<form action="{{ Route('gift-category.store') }}" method="post">
    @csrf
    <label for="">Category Name </label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
    @error('name')
    <p class="alert alert-danger">{{ $message }}</p>
    @enderror
    <br>
    <input type="submit" class="btn btn-primary" value="Save">
</form>

@endsection
