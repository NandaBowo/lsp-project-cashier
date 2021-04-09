<div class="container">
    <div class="row g-5">
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-4">List Produk</h4>

            <div class="row row-cols-2">

                @foreach ($products as $product)
                <div class="col">
                <div class="card mb-3" style="max-width: 400px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if (strlen($product->image_url) > 0)
                            <img src="{{ asset('storage/' . $product->image_url) }}" alt="" style="width: 150px;">
                            @else
                            -
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">Rp {{ number_format($product->price) }}</p>
                                <p class="card-text">Stok : {{ $product->quantity }}</p>
                                <input class="form-control form-control-sm" type="number" placeholder="Jumlah Pembelian" min="0" max="{{ $product->quantity + (isset($tempCart[$product->id]) && $tempCart[$product->id] ? $tempCart[$product->id] : 0) }}" wire:model="tempCart.{{ $product->id }}" wire:change="saveCart({{ $product }})">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                @endforeach

            </div>

        </div>

        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Keranjang</span>
                <span><button wire:click="clearCart" class="btn btn-sm btn-danger">Kosongkan Keranjang</button></span>
            </h4>
            <ul class="list-group mb-3">
                @foreach ($cart as $item)
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">{{ $item->product->name }}</h6>
                        <small class="text-muted">Rp {{ number_format($item->price) }}</small>
                        <small class="text-muted">* {{ $item->quantity }}</small>
                    </div>
                    <span class="text-muted">Rp {{ number_format($item->quantity * $item->price) }}</span>
                </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total Pembelian (Rupiah)</span>
                    <strong>Rp {{ number_format($total) }}</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between text-success">
                    <span>Kembalian</span>
                    <strong>Rp {{ $payment >= $total ? number_format($change) : 'Pembayaran Kurang' }}</strong>
                </li>
            </ul>

            <form wire:submit.prevent="checkout" class="card p-2">
                <div class="input-group">
                    <input wire:model="customerName" type="text" class="form-control" placeholder="Nama Pembeli">
                    @error('customerName') <span class="text-danger">{{ $message }}</span> @enderror
                    <input wire:model="payment" type="text" class="form-control" placeholder="Pembayaran">
                    <button type="submit" class="btn btn-secondary">Checkout</button>
                </div>
            </form>

      </div>
    </div>
</div>