<script>
    import Notification from "./Notification.svelte";


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
            console.log("[FORM SUBMIT] Server response: " + json);
            handleResponse(json);
        })
    }

    function handleForm(e){
        e.preventDefault();

        const formData = getFormData(e);
        sendFormData(formData);

        refreshTable = true;
    }

    /**
     * 
     * @param {string} response
     */
    function handleResponse(response){

        if( response.includes("[ERROR]") ){
            handleNotification("error",response);
        }

        handleNotification("successful",response);

    }

    function handleNotification(status, res){
        hasPendingNotification = true;
        setInterval(() => {
            hasPendingNotification = false;
        }, 20*1000);
        notificationStatus = status;
        notificationMessage = res;
        
    }
    
    let hasPendingNotification = $state(false);
    let notificationStatus = $state("bad");
    let notificationMessage = $state("");

    let { target, action, refreshTable = $bindable(), children } = $props();
</script>


<form onsubmit={handleForm}>
    
    {#if hasPendingNotification}
        <Notification status={notificationStatus} message={notificationMessage} />
    {/if}

    {@render children()}
</form>