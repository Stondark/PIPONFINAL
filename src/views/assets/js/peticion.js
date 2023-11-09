const BASE_URL = "http://localhost:3000"
document.getElementById("formAuthentication").addEventListener("submit", function (e) {
    e.preventDefault()
    const bodyData= {
        username: document.getElementById("username").value,
        password: document.getElementById("password").value
    }
    const response = fetch(`${BASE_URL}/auth`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(bodyData)}).then(response => response.json())
        .then(
            data => 
            function(){
                console.log(data.success)
                if (data.success){
                    window.location.href = "/pipon\src\views\html\dashboard.php"
                } else 
                console.log("Incorrecto")
            }
            );

});

