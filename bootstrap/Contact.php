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
            <form method="POST" action="ContactTraitement.php">
                <div class="container mt-3">
                    <div class="mb-3 mt-3">
                        <label for="Username">Last Name*</label>
                        <input type="text" class="form-control" id="Username" name="Username" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="Email_Adress">Email*</label>
                        <input type="text" class="form-control" id="Email_Adress" name="Email_Adress" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="Message">Message*</label>
                        <textarea class="form-control" rows="5" id="Message" name="Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script>
        function validateForm() {
            var username = document.getElementById('Username').value;
            var email = document.getElementById('Email').value;
            var message = document.getElementById('Message').value;
            // Validation du prénom et du message
            var nameRegex = /^[a-zA-Z\-]+$/;
            if ((nameRegex.test(username) === false)) {
                alert("Le prénom ne doit contenir que des lettres et des tirets (-).");
                return false;
            }
            var messageRegex = /^[a-zA-Z\-.,'!? \p{L}']+$/u;
            if ((messageRegex.test(username) === false)) {
                alert("Le  message ne doit pas contenir des caractères spéciaux comme @,%,{} .");
                return false;
            }

            // Validation de l'email
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Veuillez saisir une adresse e-mail valide.");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>