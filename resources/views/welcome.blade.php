
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestor de Proyectos</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
        }

        header {
            background-color: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 20px 0;
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #1e293b;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .button {
            display: inline-block;
            padding: 12px 22px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }

        .button-primary {
            background-color: #2563eb;
            color: white;
        }

        .button-secondary {
            background-color: #e2e8f0;
            color: #334155;
        }

        .hero {
            text-align: center;
            padding: 100px 20px;
        }

        .hero h1 {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .hero p {
            max-width: 650px;
            margin: 0 auto 30px;
            font-size: 17px;
            line-height: 1.7;
            color: #64748b;
        }

        .features {
            padding: 45px 0 90px;
        }

        .features h2 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 35px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background-color: white;
            padding: 30px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
        }

        .card h3 {
            font-size: 19px;
            margin-bottom: 12px;
        }

        .card p {
            font-size: 14px;
            line-height: 1.7;
            color: #64748b;
        }

        footer {
            background-color: white;
            border-top: 1px solid #e2e8f0;
            padding: 24px;
            text-align: center;
            font-size: 13px;
            color: #64748b;
        }

        @media (max-width: 768px) {
            .hero {
                padding: 70px 15px;
            }

            .hero h1 {
                font-size: 30px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .navigation {
                flex-wrap: wrap;
            }

            .nav-links {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="container navigation">
            <div class="logo">
                Gestor de Proyectos
            </div>

            <nav class="nav-links">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="button button-primary">
                        Panel de control
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="button button-secondary">
                        Iniciar sesión
                    </a>

                    <a href="{{ route('register') }}"
                       class="button button-primary">
                        Registrarse
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">

                <h1>Organiza tus proyectos fácilmente</h1>

                <p>
                    Una plataforma para crear y gestionar proyectos,
                    trabajar con otros usuarios y llevar un seguimiento
                    de las tareas y horas de participación.
                </p>

                @auth
                    <a href="{{ route('projects.index') }}"
                       class="button button-primary">
                        Ver mis proyectos
                    </a>
                @else
                    <a href="{{ route('register') }}"
                       class="button button-primary">
                        Empezar ahora
                    </a>
                @endauth

            </div>
        </section>

        <section class="features">
            <div class="container">

                <h2>¿Qué puedes hacer?</h2>

                <div class="cards">

                    <div class="card">
                        <h3>Gestionar proyectos</h3>

                        <p>
                            Crea proyectos, edita su información
                            y consulta sus fechas límite y estados.
                        </p>
                    </div>

                    <div class="card">
                        <h3>Trabajar en equipo</h3>

                        <p>
                            Añade usuarios registrados a tus
                            proyectos y asigna un rol a cada participante.
                        </p>
                    </div>

                    <div class="card">
                        <h3>Registrar horas</h3>

                        <p>
                            Indica las horas de contribución
                            de los participantes de cada proyecto.
                        </p>
                    </div>

                </div>

            </div>
        </section>
    </main>

    <footer>
        Gestor de Proyectos - Práctica final de Laravel
    </footer>

</body>
</html>
