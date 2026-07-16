document
    .getElementById("btn-pay")
    .addEventListener("click", checkout);

    async function checkout() {

    const cash = Number(cashInput.value);

    const response = await fetch("/dashboard/sales", {

        method: "POST",

        headers: {

            "Content-Type": "application/json",

            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .content,

        },

        body: JSON.stringify({

            cash: cash,

            cart: cart,

        }),

    });

    const result = await response.json();

    console.log(result);

}