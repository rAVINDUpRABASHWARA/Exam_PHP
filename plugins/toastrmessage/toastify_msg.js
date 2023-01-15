//https://apvarun.github.io/toastify-js/

function Toastify_success(message)
{
    Toastify({ 
        text: message, 
        close: true, 
        gravity: "top", 
        position: "right", 
        duration: 3000,
        style: { background: "#04AA6D" } }).showToast();
}

function Toastify_danger(message)
{
    Toastify({ 
        text: message, 
        close: true, 
        gravity: "top", 
        position: "right", 
        duration: 3000,
        style: { background: "#dc3545" } }).showToast();
}

function Toastify_warning(message)
{
    Toastify({ 
        text: message, 
        close: true, 
        gravity: "top", 
        position: "right", 
        duration: 3000,
        style: { background: "#ffc107" } }).showToast();
}

function Toastify_info(message)
{
    Toastify({ 
        text: message, 
        close: true, 
        gravity: "top", 
        position: "right", 
        duration: 3000,
        style: { background: "#17a2b8" } }).showToast();
}