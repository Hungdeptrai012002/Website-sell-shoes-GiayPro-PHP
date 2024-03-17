@extends('admin.app')
@section('content')
<h1>Thêm Sản Phẩm</h1>
<form action="{{route('admin.sp.addnew',$sanphams)}}" method="post">
    <p>Mã Sản Phẩm: <input type="hidden" name="id" id="id" value="{{$sanphams->id}}"></p>
    <p>Tên Sản Phẩm: <input type="text" name="name" id="name" value="{{$sanphams->name}}"></p>
    <p>Loại Sản Phẩm: <input type="text" name="id_loai_sp" id="id_loai_sp" value="{{$sanphams->id_loai_sp}}"></p>
    <p>Mã nhà cung cấp: <input type="text" name="ncc" id="ncc" value="{{$sanphams->id_ncc}}"></p>
    <p>Mô Tả: <input type="text" name="mota_sp" id="mota_sp" value="{{$sanphams->mota_sp}}"></p>
    <p>Gía: <input type="text" name="unit_price" id="unit_price" value="{{$sanphams->unit_price}}"></p>
    <p>Số Lượng: <input type="text" name="sl" id="sl" value="{{$sanphams->so_luong}}"></p>
    <p>Anh: <input type="file" name="anh" id="anh" value="{{$sanphams->image}}"></p>
    <p>Delet: <input type="text" name="Delet" id="Delet" value="{{$sanphams->Delet}}"></p>
    @csrf
    <p><Button type="submit" class="btn btn-primary">Thêm Mới</Button></p>
</form>
@endsection
