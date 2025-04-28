<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - Gestion des requêtes étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            overflow: hidden;
            position: relative;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            z-index: 0;
        }

        .welcome-card {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.1);
            padding: 50px;
            border-radius: 20px;
            text-align: center;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
            margin: auto;
            top: 50%;
            transform: translateY(-50%);
            max-width: 600px;
        }

        .welcome-card h1 {
            font-size: 2.8rem;
            margin-bottom: 20px;
        }

        .welcome-card p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .btn-login {
            background-color: #fff;
            color: #4e73df;
            font-weight: bold;
            border-radius: 30px;
            padding: 10px 30px;
            transition: 0.3s;
        }

        .btn-login:hover {
            background-color: #1cc88a;
            color: #fff;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px);}
            to { opacity: 1; transform: translateY(0);}
        }
    </style>
</head>

<body>

    <!-- Particles Background -->
    <div id="particles-js"></div>

    <div class="welcome-card">
        <h1>Mise en place d'une application<br> de gestion de requêtes d'étudiants</h1>
        <p>Bienvenue sur la plateforme de gestion des demandes au sein de votre institution universitaire.<br> 
        Pour soumettre une requête, merci de vous connecter.</p>
        <a href="{{ route('login') }}" class="btn btn-login">Se connecter</a>
    </div>

    <!-- Particles.js script -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js', {
            particles: {
                number: { value: 100, density: { enable: true, value_area: 800 }},
                color: { value: "#ffffff" },
                shape: { type: "circle" },
                opacity: { value: 0.5, random: true },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: "#ffffff", opacity: 0.4, width: 1 },
                move: { enable: true, speed: 2 }
            },
            interactivity: {
                events: {
                    onhover: { enable: true, mode: "repulse" },
                    onclick: { enable: true, mode: "push" }
                },
                modes: {
                    repulse: { distance: 100 },
                    push: { particles_nb: 4 }
                }
            }
        });
    </script>

</body>
</html>
