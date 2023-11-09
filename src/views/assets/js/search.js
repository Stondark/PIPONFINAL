// Selectores DOM
const searchInput = document.getElementById('search-food');
const resultSearch = document.getElementById('result-search');
const listSearch = document.getElementById('list-search');
const listFood = document.getElementById('list-food');
const buttonFood = document.getElementById("save-food");
buttonFood.style.display = "none"
const calcFood = document.getElementById("calculate-food");
calcFood.style.display = "none";
const calcResult = document.getElementById("calculated-result");
calcResult.style.display = "none"
// Constantes para la API
const app_id = "f2f160ec";
const app_key = "656bc506563780029c313267bf3da0a9";
const baseUrl = " https://trackapi.nutritionix.com/v2/";
const paramsQuery = new URLSearchParams();

// Constantes globales
const foodAdded = {};

// set base query
function setBaseQueryParams(){
    paramsQuery.append("branded", true);
    paramsQuery.append("branded_food_name_only", "false");
    paramsQuery.append("common", "true");
    paramsQuery.append("common_general", "true");
    paramsQuery.append("common_grocery", "true");
    paramsQuery.append("common_restaurant", "true");
}

async function getData(dataSearch) {
    const endPoint = "search/instant";
    paramsQuery.set("query", dataSearch);
    
    const response = await fetch(`${baseUrl}${endPoint}?${paramsQuery.toString()}`, {
      method: "GET",
      headers: {
        'x-app-id': app_id,
        'x-app-key': app_key,
        'locale': 'es_MX',
      }
    });
    return await response.json();
}

searchInput.addEventListener("input", async (e) => {

    if(e.target.value === ""){
        while (listSearch.firstChild) {
            listSearch.removeChild(listSearch.firstChild);
        }
        return;
    }

    let data = await getData(e.target.value)
    if(!data.common){
        return;
    }
    
    while (listSearch.firstChild) {
        listSearch.removeChild(listSearch.firstChild);
    }

    const errorSearch = resultSearch.parentNode.querySelector("#result-alert");
    // En caso de no encontrar resultados ocultaremos la lista
    if(data.common.length == 0){
        resultSearch.className = "collapse";
        if(!errorSearch){
            const alertNotResult = document.createElement("div");
            alertNotResult.className = "alert alert-danger mt-3";
            alertNotResult.setAttribute("id","result-alert");
            alertNotResult.innerText = "No se encontró el alimento";
            resultSearch.parentNode.appendChild(alertNotResult);
        }

    } else {
        resultSearch.className = "";
        if(errorSearch){
            errorSearch.remove();
        }

        data.common.forEach(element => {
            // Creamos la lista
            const newFood = document.createElement("li");
            newFood.className = "list-group-item d-flex justify-content-between align-items-center list-group-item-action";
            
            // Creamos el nombre
            const infoFood = document.createElement("span");
            infoFood.textContent = element.food_name.charAt(0).toUpperCase() + element.food_name.slice(1);

            // Creamos la imagen
            const imageFood = document.createElement("img");
            imageFood.src = element.photo.thumb;
            imageFood.style.width = "10%";

            // Creamos el botón de añadir nuevo alimento
            const buttonAction = document.createElement("button");
            buttonAction.innerText = "+";
            buttonAction.setAttribute("class", "btn btn-success");
            buttonAction.value = element.tag_id;
            buttonAction.addEventListener("click", () => {
                addNewFood(element, "common");
            });


            listSearch.appendChild(newFood)
            newFood.appendChild(infoFood)
            newFood.appendChild(imageFood);
            newFood.appendChild(buttonAction);

        });

        data.branded.forEach(element => {
            // Creamos la lista
            const newFood = document.createElement("li");
            newFood.className = "list-group-item d-flex justify-content-between align-items-center list-group-item-action";
            
            // Creamos el nombre
            const infoFood = document.createElement("span");
            infoFood.textContent = element.food_name.charAt(0).toUpperCase() + element.food_name.slice(1);

            // Creamos la imagen
            const imageFood = document.createElement("img");
            imageFood.src = element.photo.thumb;
            imageFood.style.width = "10%";

            // Creamos el botón de añadir nuevo alimento
            const buttonAction = document.createElement("button");
            buttonAction.innerText = "+";
            buttonAction.setAttribute("class", "btn btn-success");
            buttonAction.value = element.nix_item_id;
            buttonAction.addEventListener("click", () => {
                addNewFood(element, "branded");
            });

            listSearch.appendChild(newFood)
            newFood.appendChild(infoFood)
            newFood.appendChild(imageFood);
            newFood.appendChild(buttonAction);
            

        });
    }
});


