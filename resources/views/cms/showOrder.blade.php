@extends('cms.master')
@section('content')

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Order ID: #{{$order['0']->id}}</h1>
</div>


<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12 text-center ">
            @if($order)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total Price</th>   
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $data)
                    @foreach(unserialize($data->order_data) as $item)
                    <tr>
                        <th scope="col">{{$item['id']}}</th>
                        <th scope="col">{{$item['name']}}</th>
                        <th scope="col">{{$item['quantity']}}</th>
                        <th scope="col">{{$item['price']}}</th>                        
                        <th scope="col">{{$item['price']*$item['quantity']}}</th>                        
                    </tr> 
                    <?php $totalPrice += $item['price'] * $item['quantity'] ?>
                    <?php $totalQuantity += $item['quantity'] ?>
                    @endforeach
                    @endforeach
                    <tr>
                        <td></td>
                        <td>Total</td>                        
                        <td><?= $totalQuantity ?></td>
                        <td></td>
                        <td><?= $totalPrice ?></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="row mt-4">
            <a href="{{url('cms/user/'.$order['0']->uid.'/orders')}}" class="btn btn-primary">Back to user's orders</a>
            <a href="{{url('cms/order')}}" class="btn btn-primary ml-3">Back to all orders</a>
        </div>
    </div>


    @endif

    @endsection
</div>



