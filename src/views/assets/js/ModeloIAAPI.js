// document.addEventListener('DOMContentLoaded', function () {
//     document.getElementById('predictButton').addEventListener('click', async (e)  => {
//         e.preventDefault();
//         // Crear un objeto JSON con los datos del formulario
//         const formData = {
//             "MTRANS_Automobile": parseFloat(document.getElementById('MTRANS_Automobile').value),
//             "MTRANS_Bike": parseFloat(document.getElementById('MTRANS_Bike').value),
//             "MTRANS_Motorbike": parseFloat(document.getElementById('MTRANS_Motorbike').value),
//             "MTRANS_Public_Transportation": parseFloat(document.getElementById('MTRANS_Public_Transportation').value),
//             "MTRANS_Walking": parseFloat(document.getElementById('MTRANS_Walking').value),
//             "female": parseInt(document.getElementById('Female').value),
//             "Age": parseFloat(document.getElementById('Age').value),
//             "Height": parseFloat(document.getElementById('Height').value),
//             "Weight": parseFloat(document.getElementById('Weight').value),
//             "family_history_overweight": parseInt(document.getElementById('Family_History_Overweight').value),
//             "FAVC": parseInt(document.getElementById('FAVC').value),
//             "FCVC": parseFloat(document.getElementById('FCVC').value),
//             "NCP": parseFloat(document.getElementById('NCP').value),
//             "CAEC": parseFloat(document.getElementById('CAEC').value),
//             "SMOKE": parseInt(document.getElementById('SMOKE').value),
//             "CH2O": parseFloat(document.getElementById('CH2O').value),
//             "SCC": parseInt(document.getElementById('SCC').value),
//             "FAF": parseFloat(document.getElementById('FAF').value),
//             "TUE": parseFloat(document.getElementById('TUE').value),
//             "CALC": parseFloat(document.getElementById('CALC').value)
//         };

//         try {
//             const response = await fetch('http://127.0.0.1:5000/predict', {
//                 method: 'POST',
//                 headers: {
//                     'Content-Type': 'application/json'
//                 },
//                 body: JSON.stringify(formData)
//             });

//             const data = await response.json();
//             if(data.error){
//                 return document.getElementById('result').innerHTML = "Ocurrió un error intentando obteniendo la predicción: " + data.error
//             }
//             document.getElementById('result').innerHTML = "Categoría de Obesidad: " + data.categoria_obesidad;
//             document.getElementById('predictionResult').value = data.categoria_obesidad;
//             document.getElementById('formEncuesta').submit();
//         } catch (error) {
//             console.error('Error:', error);
//         }

//     });
// });
