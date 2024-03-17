@extends('admin.app')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Quản lý loại sản phẩm</h3>
    </div>
    @php
        $dem =1;
    @endphp
    <div class="card-body">
        <a href="{{route('admin.loaisp.new')}}" class="btn btn-primary">Thêm mới</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>TT</th>
                        <th>Tên loại</th>
                        {{-- <th>Delet</th> --}}
                        <th>Sửa</th>
                        <th>Xoá</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($loaisp as $sp)
                    <tr>

                        <td>{{$dem++}}</td>
                        <td>{{$sp->tenloai}}</td>
                        {{-- <td>{{$sp->Delet}}</td> --}}
                        <td><a href="{{route('admin.loaisp.show',$sp)}}" class="btn btn-info">Sửa</a></td>
                        <td><a onclick="return confirm('Bạn có muốn xoá thật không?');" href="{{route("admin.loaisp.delete",$sp)}}" class="btn btn-danger">Xoá</a></td>

                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
