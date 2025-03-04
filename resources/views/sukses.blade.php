<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Activity Menu</title>

    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Your custom styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #007bff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 80px;
        }

        .navbar-brand {
            color: #fff;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .navbar-nav .nav-item {
            margin-right: 10px;
        }

        .log-entry-card {
            border: 1px solid #ddd;
            border-radius: 12px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .log-entry-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .log-entry-card .card-body {
            padding: 20px;
        }

        .log-entry-card h2 {
            color: #343a40;
            margin-bottom: 10px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .log-entry-card p {
            color: #6c757d;
            margin: 0;
            font-size: 16px;
        }

        .no-data {
            color: #6c757d;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Log Activity</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/home') }}">Back to Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Log Activity Menu</h1>

        @forelse ($logEntries as $index => $logEntry)
            <div class="log-entry-card">
                <div class="card-body">
                    <h2 class="mb-4">Log Entries {{ $index + 1 }}</h2>
                    <p><strong>Waktu Masuk :</strong> {{ $logEntry['timestamp'] }}</p>

                    <!-- Cari data sesuai dengan ID logEntry -->
                    @php
                        $matchingData = collect($data)->firstWhere('id', $logEntry['id']);
                    @endphp

                    @if ($matchingData)
                        <p><strong>Nama:</strong> {{ $matchingData['nama'] }}</p>
                        <p><strong>Status:</strong> {{ $matchingData['status'] }}</p>
                    @else
                        <p class="no-data">Tidak ada data untuk LogEntry {{ $index + 1 }}</p>
                    @endif
                </div>
            </div>
        @empty
            <p class="no-data">Tidak ada entri log yang tersedia.</p>
        @endforelse
    </div>

    <!-- Link to Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Add your custom JavaScript here -->
</body>

</html>
