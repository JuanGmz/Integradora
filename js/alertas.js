function showAlert(message, type = 'success') {
    var alertElement = document.getElementById('floatingAlert');

    // Limpiar clases anteriores
    alertElement.className = 'floating-alert';

    // Aplicar la clase según el tipo
    if (type === 'success') {
        alertElement.classList.add('alert-success');
    } else if (type === 'error') {
        alertElement.classList.add('alert-error');
    } else if (type === 'warning') {
        alertElement.classList.add('alert-warning');
    }

    alertElement.textContent = message; // Configura el mensaje de la alerta
    alertElement.style.display = 'block'; // Muestra la alerta

    setTimeout(function () {
        alertElement.style.display = 'none'; // Oculta la alerta después de 3 segundos
    }, 3000);
}
