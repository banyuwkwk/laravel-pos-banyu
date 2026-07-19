import { Toast } from "bootstrap";

export function showToast(message, type = "success") {

    const toastElement = document.getElementById("app-toast");
    const toastTitle = document.getElementById("toast-title");
    const toastMessage = document.getElementById("toast-message");
    const toastIcon = document.getElementById("toast-icon");

    toastMessage.innerHTML = message;

    toastElement.className = "toast border-0 shadow";

    switch (type) {

        case "success":

            toastTitle.innerHTML = "Success";
            toastIcon.innerHTML = "✅";
            toastElement.classList.add("text-bg-success");

            break;

        case "danger":

            toastTitle.innerHTML = "Error";
            toastIcon.innerHTML = "❌";
            toastElement.classList.add("text-bg-danger");

            break;

        case "warning":

            toastTitle.innerHTML = "Warning";
            toastIcon.innerHTML = "⚠️";
            toastElement.classList.add("text-bg-warning");

            break;

        case "info":

            toastTitle.innerHTML = "Information";
            toastIcon.innerHTML = "ℹ️";
            toastElement.classList.add("text-bg-info");

            break;

    }

    new Toast(toastElement).show();

}