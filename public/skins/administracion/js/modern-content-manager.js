/**
 * Modern Content Manager JavaScript
 * Funcionalidades AJAX dinámicas para el gestor de contenidos
 */

class ModernContentManager {
    constructor() {
        this.currentFilters = {};
        this.debounceTimer = null;
        this.ajaxRequest = null;
        this.abortController = null;
        this.initializeComponents();
    }

    /**
     * Inicializa todos los componentes
     */
    initializeComponents() {
        console.log('🚀 Inicializando componentes del Modern Content Manager...');
        console.log('Elementos encontrados:');
        console.log('- Formulario:', document.querySelector('#modern-filter-form'));
        console.log('- Tabla:', document.querySelector('.modern-content-table'));
        console.log('- Contenedor tabla:', document.querySelector('#content-table-container'));
        
        this.loadCurrentFilters();
        this.initializeFilters();
        this.initializePagination();
        this.initializeOrderControls();
        this.initializeTooltips();
        this.updateFilterTags();
        this.showToast('Sistema de filtros dinámicos activado', 'success');
        console.log('✅ Componentes inicializados correctamente');
    }

    /**
     * Carga los filtros actuales del formulario
     */
    loadCurrentFilters() {
        const sectionFilter = document.querySelector('select[name="contenido_seccion"]');
        const nameFilter = document.querySelector('input[name="contenido_titulo"]');
        const dateFilter = document.querySelector('input[name="contenido_fecha"]');

        if (sectionFilter && sectionFilter.value) {
            this.currentFilters['contenido_seccion'] = sectionFilter.value;
        }
        if (nameFilter && nameFilter.value) {
            this.currentFilters['contenido_titulo'] = nameFilter.value;
        }
        if (dateFilter && dateFilter.value) {
            this.currentFilters['contenido_fecha'] = dateFilter.value;
        }
    }

    /**
     * Inicializa los filtros dinámicos
     */
    initializeFilters() {
        console.log('🔧 Inicializando filtros dinámicos...');
        
        // Filtro por sección - cambio inmediato
        const sectionFilter = document.querySelector('select[name="contenido_seccion"]');
        console.log('Filtro de sección encontrado:', sectionFilter);
        if (sectionFilter) {
            sectionFilter.addEventListener('change', (e) => {
                console.log('✅ Sección cambiada:', e.target.value);
                this.updateFilter('contenido_seccion', e.target.value);
            });
        } else {
            console.warn('⚠️ No se encontró el filtro de sección');
        }

        // Filtro por nombre - con debounce para evitar muchas peticiones
        const nameFilter = document.querySelector('input[name="contenido_titulo"]');
        console.log('Filtro de título encontrado:', nameFilter);
        if (nameFilter) {
            nameFilter.addEventListener('input', (e) => {
                console.log('✅ Nombre cambiado:', e.target.value);
                clearTimeout(this.debounceTimer);
                this.debounceTimer = setTimeout(() => {
                    this.updateFilter('contenido_titulo', e.target.value);
                }, 300); // Reducido a 300ms para mayor responsividad
            });

            // También escuchar paste y keyup para mayor responsividad
            nameFilter.addEventListener('paste', (e) => {
                setTimeout(() => {
                    console.log('✅ Texto pegado:', e.target.value);
                    clearTimeout(this.debounceTimer);
                    this.debounceTimer = setTimeout(() => {
                        this.updateFilter('contenido_titulo', e.target.value);
                    }, 100);
                }, 10);
            });
        } else {
            console.warn('⚠️ No se encontró el filtro de título');
        }

        // Filtro por fecha - cambio inmediato
        const dateFilter = document.querySelector('input[name="contenido_fecha"]');
        console.log('Filtro de fecha encontrado:', dateFilter);
        if (dateFilter) {
            // Evento change para input type="date"
            dateFilter.addEventListener('change', (e) => {
                console.log('✅ Fecha cambiada:', e.target.value);
                this.updateFilter('contenido_fecha', e.target.value);
            });

            // Evento input adicional por si el usuario escribe manualmente
            dateFilter.addEventListener('input', (e) => {
                // Solo aplicar si la fecha es válida
                if (e.target.value && e.target.value.match(/^\d{4}-\d{2}-\d{2}$/)) {
                    console.log('✅ Fecha input válida:', e.target.value);
                    clearTimeout(this.debounceTimer);
                    this.debounceTimer = setTimeout(() => {
                        this.updateFilter('contenido_fecha', e.target.value);
                    }, 500);
                }
            });
        } else {
            console.warn('⚠️ No se encontró el filtro de fecha');
        }

        // Modernizar botones y prevenir envío del formulario
        this.modernizeFilterButtons();
        this.preventFormSubmission();
        
        console.log('✅ Filtros dinámicos inicializados correctamente');
    }

