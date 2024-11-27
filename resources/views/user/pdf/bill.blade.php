<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Bill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .bill-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .bill-header h1 {
            color: #007BFF;
            font-size: 28px;
            font-weight: bold;
        }

        .section-title {
            color: #343A40;
            font-size: 20px;
            margin-top: 30px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        table th,
        table td {
            padding: 10px;
            vertical-align: middle;
        }

        table th {
            width: 30%;
            background-color: #f8f9fa;
            font-weight: bold;
        }

        table td {
            width: 70%;
        }

        .footer {
            text-align: right;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="bill-header">
            <h1>Booking Bill</h1>
            <p><strong>Date:</strong> {{ now()->format('Y-m-d H:i:s') }}</p>
        </div>

        <!-- Hostel Information -->
        <h2 class="section-title">Hostel Information</h2>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    {{-- <th>Living Space</th> --}}
                    <td>Living Space</td>
                </tr>
            </tbody>
        </table>

        <!-- User Information -->
        <h2 class="section-title">User Information</h2>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $booking->user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $booking->user->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $booking->user->phone }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $booking->user->address }}</td>
                </tr>
                <tr>
                    <th>Occupation</th>
                    <td>{{ $booking->user->occupation }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Room Information -->
        <h2 class="section-title">Room Information</h2>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Room Number</th>
                    <td>{{ $booking->room->room_number }}</td>
                </tr>
                <tr>
                    <th>Bed Number</th>
                    <td>{{ $booking->bed->bed_number }}</td>
                </tr>
                <tr>
                    <th>Start Date</th>
                    <td>{{ $booking->start_date }}</td>
                </tr>
                <tr>
                    <th>End Date</th>
                    <td>{{ $booking->end_date }}</td>
                </tr>
                <tr>
                    <th>Total Days</th>
                    <td>{{ $days }}</td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>{{ $booking->price }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Signature:</strong> _______________________</p>
        </div>
    </div>
</body>

</html>
