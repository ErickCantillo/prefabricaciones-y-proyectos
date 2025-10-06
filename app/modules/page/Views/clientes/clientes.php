<?php
// Datos de ejemplo para los clientes
$clientesData = [];
$clientesData = (array) $this->clientes;
?>



<!-- Contenido principal -->
<div class="contenedor-seccion" style="background-color: #fff;">
    <div class="">
        <!-- Grid de clientes -->
        <div class="row clientes-grid">
            <?php foreach ($clientesData as $index => $cliente): ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-4" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                    <div class="cliente-card"
                        data-bs-toggle="modal"
                        data-bs-target="#clienteModal"
                        onclick="abrirModalCliente(<?= $cliente->id ?>)">
                        <div class="cliente-logo-container">
                            <img src="/images/<?= $cliente->cliente_imagen ?>"
                                alt="<?= $cliente->nombre ?>"
                                class="cliente-logo">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<!-- Modal para detalles del cliente -->
<div class="modal fade" id="clienteModal" tabindex="-1" aria-labelledby="clienteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clienteModalLabel">Detalles del Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img id="modalLogo" src="" alt="" class="modal-cliente-logo">
                    </div>
                    <div class="col-md-8">
                        <h4 id="modalNombre" class="cliente-modal-title"></h4>
                        <div class="mt-3">
                            <h6>Descripción</h6>
                            <p id="modalDescripcion" class="cliente-descripcion"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Estilos CSS -->
<style>
    .clientes-grid {
        margin-top: 2vh;
    }

    .cliente-card {
        background: white;
        border-radius: 12px;
        padding: 1vh 0.2vw;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 0.2vw solid white;
        box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.35);
    }

    .cliente-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .cliente-logo-container {
        position: relative;
        width: 100%;
        height: 25vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 8px;
    }

    .cliente-logo {
        width: 100%;
        max-height: 25vh;
        object-fit: contain;
        transition: all 0.4s ease;
        filter: grayscale(100%);
    }

    .cliente-card:hover .cliente-logo {
        filter: grayscale(0%);
        transform: scale(1.05);
    }

 


    /* Modal */
    .modal-cliente-logo {
        width: 100%;
        height: 20vh;
        object-fit: contain;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .cliente-modal-title {
        color: #E3AE24;
        font-weight: 700;
        margin-bottom: 2vh;
        font-family: 'Helvetica', sans-serif;
    }

    .cliente-info-grid {
        display: grid;
        gap: 10px;
        margin-bottom: 20px;
    }

    .info-item {
        display: flex;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }

    .info-label {
        font-weight: 600;
        color: #666;
        min-width: 80px;
        margin-right: 15px;
    }

    .info-value {
        color: #333;
        font-weight: 500;
    }

    .cliente-descripcion {
        color: #666;
        line-height: 1.6;
        text-align: justify;
    }

    .modal-header {
        background: linear-gradient(135deg, #E3AE24 0%, #d4a237 100%);
        color: white;
        border-bottom: none;
    }

    .modal-header .btn-close {
        filter: brightness(0) invert(1);
    }

    .modal-footer {
        border-top: none;
        padding-top: 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .cliente-card {
            padding: 15px;
        }

        .cliente-logo-container {
            height: 100px;
        }

        .estadistica-item h3 {
            font-size: 2rem;
        }

        .cta-clientes {
            padding: 30px 20px;
        }

        .modal-dialog {
            margin: 10px;
        }
    }
</style>

<!-- JavaScript -->
<script>
    // Datos de clientes para el modal
    const clientesData = <?= json_encode($clientesData) ?>;

    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar AOS
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 600,
                easing: 'ease-out-cubic',
                once: true
            });
        }
    });

    // Función para abrir modal con datos del cliente
    function abrirModalCliente(clienteId) {
        console.log('Cliente ID:', clienteId);
        console.log(clientesData);
        const cliente = clientesData.find(c => c.id == clienteId);
        console.log(cliente);
        if (cliente) {
            document.getElementById('modalLogo').src = '/images/' + cliente.cliente_imagen;
            document.getElementById('modalLogo').alt = cliente.cliente_nombre;
            document.getElementById('modalNombre').textContent = cliente.cliente_nombre;
            document.getElementById('modalDescripcion').innerHTML = cliente.cliente_descripcion;
        }
    }

    // Efecto de hover mejorado
    document.addEventListener('DOMContentLoaded', function() {
        const clienteCards = document.querySelectorAll('.cliente-card');

        clienteCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    });
</script>