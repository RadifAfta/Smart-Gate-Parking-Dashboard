<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Your custom styles -->
    <style>
        body {
            padding-top: 20px;
            background-color: #f8f9fa;
        }

        .jumbotron {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            transition: transform 0.2s;
            cursor: pointer;
            height: 150px;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card a.card-link {
            text-decoration: none;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-4">Selamat Datang di Admin Dashboard</h1>
            <p class="lead">Kelola log aktivitas dan daftarkan data kartu dengan mudah.</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <a href="{{ url('/sukses') }}" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Log Aktivitas Masuk</h2>
                            <p class="card-text">Klik untuk menuju ke laman log activity</p>
                            <!-- Add activity logs here -->
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ url('/form') }}" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Form Pendaftaran Kartu</h2>
                            <p class="card-text">Klik untuk menuju ke laman form pendaftaran</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3 text-center">
        <div class="container">
            <p>&copy; 2023 Admin Dashboard. All rights reserved.</p>
            <p>For support, contact <a href="mailto:support@admin.com">support@admin.com</a></p>
        </div>
    </footer>

    <!-- Link to Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Add your custom JavaScript here -->

</body>

</html>
