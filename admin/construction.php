<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Auberge Des Saveurs</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="shortcut icon" href="img/ico-32.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:#333;
            margin: 0;
        }
        .container {
            text-align: center;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            font-size: 2em;
            margin-bottom: 10px;
        }
        p {
            color: #555;
            font-size: 1.1em;
            margin-bottom: 20px;
        }
        .loader {
            border: 12px solid #f3f3f3;
            border-top: 12px solid #3498db;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            animation: spin 1.5s linear infinite;
            margin: 20px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        footer {
            margin-top: 20px;
            color: #aaa;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Page en Construction</h1>
        <p>Nous travaillons actuellement sur cette page. Merci de revenir plus tard.</p>
        <div class="loader"></div>
        <footer>&copy; 2024 L'Auberge des Saveurs. Tous droits réservés.</footer>
    </div>
</body>
</html>
