export function attachLoading(form) {

    form.addEventListener("submit", function () {

        const button = form.querySelector(
            'button[type="submit"], button:not([type])'
        );

        if (!button) return;

        button.disabled = true;

        button.innerHTML = `
            <span class="spinner-border spinner-border-sm me-2"></span>
            Processing...
        `;

    });

}