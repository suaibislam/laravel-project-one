@section('scripts')
<script>
    // Sample product data
    let products = @json($products);
    console.log(products);
    // let data = { !! json_encode($products) !!  };

    // Cart object
    let cart = {};

    // Function to display products
    function displayProducts() {
        const productList = document.getElementById('product-list');
        products.forEach(product => {
            const productCard = document.createElement('div');
            productCard.className = 'col-md-4 mb-4';
            productCard.innerHTML = `
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">${product.name}</h5>
                <p class="card-text">Price: $${product.price}</p>
                <button class="btn btn-primary add-to-cart" data-id="${product.id}">Add to Cart</button>
              </div>
            </div>
          `;
            productList.appendChild(productCard);
        });
    }

    // Function to update the cart display
    function updateCart() {
        const cartItems = document.getElementById('cart-items');
        cartItems.innerHTML = '';
        let total = 0;

        Object.values(cart).forEach(item => {
            const itemRow = document.createElement('tr');
            itemRow.innerHTML = `
      <td>${item.name}</td>
      <td>$${item.price}</td>
      <td>${item.quantity}</td>
      <td>$${item.price * item.quantity}</td>
      <td>
        <button class="btn btn-success increment" data-id="${item.id}">+</button>
        <button class="btn btn-warning decrement" data-id="${item.id}">-</button>
        <button class="btn btn-danger delete" data-id="${item.id}">Delete</button>
      </td>
    `;
            cartItems.appendChild(itemRow);

            total += item.price * item.quantity;
        });

        document.getElementById('cart-total').textContent = total;
    }

    // Event listener for Add to Cart
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('add-to-cart')) {
            const productId = e.target.dataset.id;
            const product = products.find(p => p.id == productId);

            if (cart[productId]) {
                cart[productId].quantity++;
            } else {
                cart[productId] = {
                    ...product,
                    quantity: 1
                };
            }
            updateCart();
        }
    });

    // Event listeners for cart actions
    document.addEventListener('click', (e) => {
        const productId = e.target.dataset.id;

        if (e.target.classList.contains('increment')) {
            cart[productId].quantity++;
        } else if (e.target.classList.contains('decrement')) {
            if (cart[productId].quantity > 1) {
                cart[productId].quantity--;
            } else {
                delete cart[productId];
            }
        } else if (e.target.classList.contains('delete')) {
            delete cart[productId];
        }
        updateCart();
    });

    // Event listener for clearing the cart
    document.getElementById('clear-cart').addEventListener('click', () => {
        cart = {};
        updateCart();
    });

    // Initialize the app
    displayProducts();
</script>
@endsection