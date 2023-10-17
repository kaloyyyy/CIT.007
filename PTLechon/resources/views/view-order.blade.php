<!-- resources/views/order-form.blade.php -->
@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<h1>Orders, Products, and Addons</h1>
<form id="filter-form">
    @csrf
    <label for="start_date">Start Date:</label>
    <input type="date" class="filter-input" name="start_date" id="start_date">

    <label for="end_date">End Date:</label>
    <input type="date" class="filter-input" name="end_date" id="end_date">

    <button type="submit">Filter</button>
</form>

<div class="container">
    <table class="text-white bg-white table table-striped table-bordered table-hover" id="table-to-print">
        <thead class="bg-white">
        <tr class="bg-white">
            <th class="bg-white">Delivery Date (YY-MM-DD)</th>
            <th class="bg-white">Product</th>
            <th class="bg-white">Addon Type</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <td class="bg-white">
                <?php
                $dateTime = \Carbon\Carbon::parse($order->deliveryDatetime);
                $formattedDateTime = $dateTime->format('Y-m-d h:i A');
                list($date, $time, $ampm) = explode(' ', $formattedDateTime);
                ?>
                {{ $date }} {{ $time }} {{ $ampm }}
            </td>
            <td class="bg-white">{{ $order->product->description }}</td>
            @if($order->addon !== null)
            <td class="bg-white">{{ $order->addon->type }}</td>
            @else
            <td class="bg-white">
                none
            </td>
            @endif
        </tr>
        @endforeach
        </tbody>
        <button id="print-button">Print Table</button>

    </table>
</div>

<script>
    $(document).ready(function () {
        $('#print-button').click(function () {
            var tableToPrint = $('#table-to-print');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html lang="en"><body>');
            newWin.document.write('<link rel="stylesheet" href="{{ asset('css/custom.css') }}" media="print">');
            newWin.document.write(tableToPrint[0].outerHTML);
            newWin.document.write('</body></html>');
            newWin.document.close();
            newWin.print();
            newWin.close();
        });
    });
    //sample comment
</script>
@endsection

