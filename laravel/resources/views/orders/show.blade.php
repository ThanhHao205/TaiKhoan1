<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">🧾 Đơn hàng #{{ $order->order_number }}</h4>
            <span class="badge bg-warning text-dark text-capitalize">{{ $order->status }}</span>
        </div>

        <div class="card-body">
            <p class="fs-5 mb-3">
                💰 <strong>Tổng tiền:</strong> 
                <span class="text-danger fw-bold">{{ number_format($order->total) }}đ</span>
            </p>

            <hr>

            <h5 class="mb-3">📝 Ghi chú đơn hàng:</h5>
            @forelse($order->orderNotes as $note)
                <div class="alert alert-secondary">{{ $note->note }}</div>
            @empty
                <p class="text-muted fst-italic">Không có ghi chú nào.</p>
            @endforelse

            <hr>

            <h5 class="mt-4">📦 Sản phẩm đã đặt:</h5>
            <div class="table-responsive">
                <table class="table table-striped table-hover mt-3">
                    <thead class="table-light">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($order->products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ number_format($product->price) }}đ</td>
                                <td>{{ number_format($product->price * $product->pivot->quantity) }}đ</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Chưa có sản phẩm nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="text-end mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">← Quay lại</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
