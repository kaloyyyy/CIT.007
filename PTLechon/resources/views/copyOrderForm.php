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
        <div class="form-group d-flex align-items-center justify-content-evenly  p-2">
            <label for="product">Selection: </label>
            <select class="form-control " id="product" name="product" required>
                <option value="0">Select an option</option>
                @foreach($products as $product)
                <option id="lechon-select" value="{{ $product }}">{{ $product->description }}</option>
                @endforeach
            </select>
        </div>

        <div id="div-lechon"
             class="form-group w-100 row p-2 my-1 d-flex flex-column flex-grow-1 bg-opacity-10 text-opacity-25 text-body-bg rounded-2 bg-white justify-content-center align-items-center">
            <div class="col-6">
                <label for="addons">Price - Lechon</label>
                <label for="price"></label><input type="text" class="form-control" id="price" name="price">
            </div>

            <div class="col-6 d-flex justify-content-center">
                <div class="d-flex flex-column">
                    <div class="form-group">
                        <label for="dinuguan_with_meat_count">Dinuguan with Meat:</label>
                        <div class="input-group d-flex justify-content-center m-0">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-danger count-btn" data-type="minus"
                                        data-field="dinuguan_with_meat_count">
                                    -
                                </button>
                            </div>

                            <label class="m-0 p-0 w-25 mx-1">
                                <input type="text" name="dinuguan_with_meat_count" class="form-control input-number"
                                       value="0"
                                >
                            </label>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary count-btn" data-type="plus"
                                        data-field="dinuguan_with_meat_count">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dinuguan_only_count">Dinuguan only:</label>
                        <div class="input-group d-flex justify-content-center m-0">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-danger count-btn" data-type="minus"
                                        data-field="dinuguan_only_count">
                                    -
                                </button>
                            </div>
                            <label class=" w-25 mx-1 ">
                                <input type="text" name="dinuguan_only_count" class="form-control input-number"
                                       value="0"
                                >
                            </label>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary count-btn" data-type="plus"
                                        data-field="dinuguan_only_count">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="paklay_count">Paklay:</label>
                        <div class="input-group d-flex justify-content-center m-0">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-danger count-btn" data-type="minus"
                                        data-field="paklay_count">
                                    -
                                </button>
                            </div>
                            <label class=" w-25 mx-1">
                                <input type="text" name="paklay_count" class="form-control input-number" value="0">
                            </label>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary count-btn" data-type="plus"
                                        data-field="paklay_count">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <script>
                    $(document).ready(function () {


                        $('.count-btn').click(function (e) {
                            e.preventDefault();

                            var fieldName = $(this).data('field');
                            var type = $(this).data('type');
                            var input = $('input[name="' + fieldName + '"]');
                            var currentVal = parseInt(input.val());

                            if (!isNaN(currentVal)) {
                                if (type === 'minus') {
                                    if (currentVal > 0) {
                                        input.val(currentVal - 1);
                                    }
                                } else if (type === 'plus') {
                                    input.val(currentVal + 1);
                                }
                            } else {
                                input.val(0);
                            }
                        });
                    });
                </script>
            </div>

        </div>


        <div class="form-group border border-2 my-4 w-100">

        </div>

        <div
            class="client-div d-flex w-100 flex-column bg-opacity-10 p-2 my-1 rounded-2 bg-primary align-items-center justify-content-center">
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
    $(document).ready(function () {
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
    });

</script>


@endsection
