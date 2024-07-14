<div class="row">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="col-md-6 mb-5 mb-md-0">
        <h2 class="h3 mb-3 text-black">Billing Details</h2>
        <div class="p-3 p-lg-5 border">
            <div class="form-group mt-2 row">
                <div class="col-md-6">
                    <label for="fname" class="text-black">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="fname" wire:model="fname">
                    @error('fname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="lname" wire:model="lname">
                    @error('lname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="form-group mt-2 row">
                <div class="col-md-12">
                    <label for="address" class="text-black">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="address" wire:model="address"
                        placeholder="Street address">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="form-group mt-2 row">
                <div class="col-md-6">
                    <label for="state_country" class="text-black">State / Country <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="state_country" wire:model="state_country">
                    @error('state_country')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="postal_zip" class="text-black">Postal / Zip <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="postal_zip" wire:model="postal_zip">
                    @error('postal_zip')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group mt-2 row mb-5">
                <div class="col-md-6">
                    <label for="email_address" class="text-black">Email Address <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="email_address" wire:model="email_address">
                    @error('email_address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="phone" wire:model="phone"
                        placeholder="Phone Number">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group mt-2">
                <label for="order_notes" class="text-black">Order Notes</label>
                <textarea wire:model="order_notes" id="order_notes" cols="30" rows="5" class="form-control"
                    placeholder="Write your notes here..."></textarea>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                    <table class="table site-block-order-table mb-5">
                        <thead>
                            <th>Product</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr>
                                    <td>{{ $item['name'] }} <strong class="mx-2">x</strong>
                                        {{ $item['quantity'] }}</td>
                                    <td>${{ $item['price'] * $item['quantity'] }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                <td class="text-black">
                                    ${{ array_sum(array_map(function ($item) {return $item['price'] * $item['quantity'];}, $cart)) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                <td class="text-black font-weight-bold">
                                    <strong>${{ array_sum(array_map(function ($item) {return $item['price'] * $item['quantity'];}, $cart)) }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="form-group mt-2">
                        <button wire:click="placeOrder" class="btn btn-primary btn-lg py-3 btn-block">Place Order</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
