<style>
  .offcanvas-footer {
    padding-top: 20px;
    padding-bottom: 20px;
  }
  .contenedorProducto{
    border: 2px solid rgb(0 71 141);
    padding: 2px;
    border-radius: 5px;
    background-color: rgb(150 232 255 / 20%);
  }
  .contenedorEliminar{
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: center !important;
  }
  .botonOffCanvas {
    position: fixed !important;
    bottom: 20px !important; 
    right: 20px !important; 
    background-color: rgb(2 69 211 / 28%) !important;
    color: black !important;
    border: 2px solid rgb(13 37 145 / 76%) !important;
    border-radius: 100px !important;
    padding: 17px !important;
  }
  .contenedorPrecio{
    align-items: center;
    display: flex;
    justify-content: end;
  }
  .borrarProducto{
    cursor:pointer;
    transition: .2s ease;
    font-weight: bold !important;
  }
  .borrarProducto:hover{
    transform: scale(1.15);
  }
</style>
<button class="btn btn-primary botonOffCanvas" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16"><path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/></svg></button>        
<div class="offcanvas offcanvas-end d-flex flex-column" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Carrito de compras</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body flex-grow-1">
    <div class="container contenedorProductos">
    </div>
  </div>
  <div class="offcanvas-footer px-5">
    <div class="row">
      <div class="col-6 fw-bold">Precio total:</div>
      <div class="col-6 text-end precioTotal">$0</div>
    </div>
    <button class='btn btn-sm btn-success w-100 mt-3' id="comprarCarrito">Comprar carrito</button>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  var arrayGuardado;
  var contenedorProductos;
  $(document).ready(function () {
    contenedorProductos = $('.contenedorProductos');
    arrayGuardado = JSON.parse(localStorage.getItem('carrito'));
    let totalProductos = 0;
    renderizarCarritos(arrayGuardado);
  });
  $(document).on('click','.borrarProducto',function(){
    let producto = $(this).attr('idproducto');
    console.log(`#contenedorProducto-${producto}`);
    $(`#contenedorProducto-${producto}`).remove();
    arrayGuardado.splice(producto,1);
    localStorage.setItem('carrito', JSON.stringify(arrayGuardado));
    renderizarCarritos(arrayGuardado);
  });
  $(document).on('click','#comprarCarrito',function(){
    console.log(arrayGuardado);
    let message = `Usuario: <?php echo$_SESSION['usuario']?>.\n`;
    precioTotal = 0;
    arrayGuardado.forEach(element => {
      message += `- "${element.nombre}" Precio: ${element.precio}.\n`;
      precioTotal += quitarFormato(element.precio);
    });
    message += `*PRECIO TOTAL: *${'$'+precioTotal.toLocaleString('es-CO')}.`;
    encodedMessage =encodeURIComponent(message);
    const whatsappUrl = `https://api.whatsapp.com/send?phone=573236877823&text=${encodedMessage}`;
    window.open(whatsappUrl, '_blank');
  });
  /**
   * Funcion que renderiza los productos del carrito
   * 
   * @param {array} arrayGuardado Array de objetos del carrito
   * @return void
   * 
   * Steven Lopez
   */
  const renderizarCarritos = (arrayGuardado) => {
    contenedorProductos.html('');
    precioTotal = 0;
    if (arrayGuardado) {
      let indiceActual = 0;
      arrayGuardado.forEach(element => {
        contenedorProductos.append(`
          <div class="row contenedorProducto mb-2" id="contenedorProducto-${indiceActual}">
            <div class="col-7 contenedorTitulo fw-bold">${element.nombre}</div>
            <div class="col-4 contenedorPrecio text-end">${element.precio}</div>
            <div class="col-1 contenedorPrecio contenedorEliminar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" idproducto="${indiceActual}" class="bi bi-trash borrarProducto" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/> <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/> </svg></div>
          </div>
        `);
        precioTotal += quitarFormato(element.precio);
        indiceActual++;
      });
      $("#comprarCarrito").attr('disabled', arrayGuardado.length === 0);
    }else{
      console.log("No existe array guardado");
      $("#comprarCarrito").attr('disabled',true);
    }
    $('.precioTotal').html('$'+precioTotal.toLocaleString('es-CO'));
    
  }
  const quitarFormato = (valor) => parseFloat(valor.replace(/[$.]/g, ''));
</script>
<script>
  
</script>