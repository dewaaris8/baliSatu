<!DOCTYPE html>
<html>
<head>
    <title>Booking Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Booking Report</h2>
    <table>
        <thead>
            <tr>
                <th>Tour Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Days</th>
                <th>Order Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($package_bookings as $booking)
                <tr>
                    <td>{{ optional($booking->tour)->name ?? 'tour deleted' }}</td>
                    <td>{{ optional($booking->tour)->name ?? 'tour deleted'}}</td>
                    <td>Rp {{ number_format($booking->total_amount, 0, ',', '.') }}</td>
                    <td>{{ optional($booking->tour)->days ?? 'N/A' }} Days</td>
                    <td>{{ $booking->created_at->format('M d, Y') }}</td>
                    <td>SUCCESS</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
