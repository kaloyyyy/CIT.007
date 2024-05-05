<!-- resources/views/order-form.blade.php -->
@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')

<div class="container w-auto my-1">
    <form id="filterForm" class="">
        <label for="filter-date" class="">Select Date:</label>
        <div class="form-group d-flex ">
            <input type="date" class="form-control bg-light text-black w-auto " id="filter-date" name="filter-date">
            <button type="button" id="filter-button" class="btn btn-primary mx-1 ">Filter</button>
        </div>
    </form>
    <button id="print-button" class="btn btn-primary my-3">Print Table</button>
    <button id="exportButton" class="btn btn-primary my-3">Export to Excel</button>
</div>


<style>
    @media print {
        /* Define the print-specific CSS */
        .table-print td {
            padding: 0px;
            margin: 0; /* Adjust the padding value as needed */
        }
    }
</style>

<!-- resources/views/orders/delete-confirmation-modal.blade.php -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this order?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- Add these script tags to include the SheetJS library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>




<div class="container" id="table-to-print">
    <h3 id="date-indicator">Date selected: All</h3>
    <table style="border-spacing: 0" class="table table-striped table-bordered table-hover">
        <thead style="margin:0; padding: 0">
        <tr style="margin: 0; padding: 0">
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
            <th style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="text-white px-4">Paid
            </th>
            <th style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="text-white px-4">Delivery Fee
            </th>
            <th style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="text-white px-4 options-col">Option
            </th>
        </tr>
        </thead>
        <tbody id="table-body">
        @php $rowColor = 'bg-primary-subtle text-black justify-content-center align-items-center';
        $default = $rowColor;
        @endphp
        @foreach($orders as $order)
        @foreach($order->items as $item)<!-- Modal for displaying client details -->
        <div class="modal fade options-col" id="clientDetailsModal{{$order->client->clientId}}" tabindex="-1" role="dialog" aria-labelledby="clientDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="clientDetailsModalLabel">Client Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Display fetched client details here -->
                        Address: {{ $order->client->address }} <br>
                        Contact: {{ $order->client->contact }}
                        <div id="client-details-content"></div>
                    </div>
                </div>
            </div>
        </div>

        <tr class="" style="padding: 0">
            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:auto; padding: 4px" class="client-name {{ $rowColor}}" data-client-id="{{ $order->client->id }}">
                <a href="#" class="client-details-link " data-toggle="modal" data-target="#clientDetailsModal{{$order->client->clientId}}">
                    {{ $order->client->name }}
                </a>
            </td>

            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="{{$rowColor}} px-2 ">
                <span class="options-col">{{ $order->deliveryDatetime->format('M d') }}&nbsp</span>
                <span> {{ $order->deliveryDatetime->format('h:i A')}}</span>
            </td>
            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="{{$rowColor}} px-4">{{ $item->quantity }}
            </td>
            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="{{$rowColor}} px-4">{{ $item->product->description }}
            </td>
            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="{{$rowColor}} px-4">
                @if( $item->product->description == "Lechon")
                    {{$order->lechonPrice}}
                @else
                    {{ $item->product->price }}
                @endif
            </td>
            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="{{$rowColor}} px-4">{{ $order->amountPaid }} PHP
            </td>
            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="{{$rowColor}} px-4">{{ $order->deliveryFee }} PHP
            </td>
            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px"
                class="{{$rowColor}} px-4 options-col">

                <!-- Edit Button -->
                <div class="btn-group">
                    <button class="btn btn-info edit-button" data-toggle="modal" data-target="#editModal">
                        <i class="fas fa-pencil-alt"></i> <!-- Edit icon -->
                    </button>
                </div>

                <!-- Secondary Buttons -->
                <div class="btn-group">
                    <button class="btn btn-primary secondary-button d-none">
                        <i class="fas fa-check"></i> <!-- Check icon -->
                    </button>
                    <button class="btn btn-secondary secondary-button d-none">
                        <i class="fas fa-times"></i> <!-- Cancel icon -->
                    </button>
                    <button class="btn btn-danger secondary-button d-none" data-item-id="{{ $item->itemId }}" data-toggle="modal"
                            data-target="#deleteConfirmationModal">
                        <i class="fas fa-trash"></i> <!-- Trash icon -->
                    </button>
                </div>
            </td>


        </tr>
        @endforeach
        @php $rowColor = $rowColor === $default ? 'bg-secondary text-white justify-content-center align-items-center' : $default; @endphp
        @endforeach
        <script>


            $(document).ready(function() {
                $('.edit-button').click(function() {
                    var btnGroup = $(this).closest('.options-col');
                    btnGroup.find('.edit-button').addClass('d-none');
                    btnGroup.find('.btn-primary, .btn-secondary, .btn-danger').removeClass('d-none');
                });

                $('.btn-primary').click(function() {
                    var btnGroup = $(this).closest('.options-col');
                    btnGroup.find('.edit-button').removeClass('d-none');
                    btnGroup.find('.btn-primary, .btn-secondary, .btn-danger').addClass('d-none');
                });
            });


            // When "Delete" is clicked, show the confirmation dialog
            $('#deleteConfirmationModal').on('show.bs.modal', function (e) {
                var deleteButton = $(e.relatedTarget);
                var itemId = deleteButton.data('item-id'); // Assuming you have a data attribute for item ID

                // When the delete button in the modal is clicked, perform the actual deletion
                $('#confirmDelete').on('click', function () {
                    $.ajax({
                        type: 'get',
                        url: '/items/',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            itemId: itemId
                        },
                        success: function (data) {
                            // Update the UI as needed
                            // Reload the page or update the table
                            console.log(data);
                            $('#deleteConfirmationModal').modal('hide');
                            $('.modal .close').click();
                            // Remove the corresponding row from the table
                            deleteButton.closest('tr').remove();
                        },
                        error: function (data) {
                            // Handle errors if needed
                        }
                    });
                });
            });
        </script>

        </tbody>
    </table>
