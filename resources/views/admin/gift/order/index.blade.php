@extends("admin.layout.interface")
@section("breadcrumb")
<li class="breadcrumb-item">
    <a href="{{URL::to('/admin')}}">Admin</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Orders</li>
@endsection
@section("content")
<div class="rows p-4" style="background-color:white">
    <div class="d-flex justify-content-between">
        <h4>All Orders</h4>
    </div>
    <br>
    <table id="myTable" class="table table-striped table-sm table-bordered">
        <thead>
            <tr class="text-center">
                <th>Id</th>
                <th>Client Name</th>
                <th>Name</th>
                <th>Total Products</th>
                <th>Order Price</th>
                <th>Status</th>
                <th>Opertions</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($totalData as $data)
                    @php
                    $Products = $data->GetProducts();
                    $User = $data->GetUser();
                    @endphp
                    <tr>
                        <td>
                            <!-- <input type="checkbox" name="feature[]" value="{{$data->id}}"> -->
            {{$data->id}}
            </td>
            <td>{{$User->firstName}} </td>
            <td>{{count($Products)}}</td>
            <td>${{$data->totalPrice}}</td>
            <td>
                @if ($data->status == 1)
                <p class="text-success">Complete</p>
                @else
                <p class="text-warning">Incomplete</p>
                @endif
            </td>
            <td>
                <a href="{{URL::to('admin/orders/detail')}}/{{$data->id}}" class="btn btn-info btn-sm">Detail</a>
                @if($data->status == 0 )
                <a href="{{URL::to('admin/orders/complete')}}/{{$data->id}}" class="btn btn-primary btn-sm">Complete</a>
                @endif
            </td>
            </tr>
            @endforeach --}}
        </tbody>
    </table>
</div>
@endsection
