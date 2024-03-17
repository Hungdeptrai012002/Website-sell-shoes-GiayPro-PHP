@extends('admin.app')
@section('content')
<h1>Sửa Sản Phẩm</h1>
<form action="{{route('admin.sp.update',$sanphams)}}" method="post">
    <p>Mã Sản Phẩm: <input type="hidden" name="id" id="id" value="{{$sanphams->id}}" readonly disabled></p>
    <p>Tên Sản Phẩm: <input type="text" name="name" id="name" value="{{$sanphams->name}}"></p>
    <p>Loại Sản Phẩm: <input type="text" name="id_loai_sp" id="id_loai_sp" value="{{$sanphams->id_loai_sp}}"></p>
    <p>MÃ nhà cung cấp: <input type="text" name="ncc" id="ncc" value="{{$sanphams->id_ncc}}"></p>
    <p>Mô Tả: <input type="text" name="mota_sp" id="mota_sp" value="{{$sanphams->mota_sp}}"></p>
    <p>Gía: <input type="text" name="unit_price" id="unit_price" value="{{$sanphams->unit_price}}"></p>
    <p>Số Lượng: <input type="text" name="so_luong" id="so_luong" value="{{$sanphams->so_luong}}"></p>
    <p>Anh: <input type="file" name="image" id="image" value="{{$sanphams->image}}"></p>
    <p>Delet: <input type="text" name="Delet" id="Delet" value="{{$sanphams->Delet}}"></p>
    @csrf
    <p><Button type="submit" class="btn btn-primary">Cập Nhập</Button></p>
</form>
@endsection
