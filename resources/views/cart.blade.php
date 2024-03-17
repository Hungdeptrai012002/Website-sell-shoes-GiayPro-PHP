@extends('homemaster')
@section('content')
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="/">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shopping Cart</p>
        </div>
    </div>
</div>

@if(Session::has('cart') != null)
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <?php
                $subtotal  = 0;
                $total=0;
                ?>
                <tbody class="align-middle">
                    @foreach($cart as $item)
                    <?php

                    $subtotal += $item['quantity'] * $item['price'];
                    $total = $subtotal + 30000;

                    ?>
                        <tr>
                            <td class="align-middle"><img src="/upload/sanpham/{{$item['image']}}" alt="" style="width: 50px;"> {{$item['name']}}</td>
                            <td class="align-middle">{{number_format($item['price'])}}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <a href="{{route('Decrease').'/'.$item['id']}}" class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </a>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="{{$item['quantity']}}">
                                    <div class="input-group-btn">
                                        <a  href="{{route('Increase').'/'.$item['id']}}" class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">{{number_format($item['quantity'] * $item['price'])}}</td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary"><a href="{{route('RemoveItem').'/'.$item['id']}}"><i class="fa fa-times"></i></a></button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">{{number_format($subtotal)}}</h6>
                    </div>
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Phí ship</h6>
                        <h6 class="font-weight-medium">30000</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">{{number_format($total)}}</h5>
                    </div>
                    <a href="checkout" class="btn btn-block btn-primary my-3 py-3">Thanh Toán</a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<h1>Giỏ hàng rỗng</h1>
@endif
      <!-- Page Header Start -->

    <!-- Page Header End -->


    <!-- Cart Start -->

    <!-- Cart End -->

@endsection
