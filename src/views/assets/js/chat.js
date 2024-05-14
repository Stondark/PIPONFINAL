const chatContainer = document.getElementById("chat-container");

function getChat(professionalId) {
    fetch(`/src/controllers/chat.php?opt=view&receptor=${professionalId}`).then(response => {
        if (!response.ok) {
            throw new Error("Error al obtener el historial del chat: " + response.statusText);
        }
        return response.json();
    }).then(data => {
        // Aquí puedes procesar los datos y mostrarlos en el DOM
        const chatContainer = document.getElementById("chat-container");

        // Mostrar el contenedor de chat
        chatContainer.style.display = "block";

        const cardBody = chatContainer.querySelector(".card-body");

        // Limpiar el contenido anterior
        cardBody.innerHTML = "";

        // Mostrar "Inicia la conversación" si no hay mensajes
        if (data.data.length === 0) {
            const startConversation = document.createElement("div");
            startConversation.classList.add("text-muted");
            startConversation.textContent = "Inicia la conversación";
            cardBody.appendChild(startConversation);
        } else {
            // Iterar sobre los mensajes y agregarlos al cuerpo de la tarjeta
            data.data.forEach(message => {
                const messageElement = document.createElement("div");
                messageElement.classList.add("d-flex", "align-items-center", "mb-3");

                const messageContent = document.createElement("div");
                messageContent.classList.add("flex-grow-1", "text-truncate", "ms-2");

                const messageTitle = document.createElement("h5");
                messageTitle.classList.add("noti-item-title", "fw-medium", "fs-14");
                messageTitle.textContent = message.emisor; // Suponiendo que message.emisor contiene el nombre del remitente

                const messageSubtitle = document.createElement("small");
                messageSubtitle.classList.add("noti-item-subtitle", "text-muted");
                messageSubtitle.textContent = message.message; // Suponiendo que message.message contiene el contenido del mensaje

                // Agregar la fecha al mensaje
                const messageDate = document.createElement("small");
                messageDate.classList.add("fw-normal", "text-muted", "float-end", "ms-1");
                messageDate.textContent = formatDate(message.send_message); // Suponiendo que message.fecha contiene la fecha del mensaje
                messageSubtitle.appendChild(messageDate);

                messageContent.appendChild(messageTitle);
                messageContent.appendChild(messageSubtitle);

                messageElement.appendChild(messageContent);

                cardBody.appendChild(messageElement);
            });
        }
        scrollToBottom();
    }).catch(error => {
        console.error(error);
    });

}

document.querySelectorAll(".card-link").forEach(el => el.addEventListener('click', (e) => {
    e.preventDefault();
    const currentName = el.parentElement.querySelector('h5').getAttribute('professional-name');
    const professionalId = e.target.id;
    document.getElementById("send-message").setAttribute("id_receptor", professionalId);
    document.getElementById('currentNameProfessional').innerText = currentName;
    window.scrollTo({
        top: document.getElementById('chat-container').offsetTop,
        behavior: 'smooth' // Opciones: 'auto', 'smooth'
    });
    getChat(professionalId);

}));

function formatDate(dateString) {
    const date = new Date(dateString);
    const now = new Date();
    const diffMilliseconds = now - date;

    const minutes = Math.floor(diffMilliseconds / (1000 * 60));
    const hours = Math.floor(minutes / 60);
    const days = Math.floor(hours / 24);

    if (minutes < 1) {
        return "enviado hace menos de un minuto";
    } else if (minutes < 60) {
        return `enviado hace ${minutes} minutos`;
    } else if (hours < 24) {
        return `enviado hace ${hours} horas`;
    } else {
        return `enviado hace ${days} días`;
    }
}

document.getElementById("send-message").addEventListener("click", (e) => {
    let message = document.getElementById("input-message").value;
    const idReceptor = document.getElementById("send-message").getAttribute('id_receptor'); // Obtener el id desde el botón

    fetch("/src/controllers/chat.php?receptor=" + idReceptor, {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "message=" + message
    })
        .then(response => {
            if (!response.ok) {
                throw new Error("Error al enviar el mensaje: " + response.statusText);
            }

            getChat(idReceptor);
            document.getElementById("input-message").value = "";
            return response.json();
        })
        .then(data => {
            getChat(idReceptor);
            // Aquí puedes procesar la respuesta del servidor si es necesario
        })
        .catch(error => {
            console.error(error);
        });
});

const chatMessages = document.getElementById("chat-messages");

// Función para hacer scroll hacia abajo
function scrollToBottom() {
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// Llamar a la función scrollToBottom después de actualizar los mensajes
// Esto asegurará que el contenedor de mensajes siempre esté desplazado hacia abajo
scrollToBottom();