</div>
<script>
    document.getElementById('exportButton').addEventListener('click', function () {
        exportToExcel();
    });

    function exportToExcel() {
        /* Get table element */
        var table = document.getElementById('table-to-print');

        /* Convert table to worksheet */
        var ws = XLSX.utils.table_to_sheet(table);

        /* Create workbook and add the worksheet */
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

        /* Save to file */
        var fileName = 'exported_data.xlsx';
        XLSX.writeFile(wb, fileName);
    }
</script>
<script>
    // Filter button click event
    $("#filter-button").on("click", function () {
        const selectedDate = $("#filter-date").val();
        var dateSelectLabel = $("#date-indicator");

        var date = new Date(selectedDate);

        var options = {year: 'numeric', month: 'long', day: 'numeric'};
        var formattedDate = date.toLocaleDateString('en-US', options);
        dateSelectLabel.text(`Date selected: ${formattedDate}`);
        filterTable(selectedDate);
    });

    function updateTable (data) {
        console.log("ret: "+data);
        const tableBody = $("#table-body");
        tableBody.empty(); // Clear the existing rows
        var resultLength = Object.keys(data).length;
        for (var i = 0; i < resultLength; i++) {
            var order = data[i]
            var items = order['items'];
            var itemsLength = items.length;
            for (let j = 0; j < itemsLength; j++) {
                var item = items[j];
                const rowColor = i % 2 !== 0 ? "bg-secondary text-white" : "bg-primary-subtle text-black";
                var deliveryDatetime = new Date(order.deliveryDatetime);
                var formattedDatetime = deliveryDatetime.toLocaleTimeString('en-US', {
                    month: 'short',
                    day: '2-digit',
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                }).replace(',', '');
                const row = `
                        <tr class="">
                            <div class="modal fade options-col" id="clientDetailsModal" tabindex="-1" role="dialog" aria-labelledby="clientDetailsModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="clientDetailsModal${order.client.clientId}">Client Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Display fetched client details here -->
                                            Address: {{ $order->client->address }} <br>
                                            Contact: {{ $order->client->contact }}
                                            <div id="client-details-content"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px" class="client-name ${rowColor}" data-client-id="{{ $order->client->id }}">
                                <a href="#" class="client-details-link" data-toggle="modal" data-target="#clientDetailsModal${order.client.clientId}">
                                    ${order.client.name}
                                </a>
                            </td>
                            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px" class="${rowColor} px-4">${formattedDatetime}</td>
                            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px" class="${rowColor} px-4">${item.quantity}</td>
                            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px" class="${rowColor} px-4">${item.product.description}</td>
                            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px" class="${rowColor} px-4">${item.product.price}</td>
                            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px" class="${rowColor} px-4">${order.amountPaid}</td>
                            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px" class="${rowColor} px-4">${order.deliveryFee}</td>
                            <td style="text-align: center; border: 1px rgb(128,128,128) solid; margin:0; padding: 4px" class="${rowColor} px-4 options-col">

                                <div class="btn-group">
                                    <button class="btn btn-info edit-button" data-toggle="modal" data-target="#editModal">
                                        <i class="fas fa-pencil-alt"></i> <!-- Edit icon -->
                                    </button>
                                </div>

                                <!-- Secondary Buttons -->
                                <div class="btn-group">
                                    <button class="btn btn-primary secondary-button d-none">
                                        <i class="fas fa-check"></i> <!-- Check icon -->
                                    </button>
                                    <button class="btn btn-secondary secondary-button d-none">
                                        <i class="fas fa-times"></i> <!-- Cancel icon -->
                                    </button>
                                    <button class="btn btn-danger secondary-button d-none" data-item-id="${item.itemId}" data-toggle="modal"
                                            data-target="#deleteConfirmationModal">
                                        <i class="fas fa-trash"></i> <!-- Trash icon -->
                                    </button>
                                </div>
                            </td>

                        </tr>`;
                tableBody.append(row);

            }
            $(document).ready(function() {
                $('.edit-button').click(function() {
                    var btnGroup = $(this).closest('.options-col');
                    btnGroup.find('.edit-button').addClass('d-none');
                    btnGroup.find('.btn-primary, .btn-secondary, .btn-danger').removeClass('d-none');
                });

                $('.btn-primary').click(function() {
                    var btnGroup = $(this).closest('.options-col');
                    btnGroup.find('.edit-button').removeClass('d-none');
                    btnGroup.find('.btn-primary, .btn-secondary, .btn-danger').addClass('d-none');
                });
            });
        }

    }
    function filterTable(selectedDate) {
        $.ajax({
            url: "/filter-orders",
            type: "GET",
            data: {date: selectedDate}, // Send the date as a query parameter
            success: function (data) {
                updateTable(data)
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

            // Function to generate and print content
            function generateAndPrintContent() {
                var clonedTable = tableToPrint.clone(); // Clone the original table
                clonedTable.find('.options-col').remove(); // Remove elements with the class 'options-col'
                newWin.document.write(clonedTable[0].outerHTML);
                newWin.document.write('</body></html>');

                // Print the content
                newWin.print();

                // Print the content again
                newWin.document.close(); // Close the existing document
                newWin.document.open(); // Open a new document
                newWin.document.write('<html lang="en"><body>');
                newWin.document.write(clonedTable[0].outerHTML);
                newWin.document.write('</body></html>');
                newWin.print();
                newWin.close();
            }


            // Wait for a short delay to ensure content is loaded, then generate and print it twice
            window.setTimeout(generateAndPrintContent, 100);
        });
    });
</script>


@endsection

