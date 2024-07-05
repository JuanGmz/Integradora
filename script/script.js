function borrarFila(button) {
    const fila = button.closest('.row');
    fila.remove();
}

function agregarFila() {
    const medidasContainer = document.getElementById('medidas-container');
    const nuevaFila = document.createElement('div');
    nuevaFila.className = 'row';

    nuevaFila.innerHTML = `
        <div class="col-5 mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" min="0" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="col-5 mb-3">
            <label for="medida" class="form-label">Medida</label>
            <input type="text" class="form-control" id="medida" name="medida" required>
        </div>
        <div class="col-2 mb-3">
            <label for="medida" class="form-label">Borrar</label>
            <button class="btn btn-danger" onclick="borrarFila(this)">
                <i class="fa-solid fa-minus"></i>
            </button>
        </div>
    `;

    medidasContainer.appendChild(nuevaFila);
}

function agregarFilaEditar() {
    const medidasContainer = document.getElementById('medidas-container-editar');
    const nuevaFila = document.createElement('div');
    nuevaFila.className = 'row';

    nuevaFila.innerHTML = `
        <div class="col-5 mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" min="0" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="col-5 mb-3">
            <label for="medida" class="form-label">Medida</label>
            <input type="text" class="form-control" id="medida" name="medida" required>
        </div>
        <div class="col-2 mb-3">
            <label for="medida" class="form-label">Borrar</label>
            <button class="btn btn-danger" onclick="borrarFila(this)">
                <i class="fa-solid fa-minus"></i>
            </button>
        </div>
    `;

    medidasContainer.appendChild(nuevaFila);
}