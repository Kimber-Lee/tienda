const contenedorResultados = document.getElementById('results-container');
const inputBusqueda = document.getElementById('search-input');
const filtroCategoria = document.getElementById('category-filter');

function Producto(id, nombre, categoria, precio) {
    this.id = id;
    this.nombre = nombre;
    this.categoria = categoria;
    this.precio = precio;
    
    this.renderizar = function() {
        const div = document.createElement('div');
        div.className = 'producto-card';
        div.innerHTML = `
            <h3>${this.nombre}</h3>
            <p>Categoría: ${this.categoria}</p>
            <p>Precio: $${this.precio.toLocaleString('es-CL')}</p>
            <!-- Modificación: Enlace GET para enviar el id a la sesión en PHP -->
            <a href="utils/utils.php?id=${this.id}" class="btn-agregar" style="text-decoration:none; display:block; text-align:center; box-sizing:border-box;">Añadir al carrito</a>
        `;
        return div;
    };
}

const catalogo = [
    new Producto(1, 'Notebook Pro', 'tecnología', 1200000),
    new Producto(2, 'Teclado Mecánico', 'tecnología', 100000),
    new Producto(3, 'Escritorio Modular', 'hogar', 250000)
];

function renderizarCatalogo(productos) {
    contenedorResultados.innerHTML = ''; 
    if (productos.length === 0) {
        contenedorResultados.innerHTML = '<p>No se encontraron productos.</p>';
    } else {
        productos.forEach(producto => {
            contenedorResultados.appendChild(producto.renderizar());
        });
    }
}

function aplicarFiltros() {
    const termino = inputBusqueda.value.toLowerCase();
    const categoria = filtroCategoria.value;
    
    const filtrados = catalogo.filter(prod => {
        const coincideTexto = prod.nombre.toLowerCase().includes(termino);
        const coincideCategoria = categoria === 'todas' || prod.categoria === categoria;
        return coincideTexto && coincideCategoria;
    });
    
    renderizarCatalogo(filtrados);
}

document.getElementById('search-button').addEventListener('click', aplicarFiltros);
inputBusqueda.addEventListener('keyup', aplicarFiltros);
filtroCategoria.addEventListener('change', aplicarFiltros);

function cargarProductosEnFormulario() {
    const selectResena = document.getElementById('select-producto-resena');
    
    catalogo.forEach(producto => {
        const opcion = document.createElement('option');
        opcion.value = producto.id;      
        opcion.text = producto.nombre;
        selectResena.appendChild(opcion); 
    });
}

window.onload = function() {
    renderizarCatalogo(catalogo); 
    cargarProductosEnFormulario();

    setTimeout(() => {
        const promo = document.getElementById('notificacion-promocion');
        promo.style.opacity = 1;
    }, 2500);
};