function addNewFood(element, element_type){
    // Validamos el número de elementos ingresados
    const idActualFood = (element_type == "branded") ? element.nix_item_id : element.tag_id;
    let totalFood = validListFood(idActualFood);
    if(totalFood){
        const contFood = document.querySelector(`li[data-food-id="${idActualFood}"] .btn`);
        const currentCount = parseInt(contFood.textContent) || 0;
        
        let sumFood = currentCount + 1;
        contFood.textContent = sumFood;
        contFood.value = sumFood;
        return;
    }

    //
    calcFood.style.display = "inline-block";
    // Creamos un nuevo elemento a la lista
    const addFood = document.createElement("li");
    addFood.className = "list-group-item d-flex justify-content-between align-items-center list-group-item-action";
    addFood.setAttribute("data-food-id", idActualFood);
    addFood.setAttribute("data-type", element_type);
    addFood.setAttribute("data-name", element.food_name);
    listFood.appendChild(addFood);
    
    // Creamos el nombre
    const infoFood = document.createElement("span");
    infoFood.textContent = element.food_name.charAt(0).toUpperCase() + element.food_name.slice(1);

    // Creamos la imagen
    const imageFood = document.createElement("img");
    imageFood.src = element.photo.thumb;
    imageFood.style.width = "10%";

    // Creamos el contador de comida
    const badgeCont = document.createElement("button");
    badgeCont.setAttribute("class", "btn btn-info")
    badgeCont.textContent = 1;

    // Creamos el contador de comida
    const deleteFood = document.createElement("button");
    deleteFood.setAttribute("class", "btn btn-danger")
    deleteFood.textContent = "X";
    deleteFood.addEventListener("click", (e) => {
        e.preventDefault();
        deleteFoodItem(addFood);
    });
    
    addFood.appendChild(infoFood);
    addFood.appendChild(imageFood);
    addFood.appendChild(badgeCont);
    addFood.appendChild(deleteFood);
    
}


function validListFood(tagId) {
    const listItems = listFood.querySelectorAll("li");
    let found = false;
    listItems.forEach(function(item){
        const foodId = item.getAttribute("data-food-id");
        if(foodId == tagId ){
            found =  true;
        }
    });
    return found;   
}

function deleteFoodItem(item) {
    const badgeCont = item.querySelector(".btn-info");
    const currentCount = parseInt(badgeCont.textContent) || 0;
    if (currentCount > 1) {
        badgeCont.textContent = currentCount - 1;
    } else {
        // Si el contador llega a 0 o es negativo, elimina el elemento
        listFood.removeChild(item);
    }
}

async function calculateTotal() {
    let calories = 0;
    let total_fat = 0;
    let carbohydrate = 0;
    let protein = 0;
    let response = "";
    calcResult.style.display = "inline-block";

    const listTotal = listFood.querySelectorAll("li");
    listTotal.forEach(async (elementSelector) => {
    
        const typeFood = elementSelector.getAttribute("data-type");
        const nameFood = elementSelector.getAttribute("data-name");
        const idFood = elementSelector.getAttribute("data-food-id");
        const totalFood = elementSelector.querySelector(".btn-info");
        const currentCount = parseInt(totalFood.textContent) || 0;

        if(typeFood == "common"){
            response = await getNutrients(nameFood, currentCount);

        } else {
            response = await getNutrientsBranded(idFood);
        }

        if(!response.foods){
            return;
        }
        calories += response.foods[0].nf_calories || 0;
        total_fat += response.foods[0].nf_total_fat || 0;
        carbohydrate += response.foods[0].nf_total_carbohydrate || 0;
        protein += response.foods[0].nf_protein || 0;

        console.log(calories, total_fat, carbohydrate, protein)

        document.getElementById("calories-hidden").value = calories.toFixed(2);
        document.getElementById("total_fat-hidden").value = total_fat.toFixed(2);
        document.getElementById("carbohydrate-hidden").value = carbohydrate.toFixed(2);
        document.getElementById("protein-hidden").value = protein.toFixed(2);
        document.getElementById("cal-result").textContent = calories.toFixed(2);
        document.getElementById("fat-result").textContent = total_fat.toFixed(2);
        document.getElementById("carb-result").textContent = carbohydrate.toFixed(2);
        document.getElementById("prot-result").textContent = protein.toFixed(2);

    });

}

async function getNutrientsBranded(itemId) {
    const endPoint = "search/item";
    const queryId = new URLSearchParams();
    queryId.set("nix_item_id", itemId);

    const response = await fetch(`${baseUrl}${endPoint}?${queryId.toString()}`, {
      method: "GET",
      headers: {
        'x-app-id': app_id,
        'x-app-key': app_key
      }
    });
    return await response.json();
}

async function getNutrients(nameFood, totalFood){
    const endPoint = "natural/nutrients";
    let queryBody = {"query": `${totalFood} ${nameFood}`};
    const response = await fetch(`${baseUrl}${endPoint}`, {
      method: "POST",
      headers: {
        'Content-Type': 'application/json',
        'x-app-id': app_id,
        'x-app-key': app_key,
        'x-remote-user-id': 0,
      },
      body: JSON.stringify(queryBody)
    });
    return await response.json();

}

calcFood.addEventListener("click", async (e) => {
    e.preventDefault();
    buttonFood.style.display = "inline-block";
    const responseNut = await calculateTotal();
});


setBaseQueryParams();