<?php

function generateReport($json)
{
    // Decodificar el JSON
    $data = json_decode($json, true);

    // Definir los mensajes para cada campo
    $messages = [
        "MTRANS_Automobile" => [
            "1" => "El paciente utiliza mucho automovil",
            "icon" => 'fa-solid fa-car-side'
        ],
        "MTRANS_Bike" => [
            "0" => "El paciente no utiliza bicicleta",
            "icon" => 'fa-solid fa-bicycle'
        ],
        "MTRANS_Motorbike" => [
            "1" => "El paciente utiliza mucho moto",
            "icon" => 'fa-solid fa-motorcycle'
        ],
        "MTRANS_Public_Transportation" => [
            "1" => "El paciente utiliza mucho transporte público",
            "icon" => 'fa-solid fa-bus'
        ],
        "MTRANS_Walking" => [
            "0" => "El paciente no suele caminar mucho",
            "icon" => 'fa-solid fa-person-walking'
        ],
        "family_history_overweight" => [
            "1" => "El paciente tiene familiares con sobrepeso",
            "icon" => 'fa-solid fa-pizza-slice'
        ],
        "FAVC" => [
            "1" => "El paciente suele consumir comidas altas en calorías",
            "icon" => 'fa-solid fa-bacon'
        ],
        "FCVC" => [
            "0" => "No suele consumir vegetales",
            "icon" => 'fa-solid fa-carrot'
        ],
        "NCP" => [
            "2" => "Consume más de 3 comidas diarias",
            "1" => "Consume 3 comidas diarias",
            "0" => "Consume entre 1 y 2 comidas diarias",
            "icon" => 'fa-solid fa-bowl-rice'
        ],
        "CAEC" => [
            "3" => "Siempre consume alimentos entre sus comidas principales",
            "2" => "Frecuéntemente consume alimentos entre sus comidas principales",
            "1" => "No consume con frecuencia alimentos entre sus comidas principales",
            "0" => "No consume alimentos entre sus comidas principales",
            "icon" => "fa-solid fa-cookie"
        ],
        "SMOKE" => [
            "1" => "Es fumador",
            "icon" => "fa-solid fa-joint"
        ],
        "CH2O" => [
            "2" => "Consume más de 2L diario de agua",
            "1" => "Consume entre de 1L a 2L diario de agua",
            "0" => "Consume menos de 1L diario de agua",
            "icon" => "fa-solid fa-bottle-water"
        ],
        "SCC" => [
            "0" => "No monitorea sus calorías",
            "icon" => "fa-solid fa-calendar-days"
        ],
        "FAF" => [
            "3" => "Realiza actividad física entre 4 a 5 días",
            "2" => "Realiza actividad física entre 3 a 4 días",
            "1" => "Realiza actividad física entre 1 a 2 días",
            "0" => "No realiza actividad física",
            "icon" => "fa-solid fa-dumbbell"
        ],
        "TUE" => [
            "2" => "Utiliza dispositivos electrónicos más de 5 horas",
            "1" => "Utiliza dispositivos electrónicos entre 3 a 5 horas",
            "0" => "Utiliza dispositivos electrónicos entre 1 a 2 horas",
            "icon" => "fa-solid fa-mobile"
        ],
        "CALC" => [
            "3" => "Bebe mucho alcohol",
            "2" => "Frecuéntemente bebe alcohol",
            "1" => "Bebe poco alcohol",
            "0" => "No bebe alcohol",
            "icon" => "fa-solid fa-wine-bottle"
        ],
    ];

    $returnHtml = "<div class='card-body'> <ul class='p-0 m-0'>";

    // Iterar sobre los datos y enviar los mensajes
    foreach ($data as $key => $value) {
        // Verificar si existe un mensaje para ese campo y valor
        if (isset($messages[$key][$value])) {
            $returnHtml .= "<li class='d-flex mb-4 pb-1'>
            <div class='avatar flex-shrink-0 me-3 align-items-center'>
                <i class='" . $messages[$key]['icon'] . "'></i>
            </div>
            <div class='d-flex w-100 flex-wrap align-items-center justify-content-between gap-2'>
                <div class='me-2'>
                    <h6 class='mb-0'>" . $messages[$key][$value] . "</h6>
                </div>
            </div>
        </li>";
        }
    }

    $returnHtml .= "</ul></div>";
    return $returnHtml;
}
