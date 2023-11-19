<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta Cultural</title>
    <style>
        p {
            text-align: center;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #FFB535;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            color: #f5f5f5;
            margin: 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: #f5f5f5;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #BB7804;
        }

        main {
            padding: 20px;
        }

        main h2 {
            margin-bottom: 20px;
        }

        .cta-buttons {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }

        .cta-buttons a {
            color: #fff;
            text-decoration: none;
            padding: 15px 25px;
            border-radius: 25px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .cta-buttons a.calendario {
            background-color: #3498db; /* Cor do botão de calendário */
        }

        .cta-buttons a.perfil {
            background-color: #e74c3c; /* Cor do botão de perfil */
        }

        .cta-buttons a:hover {
            background-color: #485460;
        }

        footer {
            background-color: #FFB535;
            color: #f5f5f5;
            padding: 20px;
            text-align: center;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            z-index: 1;
        }

        .image-container {
            text-align: center;
        }

        .image-container img {
            width: 100%;
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            /* Optional: Add border-radius for rounded corners */
            margin-top: 20px;
            /* Adjust the margin as needed */
        }

        .main-button {
            display: block;
            margin: 20px auto;
            padding: 15px 25px;
            background-color: #E40060; /* Cor do botão de inscrições */
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .main-button:hover {
            background-color: #AF024B; /* Cor no hover similar ao botão de inscrições */
        }

        button.close-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #FFA813;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        button.close-button:hover {
            background-color: #BB7804;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .login-popup,
        .registration-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            z-index: 2;
        }

        .close-popup-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            background: none;
            border: none;
            cursor: pointer;
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <h1>Cesta Cultural</h1>
        <nav>
            
            <ul>
                <li><a href="#" onclick="showPopup()">Sobre</a></li>
                <li><a href="paginadeimagens.php">Mural</a></li>
                <li><a href="calendario/index.php">Calendário</a></li>
                <li><a href="perfil.php">Perfil</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <p>Descubra novos horizontes e experiências, participe de um evento da Cesta Cultural!</p>
        <div class="image-container">
            <img src="img1.jpeg" alt="Horizontal Image">
        </div>
        <a href="inscricoes.html" class="main-button">Participe Agora</a>
        <a href="paginadeimagens.php" class="main-button">Ver Todas as Imagens</a>
    </main>
    <footer>
    <footer>
        <p>&copy; 2022 - Cesta Cultural. Todos os direitos reservados.</p>
    </footer>
</body>

</html>

