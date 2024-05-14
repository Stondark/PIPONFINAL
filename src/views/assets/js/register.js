const toggleEvent = (event) => {
    const isChecked = event.target.checked;
    const idNumberInput = document.getElementById('idnumber');
    const professionInput = document.getElementById('profesion');

    document.getElementById('idnumberContainer').classList.toggle('hidden', !isChecked);
    document.getElementById('profesionContainer').classList.toggle('hidden', !isChecked);

    if (!isChecked) {
        // Si no está marcado, quita el atributo 'required' de los campos
        idNumberInput.removeAttribute('required');
        professionInput.removeAttribute('required');

        // Limpiar el campo de identificación y profesión
        idNumberInput.value = '';
        professionInput.value = '';
    } else {
        // Si está marcado, asegúrate de que los campos sean requeridos
        idNumberInput.setAttribute('required', 'required');
        professionInput.setAttribute('required', 'required');
    }
};

document.getElementById('medicoCheck').addEventListener('change', toggleEvent);

// Simular un evento de cambio para inicializar el estado
toggleEvent({ target: document.getElementById('medicoCheck') });
