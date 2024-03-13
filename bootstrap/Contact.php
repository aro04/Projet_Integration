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
        <img class="card-img-top" src="image/background-1747786_1920.jpg" alt="Card image">
        <div class="card-img-overlay">
            <form method="POST" action="traitement.php">
                <div class="container mt-3">
                    <div class="mb-3 mt-3">
                        <label for="Username">Username*</label>
                        <input type="text" class="form-control" id="Username" name="Username" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="Email">Email*</label>
                        <input type="text" class="form-control" id="Email" name="Email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="comment">Message*</label>
                        <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>

</body>

</html>