    /**
     * Previene el envío tradicional del formulario
     */
    preventFormSubmission() {
        const form = document.querySelector('#modern-filter-form');
        if (form) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                console.log('Envío de formulario prevenido - usando AJAX en su lugar');
                // Aplicar filtros manualmente si es necesario
                this.applyCurrentFormFilters();
                return false;
            });
        }
    }

    /**
     * Aplica los filtros basados en los valores actuales del formulario
     */
    applyCurrentFormFilters() {
        const sectionFilter = document.querySelector('select[name="contenido_seccion"]');
        const nameFilter = document.querySelector('input[name="contenido_titulo"]');
        const dateFilter = document.querySelector('input[name="contenido_fecha"]');

        const newFilters = {};
        
        if (sectionFilter && sectionFilter.value) {
            newFilters['contenido_seccion'] = sectionFilter.value;
        }
        if (nameFilter && nameFilter.value.trim()) {
            newFilters['contenido_titulo'] = nameFilter.value.trim();
        }
        if (dateFilter && dateFilter.value) {
            newFilters['contenido_fecha'] = dateFilter.value;
        }

        this.currentFilters = newFilters;
        this.applyFilters();
        this.updateFilterTags();
    }

    /**
     * Moderniza los botones de filtro
     */
    modernizeFilterButtons() {
        const filterForm = document.querySelector('form');
        const filterButton = filterForm?.querySelector('button[type="submit"]');
        const clearButton = filterForm?.querySelector('a[href*="cleanfilter"]');

        if (filterButton) {
            filterButton.style.display = 'none'; // Ocultar botón filtrar ya que es automático
        }

        if (clearButton) {
            clearButton.addEventListener('click', (e) => {
                e.preventDefault();
                this.clearAllFilters();
            });
            
            // Modernizar el botón
            clearButton.className = 'modern-btn modern-btn-secondary';
            clearButton.innerHTML = '<i class="fas fa-eraser"></i> Limpiar Filtros';
        }
    }

    /**
     * Actualiza un filtro específico
     */
    updateFilter(filterName, filterValue) {
        // Limpiar valores vacíos
        if (filterValue === '' || filterValue === null || filterValue === undefined) {
            delete this.currentFilters[filterName];
        } else {
            this.currentFilters[filterName] = filterValue;
        }
        
        console.log('Filtros actuales:', this.currentFilters);
        
        // Aplicar filtros inmediatamente
        this.applyFilters();
        this.updateFilterTags();
    }

    /**
     * Aplica todos los filtros activos
     */
    applyFilters() {
        // Cancelar request anterior si existe
        if (this.abortController) {
            try {
                this.abortController.abort();
            } catch (error) {
                console.log('Error al cancelar petición anterior:', error);
            }
        }

        // Crear nuevo AbortController para esta petición
        this.abortController = new AbortController();

        // Mostrar indicador de carga solo si hay filtros activos
        const hasFilters = Object.keys(this.currentFilters).length > 0;
        this.showLoading(true);

        // Preparar datos para enviar
        const formData = new FormData();
        Object.keys(this.currentFilters).forEach(key => {
            if (this.currentFilters[key]) {
                formData.append(key, this.currentFilters[key]);
            }
        });

        // Obtener ruta actual y parámetros
        const currentUrl = window.location.pathname;
        const urlParams = new URLSearchParams(window.location.search);
        const padre = urlParams.get('padre');
        
        if (padre) {
            formData.append('padre', padre);
        }

        console.log('Aplicando filtros via AJAX:', Object.fromEntries(formData));

        // Realizar petición AJAX
        this.ajaxRequest = fetch(currentUrl, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            signal: this.abortController.signal
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.text();
        })
        .then(html => {
            this.updateTableContent(html);
            this.showLoading(false);
            
            // Mostrar toast solo si hay filtros activos
            if (hasFilters) {
                this.showToast('Filtros aplicados', 'success');
            } else {
                this.showToast('Mostrando todos los registros', 'info');
            }
        })
        .catch(error => {
            if (error.name !== 'AbortError') {
                console.error('Error applying filters:', error);
                this.showLoading(false);
                this.showToast('Error al aplicar filtros: ' + error.message, 'error');
            } else {
                console.log('Petición cancelada correctamente');
            }
        });
    }

    /**
     * Actualiza el contenido de la tabla
     */
    updateTableContent(html) {
        // Crear un elemento temporal para parsear el HTML
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;

        // Extraer la nueva tabla y información
        const newTable = tempDiv.querySelector('.content-table');
        const newPagination = tempDiv.querySelector('.pagination');
        const newRegisterInfo = tempDiv.querySelector('.titulo-registro');

        // Actualizar tabla
        if (newTable) {
            const currentTable = document.querySelector('.content-table');
            if (currentTable) {
                currentTable.innerHTML = newTable.innerHTML;
                this.reinitializeTableEvents();
            }
        }

        // Actualizar paginación
        if (newPagination) {
            const currentPagination = document.querySelector('.pagination');
            if (currentPagination) {
                currentPagination.innerHTML = newPagination.innerHTML;
                this.initializePagination();
            }
        }

        // Actualizar información de registros
        if (newRegisterInfo) {
            const currentRegisterInfo = document.querySelector('.titulo-registro');
            if (currentRegisterInfo) {
                currentRegisterInfo.textContent = newRegisterInfo.textContent;
            }
        }

        // Reinicializar tooltips
        this.initializeTooltips();
    }

    /**
     * Reinicializa eventos de la tabla después de actualizar contenido
     */
    reinitializeTableEvents() {
        this.initializeOrderControls();
        
        // Reinicializar modales de eliminación
        const deleteButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
        deleteButtons.forEach(button => {
            // Los modales de Bootstrap se reinicializan automáticamente
        });
    }

    /**
     * Limpia todos los filtros
     */
    clearAllFilters() {
        this.currentFilters = {};
        
        // Limpiar campos del formulario
        const sectionFilter = document.querySelector('select[name="contenido_seccion"]');
        const nameFilter = document.querySelector('input[name="contenido_titulo"]');
        const dateFilter = document.querySelector('input[name="contenido_fecha"]');

        if (sectionFilter) sectionFilter.value = '';
        if (nameFilter) nameFilter.value = '';
        if (dateFilter) dateFilter.value = '';

        this.applyFilters();
        this.updateFilterTags();
        this.showToast('Filtros limpiados', 'info');
    }

    /**
     * Actualiza las etiquetas de filtros activos
     */
    updateFilterTags() {
        let tagsContainer = document.querySelector('.modern-filter-tags');
        
        if (!tagsContainer) {
            tagsContainer = document.createElement('div');
            tagsContainer.className = 'modern-filter-tags';
            
            const contentDashboard = document.querySelector('.content-dashboard');
            if (contentDashboard) {
                contentDashboard.appendChild(tagsContainer);
            }
        }

        // Limpiar tags existentes
        tagsContainer.innerHTML = '';

        // Crear tags para filtros activos
        Object.keys(this.currentFilters).forEach(key => {
            if (this.currentFilters[key]) {
                const tag = this.createFilterTag(key, this.currentFilters[key]);
                tagsContainer.appendChild(tag);
            }
        });
    }

    /**
     * Crea una etiqueta de filtro
     */
    createFilterTag(filterName, filterValue) {
        const tag = document.createElement('div');
        tag.className = 'modern-filter-tag fade-in';
        
        const labelMap = {
            'contenido_seccion': 'Sección',
            'contenido_titulo': 'Nombre',
            'contenido_fecha': 'Fecha'
        };

        const displayValue = filterName === 'contenido_seccion' 
            ? this.getSectionName(filterValue) 
            : filterValue;

        tag.innerHTML = `
            <span>${labelMap[filterName]}: ${displayValue}</span>
            <i class="fas fa-times close" data-filter="${filterName}"></i>
        `;

        // Evento para remover filtro
        tag.querySelector('.close').addEventListener('click', () => {
            this.removeFilter(filterName);
        });

        return tag;
    }

    /**
     * Obtiene el nombre de la sección por su ID
     */
    getSectionName(sectionId) {
        const sectionSelect = document.querySelector('select[name="contenido_seccion"]');
        if (sectionSelect) {
            const option = sectionSelect.querySelector(`option[value="${sectionId}"]`);
            return option ? option.textContent : sectionId;
        }
        return sectionId;
    }

    /**
     * Remueve un filtro específico
     */
    removeFilter(filterName) {
        delete this.currentFilters[filterName];
        
        // Limpiar campo del formulario
        const field = document.querySelector(`[name="${filterName}"]`);
        if (field) {
            field.value = '';
        }

        this.applyFilters();
        this.updateFilterTags();
        this.showToast('Filtro removido', 'info');
    }

    /**
     * Inicializa controles de ordenamiento
     */
    initializeOrderControls() {
        const upButtons = document.querySelectorAll('.up_table');
        const downButtons = document.querySelectorAll('.down_table');

        upButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                this.animateOrderChange(button, 'up');
            });
        });

        downButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                this.animateOrderChange(button, 'down');
            });
        });
    }

    /**
     * Anima el cambio de orden
     */
    animateOrderChange(button, direction) {
        const row = button.closest('tr');
        const targetRow = direction === 'up' ? row.previousElementSibling : row.nextElementSibling;

        if (targetRow && targetRow.tagName === 'TR') {
            // Añadir clase de animación
            row.style.transform = direction === 'up' ? 'translateY(-100%)' : 'translateY(100%)';
            targetRow.style.transform = direction === 'up' ? 'translateY(100%)' : 'translateY(-100%)';

            setTimeout(() => {
                // Resetear transformaciones y mover elementos
                row.style.transform = '';
                targetRow.style.transform = '';
                
                if (direction === 'up') {
                    row.parentNode.insertBefore(row, targetRow);
                } else {
                    row.parentNode.insertBefore(targetRow, row);
                }

                this.showToast('Orden actualizado', 'success');
            }, 300);
        }
    }

    /**
     * Inicializa paginación dinámica
     */
    initializePagination() {
        const paginationLinks = document.querySelectorAll('.pagination .page-link');
        
        paginationLinks.forEach(link => {
            if (!link.hasAttribute('data-dynamic-pagination')) {
                link.setAttribute('data-dynamic-pagination', 'true');
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const href = link.getAttribute('href');
                    if (href && href !== '#') {
                        this.loadPage(href);
                    }
                });
            }
        });
    }

    /**
     * Carga una página específica via AJAX
     */
    loadPage(url) {
        this.showLoading(true);

        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            this.updateTableContent(html);
            this.showLoading(false);
            
            // Actualizar URL sin recargar página
            history.pushState(null, '', url);
            
            this.showToast('Página cargada', 'success');
        })
        .catch(error => {
            console.error('Error loading page:', error);
            this.showLoading(false);
            this.showToast('Error al cargar página', 'error');
        });
    }

    /**
     * Inicializa tooltips
     */
    initializeTooltips() {
        if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }
    }

    /**
     * Muestra/oculta indicador de carga
     */
    showLoading(show) {
        // Indicador de carga flotante para filtros
        let filterLoadingIndicator = document.querySelector('.filter-loading-indicator');
        
        if (!filterLoadingIndicator) {
            filterLoadingIndicator = document.createElement('div');
            filterLoadingIndicator.className = 'filter-loading-indicator';
            filterLoadingIndicator.innerHTML = `
                <div class="mini-spinner"></div>
                <span>Aplicando filtros...</span>
            `;
            document.body.appendChild(filterLoadingIndicator);
        }

        // Mostrar/ocultar indicador flotante
        filterLoadingIndicator.style.display = show ? 'flex' : 'none';

        // Añadir clase de loading a la tabla
        const tableContainer = document.querySelector('.modern-table-container');
        if (tableContainer) {
            if (show) {
                tableContainer.classList.add('loading');
            } else {
                tableContainer.classList.remove('loading');
            }
        }

        // No deshabilitar controles para permitir cambios rápidos de filtros
        // Pero sí mostrar visualmente que está cargando
        const filterInputs = document.querySelectorAll('#modern-filter-form input, #modern-filter-form select');
        filterInputs.forEach(input => {
            if (show) {
                input.style.opacity = '0.7';
            } else {
                input.style.opacity = '1';
            }
        });
    }

    /**
     * Muestra notificación toast
     */
    showToast(message, type = 'info') {
        // Remover toasts anteriores
        const existingToasts = document.querySelectorAll('.modern-toast');
        existingToasts.forEach(toast => toast.remove());

        const toast = document.createElement('div');
        toast.className = `modern-toast ${type}`;
        
        const iconMap = {
            success: 'fas fa-check-circle',
            error: 'fas fa-exclamation-circle',
            warning: 'fas fa-exclamation-triangle',
            info: 'fas fa-info-circle'
        };

        toast.innerHTML = `
            <i class="${iconMap[type]}"></i>
            <span>${message}</span>
        `;

        document.body.appendChild(toast);

        // Mostrar toast
        setTimeout(() => {
            toast.classList.add('show');
        }, 100);

        // Ocultar toast después de 3 segundos
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 3000);
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    // Verificar si estamos en la página de contenidos
    if (document.querySelector('.modern-table-container') || document.querySelector('#modern-filter-form')) {
        console.log('Inicializando Modern Content Manager...');
        
        try {
            window.modernContentManager = new ModernContentManager();
            console.log('Modern Content Manager inicializado correctamente');
        } catch (error) {
            console.error('Error al inicializar Modern Content Manager:', error);
        }
    } else {
        console.log('No se encontró tabla de contenidos - Modern Content Manager no inicializado');
    }
});

