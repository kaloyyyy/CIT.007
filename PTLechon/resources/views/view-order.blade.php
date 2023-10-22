<!-- resources/views/order-form.blade.php -->
@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<h1>Orders, Products, and Addons</h1>
<div class="container w-auto my-1">
    <form id="filterForm" class="">
        <label for="filter-date" class="">Select Date:</label>
        <div class="form-group d-flex ">
            <input type="date" class="form-control bg-light text-black w-auto " id="filter-date" name="filter-date">
            <button type="button" id="filter-button" class="btn btn-primary mx-1 ">Filter</button>
        </div>
    </form>
    <button id="print-button" class="btn btn-primary my-3">Print Table</button>

</div>


<style>
    @media print {
        /* Define the print-specific CSS */
        .table-print td {
            padding: 10px; /* Adjust the padding value as needed */
        }
    }
</style>
<div class="container" id="table-to-print">
    <h3 id="date-indicator">Date selected: All</h3>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr style="margin: 0">
            <th style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="text-white px-1">Client Name
            </th>
            <th style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="text-white px-4">Delivery Date
            </th>
            <th style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="text-white px-4">Quantity
            </th>
            <th style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="text-white px-4">Product
            </th>
            <th style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="text-white px-4">Price
            </th>
        </tr>
        </thead>
        <tbody id="table-body">
        @php $rowColor = 'bg-primary-subtle text-black';
        $default = $rowColor;
        @endphp
        @foreach($orders as $order)
        @foreach($order->items as $item)
        <tr class="">
            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="{{$rowColor}} px-4">{{ $order->client->name }}
            </td>
            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="{{$rowColor}} px-4">{{ $order->deliveryDatetime->format('h:i A') }}
            </td>
            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="{{$rowColor}} px-4">{{ $item->quantity }}
            </td>
            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="{{$rowColor}} px-4">{{ $item->product->description }}
            </td>
            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="{{$rowColor}} px-4">{{ $item->product->price }}
            </td>
        </tr>
        @endforeach
        @php $rowColor = $rowColor === $default ? 'bg-secondary text-white' : $default; @endphp
        @endforeach

        </tbody>
    </table>
</div>
<script>
    // Filter button click event
    $("#filter-button").on("click", function () {
        const selectedDate = $("#filter-date").val();
        var dateSelectLabel = $("#date-indicator");
        console.log(dateSelectLabel.text());
        var date = new Date(selectedDate);

        var options = { year: 'numeric', month: 'long', day: 'numeric' };
        var formattedDate = date.toLocaleDateString('en-US', options);
        dateSelectLabel.text(`Date selected: ${formattedDate}`);
        filterTable(selectedDate);
    });

    function filterTable(selectedDate) {
        $.ajax({
            url: "/filter-orders",
            type: "GET",
            data: {date: selectedDate}, // Send the date as a query parameter
            success: function (data) {
                const tableBody = $("#table-body");
                console.log(typeof tableBody)
                tableBody.empty(); // Clear the existing rows
                console.log(data);
                var resultLength = Object.keys(data).length;
                console.log(resultLength);
                for (var i = 0; i < resultLength; i++) {
                    var order = data[i]
                    var items = order['items'];
                    var itemsLength = items.length;
                    console.log(items);
                    for (let j = 0; j < itemsLength; j++) {
                        var item = items[j];
                        const rowColor = i % 2 !== 0 ? "bg-secondary text-white" : "bg-primary-subtle text-black";
                        var deliveryDatetime = new Date(order.deliveryDatetime);
                        var formattedDatetime = deliveryDatetime.toLocaleTimeString('en-US', {
                            hour: 'numeric',
                            minute: '2-digit',
                            hour12: true
                        });
                        const row = `
            <tr class="">
                <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px" class="${rowColor} px-4">${order.clientId}</td>
                <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px" class="${rowColor} px-4">${formattedDatetime}</td>
                <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px" class="${rowColor} px-4">${item.quantity}</td>
                <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px" class="${rowColor} px-4">${item.product.description}</td>
                <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px" class="${rowColor} px-4">${item.product.price}</td>
            </tr>
        `;
                        tableBody.append(row);
                    }

                }
            }
        });
    }


</script>


<script>
    $(document).ready(function () {
        $('#print-button').click(function () {

            var tableToPrint = $('#table-to-print');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html lang="en"><body>');
            newWin.document.write('<link rel="stylesheet" href="{{ asset("css/custom.css") }}" media="print">'
            )
            ;
            newWin.document.write(tableToPrint[0].outerHTML);
            newWin.document.write('</body></html>');
            newWin.document.close();
            newWin.print();
            newWin.close();
        });
    });
</script>

@endsection

