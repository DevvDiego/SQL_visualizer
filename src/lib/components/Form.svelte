<script>

    function getFormData(e){
        const formData = new FormData();
        const inputs = e.target.elements;    //e contiene los elementos children del form
        for (let input of inputs) {
            if (input.type !== 'submit') {   //previene la deteccion de el boton submit
                formData.append(input.name, input.value);
            }
        }


        //añade a que tabla se envia la accion
        formData.append("target", target);
        
        return formData;
    }

    function sendFormData(formData){
        let URL = "http://localhost/www/sveltecrud/backend/";
          
        if(action == "insert"){
            URL = URL.concat("insert.php")
        }
        
        if(action == "delete"){
            URL = URL.concat("delete.php")
        }

        if(action == "update"){
            URL = URL.concat("update.php")
        }

        fetch(URL,{
            method: "POST", 
            body: formData
        })
        .then(response => {
            // return response.json();
            return response.text();
        })
        .then(json => {
            console.log(json);
        })
    }

    function handleForm(e){
        e.preventDefault();

        const formData = getFormData(e);
        sendFormData(formData);

        refreshTable = true;
    }

    
    let { target, action, refreshTable = $bindable(), children } = $props();
</script>


<form onsubmit={handleForm}>
    {@render children()}
</form>