// Verificar también si jQuery está disponible y el DOM ya está listo
if (typeof $ !== 'undefined') {
    $(document).ready(function() {
        // Si no se ha inicializado aún y estamos en la página correcta
        if (!window.modernContentManager && (document.querySelector('.modern-table-container') || document.querySelector('#modern-filter-form'))) {
            console.log('Inicializando Modern Content Manager via jQuery...');
            
            try {
                window.modernContentManager = new ModernContentManager();
                console.log('Modern Content Manager inicializado correctamente via jQuery');
            } catch (error) {
                console.error('Error al inicializar Modern Content Manager via jQuery:', error);
            }
        }
    });
}

// Funciones de compatibilidad con código existente
function eliminarImagen(campo, ruta) {
    if (window.modernContentManager) {
        window.modernContentManager.showToast('Procesando eliminación...', 'info');
    }
    
    var csrf = $("#csrf").val();
    var csrf_section = $("#csrf_section").val();
    var id = $("#id").val();
    
    if (confirm("¿Está seguro de borrar esta imagen?")) {
        $.post(ruta, {
            id: id,
            csrf: csrf,
            csrf_section: csrf_section,
            campo: campo,
        }, function (data) {
            if (parseInt(data.elimino) == 1) {
                $("#imagen_" + campo).hide();
                if (window.modernContentManager) {
                    window.modernContentManager.showToast('Imagen eliminada correctamente', 'success');
                }
            } else {
                if (window.modernContentManager) {
                    window.modernContentManager.showToast('Error al eliminar imagen', 'error');
                }
            }
        });
    }
    return false;
}

function eliminararchivo(campo, ruta) {
    if (window.modernContentManager) {
        window.modernContentManager.showToast('Procesando eliminación...', 'info');
    }
    
    var csrf = $("#csrf").val();
    var csrf_section = $("#csrf_section").val();
    var id = $("#id").val();
    
    if (confirm("¿Está seguro de borrar este archivo?")) {
        $.post(ruta, {
            id: id,
            csrf: csrf,
            csrf_section: csrf_section,
            campo: campo,
        }, function (data) {
            if (parseInt(data.elimino) == 1) {
                $("#archivo_" + campo).hide();
                if (window.modernContentManager) {
                    window.modernContentManager.showToast('Archivo eliminado correctamente', 'success');
                }
            } else {
                if (window.modernContentManager) {
                    window.modernContentManager.showToast('Error al eliminar archivo', 'error');
                }
            }
        });
    }
    return false;
}
