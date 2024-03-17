@extends('admin.app')
@section('content')
<h1>Sua loai san pham</h1>
<form action="{{route('admin.loaisp.update',$loaisp)}}" method="post">
    <p>Ma loai: <input type="text" name="id" id="id" value="{{$loaisp->id}}" readonly disabled></p>
    <p>Ten loai: <input type="text" name="tenloai" id="tenloai" value="{{$loaisp->tenloai}}" ></p>
    <p>Delet: <input type="text" name="Delet" id="Delet" value="{{$loaisp->Delet}}" ></p>
    @csrf
    <p><Button type="submit" class="btn btn-primary">Cập nhật</Button></p>
</form>
@endsection
