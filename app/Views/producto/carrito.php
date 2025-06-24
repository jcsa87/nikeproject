<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Carrito - Nike Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/carrito.css') ?>">
</head>
<body>
    <div class="cart-hero">
        <div class="main-container">
            <div class="cart-title">
                <h1><i class="fas fa-shopping-cart me-3"></i>Mi Carrito</h1>
                <p class="cart-subtitle">Revisa tus productos seleccionados</p>
            </div>
        </div>
    </div>

    <div class="main-container">
        <?php if (empty($carrito)) : ?>
            <!-- Carrito vacío -->
            <div class="empty-cart">
                <div class="empty-cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h3>Tu carrito está vacío</h3>
                <p>¡Descubre nuestra increíble colección de calzados Nike!</p>
                <a href="<?= base_url('producto/catalogo') ?>" class="btn-custom btn-primary-custom">
                    <i class="fas fa-arrow-left"></i>
                    Explorar productos
                </a>
            </div>
        <?php else : ?>
            <!-- Carrito con productos -->
            <div class="cart-table-container">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-box me-2"></i>Producto</th>
                            <th><i class="fas fa-tag me-2"></i>Precio</th>
                            <th><i class="fas fa-sort-numeric-up me-2"></i>Cantidad</th>
                            <th><i class="fas fa-calculator me-2"></i>Subtotal</th>
                            <th><i class="fas fa-cog me-2"></i>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach ($carrito as $item): ?>
                            <tr>
                                <td class="product-name"><?= esc($item['nombre']) ?></td>
                                <td class="price">$<?= number_format($item['precio'], 0, ',', '.') ?></td>
                                <td>
                                    <div class="quantity-controls">
                                        <button class="quantity-btn decrease-btn" 
                                                onclick="updateQuantity(<?= $item['id_producto'] ?>, 'decrease')"
                                                title="Disminuir cantidad">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span class="quantity-display"><?= $item['cantidad'] ?></span>
                                        <button class="quantity-btn increase-btn" 
                                                onclick="updateQuantity(<?= $item['id_producto'] ?>, 'increase')"
                                                title="Aumentar cantidad">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="subtotal">$<?= number_format($item['precio'] * $item['cantidad'], 0, ',', '.') ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <!-- Eliminar una unidad -->
                                        <button class="action-btn remove-one-btn" 
                                                onclick="removeOneItem(<?= $item['id_producto'] ?>)"
                                                title="Eliminar una unidad">
                                            <i class="fas fa-minus-circle"></i>
                                        </button>
                                        
                                        <!-- Eliminar todos -->
                                        <button class="action-btn remove-all-btn" 
                                                onclick="removeAllItems(<?= $item['id_producto'] ?>)"
                                                title="Eliminar todos">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php $total += $item['precio'] * $item['cantidad']; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="cart-summary">
                <div class="summary-details">
                    <div class="summary-row">
                        <span>Items en carrito:</span>
                        <span><?= array_sum(array_column($carrito, 'cantidad')) ?></span>
                    </div>
                    <div class="summary-row total-row">
                        <span><i class="fas fa-money-bill-wave me-2"></i>Total:</span>
                        <span class="total-amount">$<?= number_format($total, 0, ',', '.') ?></span>
                    </div>
                </div>
            </div>

            <div class="cart-actions">
                <a href="<?= base_url('carrito/vaciar') ?>" class="btn-custom btn-danger-custom" 
                    onclick="return confirm('¿Estás seguro de que quieres vaciar todo el carrito?')">
                    <i class="fas fa-trash-alt"></i>
                    Vaciar carrito
                </a>
                <a href="<?= base_url('producto/catalogo') ?>" class="btn-custom btn-secondary-custom">
                    <i class="fas fa-arrow-left"></i>
                    Seguir comprando
                </a>
                <a href="<?= base_url('carrito/checkout') ?>" class="btn-custom btn-primary-custom">
                    <i class="fas fa-credit-card"></i>
                    Finalizar compra
                </a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Modal de confirmación -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar acción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p id="confirmMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmAction">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notificación flotante -->
    <div id="notification" class="notification">
        <div class="notification-content">
            <i class="notification-icon"></i>
            <span class="notification-text"></span>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Variables globales
        let currentAction = null;
        let currentProductId = null;
        const modal = new bootstrap.Modal(document.getElementById('confirmModal'));

        // Función para mostrar notificaciones
        function showNotification(message, type = 'success') {
            const notification = document.getElementById('notification');
            const icon = notification.querySelector('.notification-icon');
            const text = notification.querySelector('.notification-text');
            
            // Configurar icono según el tipo
            if (type === 'success') {
                icon.className = 'notification-icon fas fa-check-circle';
                notification.className = 'notification show success';
            } else if (type === 'error') {
                icon.className = 'notification-icon fas fa-exclamation-triangle';
                notification.className = 'notification show error';
            } else if (type === 'info') {
                icon.className = 'notification-icon fas fa-info-circle';
                notification.className = 'notification show info';
            }
            
            text.textContent = message;
            
            // Ocultar después de 3 segundos
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }

        // Función para actualizar cantidad (+ y -)
        function updateQuantity(productId, action) {
            const url = action === 'increase' 
                ? `<?= base_url('carrito/aumentar/') ?>${productId}`
                : `<?= base_url('carrito/disminuir/') ?>${productId}`;
            
            // Mostrar loading
            const row = document.querySelector(`tr:has(button[onclick*="${productId}"])`);
            if (row) row.classList.add('loading');
            
            // Realizar petición
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Recargar la página para mostrar los cambios
                    location.reload();
                } else {
                    showNotification(data.message || 'Error al actualizar la cantidad', 'error');
                    if (row) row.classList.remove('loading');
                }
            })
            .catch(error => {
                showNotification('Error de conexión', 'error');
                if (row) row.classList.remove('loading');
            });
        }

        // Función para eliminar una unidad
        function removeOneItem(productId) {
            currentProductId = productId;
            currentAction = 'remove_one';
            
            document.getElementById('confirmMessage').textContent = 
                '¿Eliminar una unidad de este producto?';
            modal.show();
        }

        // Función para eliminar todos los items de un producto
        function removeAllItems(productId) {
            currentProductId = productId;
            currentAction = 'remove_all';
            
            document.getElementById('confirmMessage').textContent = 
                '¿Eliminar todas las unidades de este producto?';
            modal.show();
        }

        // Confirmar acción en modal
        document.getElementById('confirmAction').addEventListener('click', function() {
            if (!currentProductId || !currentAction) return;
            
            let url;
            if (currentAction === 'remove_one') {
                url = `<?= base_url('carrito/eliminar_uno/') ?>${currentProductId}`;
            } else if (currentAction === 'remove_all') {
                url = `<?= base_url('carrito/eliminar/') ?>${currentProductId}`;
            }
            
            // Mostrar loading
            const row = document.querySelector(`tr:has(button[onclick*="${currentProductId}"])`);
            if (row) row.classList.add('loading');
            
            // Realizar petición
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                modal.hide();
                if (data.success) {
                    // Animación de salida y recarga
                    if (row) {
                        row.style.animation = 'slideOut 0.3s ease-out forwards';
                        setTimeout(() => location.reload(), 300);
                    } else {
                        location.reload();
                    }
                } else {
                    showNotification(data.message || 'Error al eliminar el producto', 'error');
                    if (row) row.classList.remove('loading');
                }
            })
            .catch(error => {
                modal.hide();
                showNotification('Error de conexión', 'error');
                if (row) row.classList.remove('loading');
            });
            
            // Limpiar variables
            currentProductId = null;
            currentAction = null;
        });

        // Animaciones para botones de cantidad
        document.querySelectorAll('.quantity-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 100);
            });
        });

        // Animación para hover en filas
        document.querySelectorAll('.cart-table tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });

        // Actualizar contadores en tiempo real (opcional)
        function updateCartCounters() {
            const quantities = document.querySelectorAll('.quantity-display');
            let totalItems = 0;
            
            quantities.forEach(qty => {
                totalItems += parseInt(qty.textContent);
            });
            
            // Actualizar contador en navbar si existe
            const cartCounter = document.querySelector('.cart-counter');
            if (cartCounter) {
                cartCounter.textContent = totalItems;
            }
        }

        // Llamar al cargar la página
        document.addEventListener('DOMContentLoaded', updateCartCounters);
    </script>
</body>
</html>