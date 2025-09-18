/**
 * Test Script para Modern Content Manager
 * Ejecutar en la consola del navegador para verificar funcionalidad
 */

// Test de inicialización
if (window.modernContentManager) {
    console.log('✅ Modern Content Manager está inicializado');
    
    // Test de filtros
    console.log('📋 Filtros actuales:', window.modernContentManager.currentFilters);
    
    // Test de funciones principales
    const tests = [
        {
            name: 'showToast',
            test: () => window.modernContentManager.showToast('Test de notificación', 'info'),
            description: 'Muestra una notificación de prueba'
        },
        {
            name: 'showLoading',
            test: () => {
                window.modernContentManager.showLoading(true);
                setTimeout(() => window.modernContentManager.showLoading(false), 2000);
            },
            description: 'Muestra indicador de carga por 2 segundos'
        },
        {
            name: 'updateFilterTags',
            test: () => window.modernContentManager.updateFilterTags(),
            description: 'Actualiza las etiquetas de filtros'
        }
    ];
    
    console.log('🧪 Ejecutando tests...');
    tests.forEach(test => {
        try {
            test.test();
            console.log(`✅ ${test.name}: ${test.description}`);
        } catch (error) {
            console.error(`❌ ${test.name}: Error -`, error);
        }
    });
    
} else {
    console.error('❌ Modern Content Manager NO está inicializado');
    console.log('🔍 Verificando elementos necesarios...');
    
    const requiredElements = [
        { selector: '#modern-filter-form', name: 'Formulario de filtros' },
        { selector: '.modern-table-container', name: 'Contenedor de tabla' },
        { selector: 'select[name="contenido_seccion"]', name: 'Filtro de sección' },
        { selector: 'input[name="contenido_titulo"]', name: 'Filtro de título' },
        { selector: 'input[name="contenido_fecha"]', name: 'Filtro de fecha' }
    ];
    
    requiredElements.forEach(element => {
        const found = document.querySelector(element.selector);
        console.log(`${found ? '✅' : '❌'} ${element.name}: ${found ? 'Encontrado' : 'NO encontrado'}`);
    });
}

// Test manual de filtros
function testFilterManual() {
    if (!window.modernContentManager) {
        console.error('Modern Content Manager no disponible');
        return;
    }
    
    console.log('🧪 Test manual de filtros...');
    
    // Simular cambio de sección
    const sectionSelect = document.querySelector('select[name="contenido_seccion"]');
    if (sectionSelect && sectionSelect.options.length > 1) {
        sectionSelect.value = sectionSelect.options[1].value;
        sectionSelect.dispatchEvent(new Event('change'));
        console.log('✅ Test de filtro de sección ejecutado');
    }
    
    // Simular búsqueda por nombre
    const nameInput = document.querySelector('input[name="contenido_titulo"]');
    if (nameInput) {
        nameInput.value = 'test';
        nameInput.dispatchEvent(new Event('input'));
        console.log('✅ Test de filtro de nombre ejecutado');
    }
}

// Función para limpiar tests
function clearTests() {
    if (window.modernContentManager) {
        window.modernContentManager.clearAllFilters();
        console.log('🧹 Tests limpiados');
    }
}

console.log('🔧 Tests disponibles:');
console.log('- testFilterManual(): Prueba los filtros manualmente');
console.log('- clearTests(): Limpia todos los filtros de prueba');
