@extends('homemaster')
@section('content')
            <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh toán</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thanh toán</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <form action="{{route('PlayOrder')}}" method="post">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                        <div class="row">
                            <div  class="col-md-6 form-group">
                                <label>Tên Khách Hàng</label>
                                <input name='ten_kh' class="form-control" type="text" placeholder="John">
                            </div>
                            <div  class="col-md-6 form-group">
                                <label>Địa chỉ</label>
                                <input name='diachi' class="form-control" type="text" placeholder="Doe">
                            </div>
                            <div  class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input name='email' class="form-control" type="text" placeholder="example@email.com">
                            </div>
                            <div  class="col-md-6 form-group">
                                <label>Số điện thoại</label>
                                <input name='sodt' class="form-control" type="text" placeholder="+123 456 789">
                            </div>



                        </div>
                    </div>

                </div>

                        @foreach($cart as $item)
                        <?php
                        $subtotal  = 0;
                        $subtotal += $item['quantity'] * $item['price'];
                        $total = $subtotal + 30000;


                        ?>@endforeach
                <div class="col-lg-4">
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Đơn Hàng</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">Sản phẩm</h5>
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
                            </div>

                    </div>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Hình thức thanh toán</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                    <label class="custom-control-label" for="paypal">Thanh toán khi nhận hàng</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Chuyển khoản</label>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </div>
            @csrf
        </form>
    </div>

    <!-- Checkout End -->
@endsection
