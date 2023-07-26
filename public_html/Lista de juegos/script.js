  // Productos ficticios para el ejemplo
  const productos = [
    { id: 1, nombre: "Producto 1", precio: 10 },
    { id: 2, nombre: "Producto 2", precio: 15 },
    { id: 3, nombre: "Producto 3", precio: 20 },
  ];

  let carrito = [];

  function agregarAlCarrito() {
    // Agregar un producto ficticio al carrito (el primer producto en este ejemplo)
    const producto = productos[0];
    carrito.push(producto);

    // Actualizar el contenido del carrito en la página
    actualizarCarrito();
  }

  function actualizarCarrito() {
    const cartItemsContainer = document.getElementById("cart-items");
    cartItemsContainer.innerHTML = "";

    // Recorrer los elementos en el carrito y mostrarlos en la página
    carrito.forEach((item) => {
      const listItem = document.createElement("li");
      listItem.textContent = `${item.nombre} - $${item.precio}`;
      cartItemsContainer.appendChild(listItem);
    });
  }