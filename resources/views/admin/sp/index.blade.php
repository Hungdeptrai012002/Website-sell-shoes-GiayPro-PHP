@extends('admin.app')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Quản Lý Sản Phẩm</h3>
    </div>
    @php
    $dem =1;
    @endphp
    <div class="card-body">
        <a href="{{route('admin.sp.new')}}" class="btn btn-primary">Thêm mới</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr style="color:black">
                        <th>TT</th>
                        <th>Tên Sản Phẩm</th>
                        {{-- <th>Mã loại sản phẩm</th>
                        <th>Mã nhà cung cấp</th> --}}
                        <th>Mô Tả</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Ảnh</th>
                        {{-- <th>Delet</th> --}}
                        <th>Sửa</th>
                        <th>Xóa</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($sanphams as $sp)
                    <tr>

                        <td>{{$dem++}}</td>
                        <td>{{$sp->name}}</td>
                        {{-- <td>{{$sp->id_loai_sp}}</td>
                        <td>{{$sp->id_ncc}}</td> --}}
                        <td>{{$sp->mota_sp}}</td>
                        <td>{{number_format($sp->unit_price)}}đ</td>
                        <td>{{$sp->so_luong}}</td>
                        <td><img style="width: 50px;height: 50px;" src="/upload/sanpham/{{$sp->image}}"></td>
                        {{-- <td>{{$sp->Delet}}</td> --}}
                        <td><a href="{{route('admin.sp.show',$sp)}}" class="btn btn-info">Sửa</a></td>
                        <td><a onclick="return confirm('Bạn có muốn xóa thật không?');" href="{{route("admin.sp.delete",$sp)}}" class="btn btn-danger">Xóa</a></td>

                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
