<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
            $errorMessage = $_GET['error'] ?? '';
            $is404 = preg_match('/Class\s+"[^"]*Controller"\s+not\s+found/i', $errorMessage);
            echo $is404 ? 'Página no encontrada - 404' : 'Error - Prefabricaciones';
            ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.png">
    <style>
        body {
            background: linear-gradient(135deg, #E3AE24 0%, #f8f9fa 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .error-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .error-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 3rem 2rem;
            text-align: center;
            max-width: 500px;
            width: 100%;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            animation: bounce 2s infinite;
        }

        .error-icon.icon-404 {
            color: #fd7e14;
        }

        .error-icon.icon-error {
            color: #dc3545;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            60% {
                transform: translateY(-5px);
            }
        }

        .error-title {
            color: #2c3e50;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .error-message {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .btn-home {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
            color: white;
        }

        .error-details {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            margin: 1.5rem 0;
            border-left: 4px solid #dc3545;
            text-align: left;
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
            color: #495057;
            max-height: 150px;
            overflow-y: auto;
        }

        .btn-toggle {
            background: none;
            border: none;
            color: #6c757d;
            font-size: 0.9rem;
            text-decoration: underline;
            cursor: pointer;
            margin-top: 1rem;
        }

        .hidden {
            display: none;
        }

        @media (max-width: 576px) {
            .error-card {
                padding: 2rem 1.5rem;
                margin: 1rem;
            }

            .error-title {
                font-size: 2rem;
            }

            .error-icon {
                font-size: 3rem;
            }
        }
    </style>
</head>

<body>
    <div class="error-container">
        <div class="error-card">
            <?php
            $errorMessage = $_GET['error'] ?? '';
            $is404 = preg_match('/Class\s+"[^"]*Controller"\s+not\s+found/i', $errorMessage);
            ?>

            <div class="error-icon <?= $is404 ? 'icon-404' : 'icon-error' ?>">
                <i class="<?= $is404 ? 'fas fa-map-marker-alt' : 'fas fa-exclamation-triangle' ?>"></i>
            </div>

            <h1 class="error-title"><?= $is404 ? '404' : '¡Oops!' ?></h1>

            <p class="error-message">
                <?php if ($is404): ?>
                    La página que buscas no existe.<br>
                    Verifica la dirección URL o navega desde el menú principal.
                <?php else: ?>
                    Lo sentimos, ha ocurrido un error inesperado.<br>
                    No te preocupes, nuestro equipo está trabajando para solucionarlo.
                <?php endif; ?>
            </p>

            <?php if (isset($_GET['error']) && !empty($_GET['error']) && !$is404): ?>
                <button class="btn-toggle" onclick="toggleErrorDetails()">
                    <i class="fas fa-info-circle"></i> Ver detalles técnicos
                </button>

                <div id="errorDetails" class="error-details hidden">
                    <strong>Error:</strong><br>
                    <?= htmlspecialchars($_GET['error']) ?>
                </div>
            <?php endif; ?>

            <div style="margin-top: 2rem;">
                <a href="javascript:history.back()"class="btn-home">
                    <i class="fas fa-arrow-left"></i>
                    Volver
                </a>
            </div>

            <div style="margin-top: 1.5rem; color: #adb5bd; font-size: 0.9rem;">
                <i class="fas fa-clock"></i>
                <?= $is404 ? 'Puedes usar el menú de navegación para encontrar lo que buscas' : 'Si el problema persiste, contacta con soporte' ?>
            </div>
        </div>
    </div>

    <script>
        function toggleErrorDetails() {
            const details = document.getElementById('errorDetails');
            const button = document.querySelector('.btn-toggle');

            if (details.classList.contains('hidden')) {
                details.classList.remove('hidden');
                button.innerHTML = '<i class="fas fa-eye-slash"></i> Ocultar detalles técnicos';
            } else {
                details.classList.add('hidden');
                button.innerHTML = '<i class="fas fa-info-circle"></i> Ver detalles técnicos';
            }
        }

        // Auto-hide error details after 10 seconds if shown
        setTimeout(() => {
            const details = document.getElementById('errorDetails');
            const button = document.querySelector('.btn-toggle');

            if (details && !details.classList.contains('hidden')) {
                details.classList.add('hidden');
                button.innerHTML = '<i class="fas fa-info-circle"></i> Ver detalles técnicos';
            }
        }, 10000);
    </script>

    <main class="main-general" style="display: none;"><?= $this->_view->contenido ?></main>
</body>

</html>