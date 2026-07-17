import { Toast } from 'bootstrap';

const searchInput = document.getElementById('search-product');

if (searchInput) {

    const resultBox = document.getElementById('search-result');
    const cashInput = document.getElementById('cash');

    let cart = [];

    searchInput.addEventListener('keyup', async function () {

        const keyword = this.value;

        if (keyword.length < 2) {
            resultBox.innerHTML = '';
            return;
        }

        const response = await fetch(
            `/dashboard/sales/search?search=${keyword}`
        );

        const products = await response.json();

        let html = '';

        products.forEach(product => {

            html += `
<button
type="button"
class="list-group-item list-group-item-action"
onclick="addToCart(${product.id}, '${product.name}', ${product.price})">

<strong>${product.name}</strong>

<br>

<small class="text-muted">

${product.sku}

</small>

</button>
`;

        });

        resultBox.innerHTML = html;

    });

    cashInput.addEventListener('keyup', calculateChange);
    cashInput.addEventListener('change', calculateChange);

    window.addToCart = function(id, name, price)
    {

        const existing = cart.find(item => item.id === id);

        if (existing) {

            existing.qty++;

        } else {

            cart.push({

                id,
                name,
                price: Number(price),
                qty: 1

            });

        }

        renderCart();

        resultBox.innerHTML = '';

        searchInput.value = '';

        searchInput.focus();

    }

    window.removeItem = function(id)
    {

        cart = cart.filter(item => item.id !== id);

        renderCart();

    }

    window.increaseQty = function(id)
    {

        const item = cart.find(item => item.id === id);

        if (item) {

            item.qty++;

        }

        renderCart();

    }

    window.decreaseQty = function(id)
    {

        const item = cart.find(item => item.id === id);

        if (!item) return;

        item.qty--;

        if (item.qty <= 0) {

            removeItem(id);

            return;

        }

        renderCart();

    }

    function calculateChange()
    {

        let grandTotal = 0;

        cart.forEach(item => {

            grandTotal += item.qty * item.price;

        });

        const cash = Number(cashInput.value);

        const change = cash - grandTotal;

        document.getElementById('change').innerHTML =
            "Rp " + Math.max(change, 0).toLocaleString('id-ID');

        document.getElementById('btn-pay').disabled =
            cash < grandTotal || grandTotal === 0;

    }

    function renderCart()
    {

        const tbody = document.querySelector('#cart-table tbody');

        tbody.innerHTML = '';

        let grandTotal = 0;

        cart.forEach(item => {

            const total = item.qty * item.price;

            grandTotal += total;

            tbody.innerHTML += `

<tr>

<td>

<strong>${item.name}</strong>

</td>

<td>

<div class="btn-group btn-group-sm">

<button
class="btn btn-outline-secondary"
onclick="decreaseQty(${item.id})">

-

</button>

<span class="btn btn-light">

${item.qty}

</span>

<button
class="btn btn-outline-primary"
onclick="increaseQty(${item.id})">

+

</button>

</div>

</td>

<td>

Rp ${item.price.toLocaleString('id-ID')}

</td>

<td>

Rp ${total.toLocaleString('id-ID')}

</td>

<td>

<button
class="btn btn-sm btn-danger"
onclick="removeItem(${item.id})">

<i class="bi bi-trash"></i>

</button>

</td>

</tr>

`;

        });

        const totalText = "Rp " + grandTotal.toLocaleString('id-ID');

        const paymentGrandTotal = document.getElementById('payment-grand-total');

        if (paymentGrandTotal) {
            paymentGrandTotal.innerHTML = totalText;
        }

        calculateChange();

    }

    async function checkout() {

    console.log("Checkout clicked");

    const cash = Number(cashInput.value);

    const response = await fetch('/dashboard/sales', {

        method: 'POST',

        headers: {

            'Content-Type': 'application/json',

            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]')
                .content,

        },

        body: JSON.stringify({

            invoice_number: document.querySelector('input[readonly]').value,

            cash: cash,

            cart: cart,

        }),

    });

    const result = await response.json();
    console.log(result);

    if (result.success) {

        showToast(result.message);

        cart = [];

        renderCart();

        document.getElementById("change").innerHTML = "Rp 0";

        document.getElementById("btn-pay").disabled = true;

        cashInput.value = "";

        resultBox.innerHTML = "";

        searchInput.value = "";

        searchInput.focus();

    } else {

        showToast(result.message, 'danger');

    }

}

document
    .getElementById("btn-pay")
    .addEventListener("click", checkout);
    
}

function showToast(message, type = 'success') {

    const toastElement = document.getElementById('app-toast');

    const toastMessage = document.getElementById('toast-message');

    toastMessage.innerHTML = message;

    toastElement.classList.remove(
        'text-bg-success',
        'text-bg-danger'
    );

    toastElement.classList.add(
        type === 'success'
            ? 'text-bg-success'
            : 'text-bg-danger'
    );

    const toast = new Toast(toastElement);

    toast.show();

}