<!-- resources/views/order-form.blade.php -->
@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<div class="bg-secondary rounded-4  my-4 px-4">
    <form method="POST" action="{{ route('orders.store') }}"
          class="d-flex flex-column py-2 justify-content-center align-items-center">
        @csrf
        <div class="client-div d-flex flex-column bg-opacity-10 p-2 my-2 rounded-2 bg-primary">
            <div class="form-group d-flex row">
                <div class="col-7">
                    <label for="client_name">Client Name:</label>
                    <input type="text" class="form-control" id="client_name" name="client_name" required>
                </div>
                <div class="col-5">
                    <label for="contact_number">Contact Number:</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                </div>

            </div>
            <div class="form-group">
                <label for="client_address">Client Address:</label>
                <input type="text" class="form-control" id="client_address" name="client_address">
            </div>
        </div>

        <div class="form-group border border-2 my-1 w-100">

        </div>

        <div class=" form-group d-flex container justify-content-center align-items-center m-1">
            <div class="col-4 d-flex justify-content-end">
                Product
            </div>
            <div class="col-4 d-flex justify-content-center">
                QTY
            </div>
            <div class="col-4 ">
                Price
            </div>
        </div>
        @foreach($products as $product)
        <div class="form-group d-flex container justify-content-center align-items-center my-1">
            <label class="col-4 d-flex justify-content-end align-items-center" for="{{ $product->description }}">{{
                $product->description }}</label>
            <div class="input-group w-75 justify-content-center align-items-center d-flex m-0">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-danger count-btn" data-type="minus"
                            data-field="{{ $product->productId }}">
                        -
                    </button>
                </div>

                <label class="m-0 p-0 w-25 mx-1">
                    <input type="text" name="{{ $product->productId }}" class="form-control input-number-qty"
                           value="0">
                </label>
                <div class="input-group-btn">
                    <button type="button" class="btn btn-primary count-btn" data-type="plus"
                            data-field="{{ $product->productId }}">
                        +
                    </button>
                </div>
            </div>
            @if($product->description == 'Lechon')
            <div class="col-4 d-flex align-items-center">
                <label class="m-0 p-0 w-50">
                    <input type="text" name="{{$product->description}}_price" class="form-control input-price"
                           value="0">
                </label>
            </div>
            @else
            <div class="col-4" value="{{$product->price}}">
                <label class="m-0 p-0 w-50 d-none">
                    <input type="text" name="{{$product->description}}_price" class="form-control input-price"
                           value="{{$product->price}}">
                </label>
                {{ $product->price }}
            </div>
            @endif
        </div>
        @endforeach

        <script>
            // Add a click event listener to all buttons with the class "count-btn"
            const buttons = document.querySelectorAll('.count-btn');

            buttons.forEach((button) => {
                button.addEventListener('click', function () {
                    const type = this.getAttribute('data-type');
                    const field = this.getAttribute('data-field');
                    const input = document.querySelector(`input[name="${field}"]`);
                    let value = parseInt(input.value);

                    if (type === 'plus') {
                        value += 1;
                    } else if (type === 'minus' && value > 0) {
                        value -= 1;
                    }

                    input.value = value;
                    calculateTotalDue();
                });
            });


            // Calculate the total due function
            function calculateTotalDue() {
                let total = 0;

                // Iterate through each input and calculate the total
                $('.input-number-qty').each(function (index) {
                    const price = parseInt($('.input-price').eq(index).val());
                    const quantity = parseInt($('.input-number-qty').eq(index).val());
                    console.log($('.product-price').eq(index).text());
                    total += (quantity * price);
                    console.log(price);
                    console.log(quantity);
                    console.log(quantity * price);
                });

                // Update the total due element
                $('#total-due').text(total.toFixed(2) + ' PHP');
            }

        </script>


        <div class="form-group border border-2 my-4 w-100">

        </div>

        <div
            class="client-div d-flex w-100 flex-column bg-opacity-10 p-2 my-1 rounded-2 bg-primary align-items-center justify-content-center">
            <div
                class="bg-primary-subtle rounded-1 p-1 text-black border-body-bg border border-1 form-group d-flex w-50">
                <span>Total due: <span id="total-due"> 0.00 PHP</span></span>

            </div>
            <div class="form-group w-50">
                <label for="amount_paid">Amount Paid:</label>
                <input type="number" class="form-control" id="amount_paid" name="amount_paid" required>
            </div>
            <div class="form-group w-50">
                <label for="balance">Balance:</label>
                <input type="number" class="form-control" id="balance" name="balance" required>
            </div>
            <div class="form-group w-50">
                <label for="delivery_fee">Delivery Fee:</label>
                <input type="number" class="form-control" id="delivery_fee" name="delivery_fee" required>
            </div>
        </div>
        <script>
            // Add an event listener to the "Amount Paid" input field
            $('#amount_paid').on('input', function () {
                // Calculate the balance
                calculateBalance();
            });

            // Calculate the balance function
            function calculateBalance() {
                // Get the total due, amount paid, and delivery fee values
                const totalDue = parseFloat($('#total-due').text());
                const amountPaid = parseFloat($('#amount_paid').val());

                // Calculate the balance
                const balance = totalDue - amountPaid;

                // Update the "Balance" input field
                $('#balance').val(balance.toFixed(2));
            }
        </script>


        <div class="form-group ">
            <label for="delivery_datetime">Date and Time of Delivery:</label>
            <input type="datetime-local" class="form-control text-bg-primary bg-body-color" id="delivery_datetime"
                   name="delivery_datetime" required>
        </div>
        <script>
            // Initialize Bootstrap Datetimepicker
            $(function () {
                $('#delivery_datetime').datetimepicker();
            });
        </script>
        <button type="submit" class="btn btn-primary my-1">Submit</button>
    </form>

</div>
<script>
    /* $(document).ready(function () {
         const addonsSelect = $('.addons');
         const priceSelect = $('#price');
         const dinuguan = $('input[name^="dinuguan"]');
         const paklay = $('input[name="paklay_count"]');
         const countButton = $('.count-btn');
         const lechon = $('#div-lechon');
         // Disable the addons field by default
         addonsSelect.prop('disabled', true);
         priceSelect.prop('disabled', true);
         countButton.prop('disabled', true);

         // Disable all input fields by default
         dinuguan.prop('disabled', true);
         paklay.prop('disabled', true);


         // Handle changes in the product select field
         $('#product').change(function () {
             const isEnabled = $(this).val() == '{"productId":8,"price":0,"description":"Lechon"}';
             //console.log($(this).val());
             console.log(isEnabled);
             addonsSelect.prop('disabled', !isEnabled);
             priceSelect.prop('disabled', !isEnabled);
             paklay.prop('disabled', !isEnabled);
             dinuguan.prop('disabled', !isEnabled);
             countButton.prop('disabled', !isEnabled).addClass('btn');
             lechon.removeClass('text-opacity-25 text-body-bg bg-white').addClass('bg-primary')
             if (!isEnabled) {
                 lechon.addClass('text-opacity-25 text-body-bg bg-white').removeClass('bg-primary')
                 addonsSelect.prop('value', 0);
                 priceSelect.prop('value', 0);
                 paklay.prop('value', 0);
                 dinuguan.prop('value', 0);
             }
         });
     });*/

</script>


@endsection
