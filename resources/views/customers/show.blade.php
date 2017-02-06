@extends('app')
@section('content')
    <h1>Customer </h1>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Name</td>
                <td><?php echo ($customer['name']); ?></td>
            </tr>
            <tr>
                <td>Cust Number</td>
                <td><?php echo ($customer['cust_number']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo ($customer['address']); ?></td>
            </tr>
            <tr>
                <td>City </td>
                <td><?php echo ($customer['city']); ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo ($customer['state']); ?></td>
            </tr>
            <tr>
                <td>Zip </td>
                <td><?php echo ($customer['zip']); ?></td>
            </tr>
            <tr>
                <td>Home Phone</td>
                <td><?php echo ($customer['home_phone']); ?></td>
            </tr>
            <tr>
                <td>Cell Phone</td>
                <td><?php echo ($customer['cell_phone']); ?></td>
            </tr>


            </tbody>
      </table>
    </div>


<?php
 $stock_price=null;
 $stock_total = 0;
 $stock_value=0;
 $inv_total = 0;
 $inv_value=0;
 $inv_portfolio = 0;
 $cus_portfolio = 0;
 ?>
 <br>
 <h2>Stocks </h2>
 <div class="container">
 <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="bg-info">
                <th>Symbol </th>
                <th>Stock Name</th>
                <th>No. of Shares</th>
                <th>Purchase Price</th>
                <th>Purchase Date</th>
                <th>Original Value</th>

            </tr>
        </thead>

 <tbody>
 @foreach($customer->stocks as $stock)

    <tr>
        <td>{{ $stock->symbol }}</td>
        <td>{{ $stock->name }}</td>
        <td>{{ $stock->shares }}</td>
        <td>{{ $stock->purchase_price }}</td>
        <td>{{ $stock->purchased }}</td>
        <td>{{ $stock->shares * $stock->purchase_price }}</td>
        <?php $stock_total = $stock_total + ($stock->shares * $stock->purchase_price)?>
    </tr>

@endforeach

    <h4>
        <?php echo 'Total of Initial Stock Portfolio $', number_format($stock_total,2);?>
    <br>
        <?php echo 'Total Current Stock Portfolio $',number_format($stock_value,2)?>
    </h4>
 </tbody>

 </table>
    </div>
    <br>
    <h3>Invesmtents </h3>
    <div class="container">
    <table class="table table-striped table-bordered table-hover">
    
<thead>
        <tr class="bg-info">
            <th>Category </th>
            <th>Description</th>
            <th>Acquired value</th>
            <th>Acquired Date</th>
            <th>Recent value</th>
            <th>Recent Date</th>
        </tr>
</thead>    

<tbody>

 @foreach($customer->investments as $investment)
    <tr>
        <td>{{ $investment->category }}</td>
        <td>{{ $investment->description }}</td>
        <td>{{ $investment->acquired_value }}</td>
        <td>{{ $investment->acquired_date }}</td>
        <td>{{ $investment->recent_value }}</td>
        <td>{{ $investment->recent_date }}</td>
        <?php $inv_total= $inv_total + $investment->acquired_value; $inv_value = $inv_value + $investment->recent_value?>
    </tr>

 @endforeach

    <h4>
        <?php echo 'Total of Initial Investment Portfolio $', number_format($inv_total,2);?>
    <br>
        <?php echo 'Total Current Investment Portfolio $',number_format($inv_value,2)?>
    </h4>
 </tbody>
</table>
</div>

@stop
