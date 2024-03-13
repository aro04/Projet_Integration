<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
</head>

<body>
    <div class="card">
        <img class="card-img-top" src="image/desert-7951761_1920.jpg" alt="Card image">
        <div class="card-img-overlay">
            <form method="POST" action="traitement.php">
                <div class="container mt-3">
                    <div class="mb-3 mt-3">
                        <label for="Last_name">Last Name*</label>
                        <input type="text" class="form-control" id="Last_name" name="Last_name" placeholder="Last Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="First_name">First Name*</label>
                        <input type="text" class="form-control" id="First_name" name="First_name" placeholder="First Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="Email">Email*</label>
                        <input type="text" class="form-control" id="Email" name="Email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="Password">Password*</label>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>

</body>

</html>