<script>

    function getFormData(e){
        const formData = new FormData();
        const inputs = e.target.elements;    //e contiene los elementos children del form
        for (let input of inputs) {
            if (input.type !== 'submit') {   //previene la deteccion de el boton submit
                formData.append(input.name, input.value);
            }
        }     
        
        return formData;
    }

    function sendFormData(formData){
        let URL = "http://localhost/www/sveltecrud/backend/insert.php?" + target;
        
        fetch(URL,{
            method: "POST", 
            body: formData
        })
        .then(response => {
            // return response.json();
            return response.text();
        })
        // .then(json => {
        //     console.log(json);
        // })
    }

    function handleForm(e){
        e.preventDefault();

        const formData = getFormData(e);
        sendFormData(formData);

        refreshTable = true;
    }


    let { target, refreshTable = $bindable(), children } = $props();
</script>


<form onsubmit={handleForm}>
    {@render children()}
</form>