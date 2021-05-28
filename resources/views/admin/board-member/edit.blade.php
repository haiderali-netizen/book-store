@extends("admin.layout.interface")
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/board-member')}}">Board Member</a></li>
<li class="breadcrumb-item active" aria-current="page">Update</li>
@endsection
@section("content")
@if(Session::has('success'))
@php $message = Session::get('success'); @endphp
<div class="alert alert-success">{{$message}}</div>
@php Session::pull('success'); @endphp
@endif
@if(Session::has('danger'))
@php $message = Session::get('danger'); @endphp
<div class="alert alert-danger">{{$message}}</div>
@php Session::pull('danger'); @endphp
@endif
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for=""> Name</label>
            <input type="text" name="name" value="{{$data->name}}" class="form-control" required>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for=""> Designation</label>
            <input type="text" name="designation" value="{{$data->designation}}" class="form-control" required>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <img src="{{ asset($data->image) }}" alt="" width="100px" height="100px">
            <input type="file" name="image" class="form-control">
        </div>
    </div>

    <h5>Social Links</h5>
    <div class="wrapper" element="1">
        <div class="element">
            <div class="row">
                @php
                $socailSites = explode("@",$data->social_sites);
                $sociallink = explode("@",$data->social_link);
                @endphp
                @for ($i = 0; $i < count($sociallink); $i++ ) @if ($i> 0)
                    <div class="element{{$icount}}">
                        <div class="row">
                            @endif
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for=""> Social Site </label>
                                <select name="social[]" class="form-control fa" required>
                                    @foreach($socialMediaInfo as $social)
                                    <option value="{{$social->id}}" class="fa"
                                        {{$social->id == $socailSites[$i] ? 'selected' : ''}}>
                                        @php echo "&#x".$social->icon.";"; @endphp
                                        {{$social->title}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for=""> Social Link </label>
                                <input type="text" name="link[]" value="{{$sociallink[$i]}}" class="form-control"
                                    required>
                            </div>
                            @if ($i == 0)
                        </div><br>
                    </div>
                    <div class="results">
                        @php $icount = 0; @endphp
                        @else
                    </div>
                    <div class="buttons text-right mt-2">
                        <i class="fa fa-minus remove ml-2 text-danger cursorpointer" element="element{{$icount}}"></i>
                    </div><br>
                    @endif
                    @php $icount++ @endphp
                    @endfor
            </div>
            <div class="buttons text-right mt-2">
                <i class="fa fa-plus clone ml-2 text-primary cursorpointer"></i>
            </div>
        </div>
        <br />

        <input type="submit" class="btn btn-primary" value="Update">
</form>
@endsection
