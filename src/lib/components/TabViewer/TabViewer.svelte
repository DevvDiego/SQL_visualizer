<script>

let currentTab = $state(0);
let tabsArray = $state([{
}]);


let { children, tabs } = $props();
</script>



<section>
    <header>
        <ul>
            {@render tabs()}
        </ul>
    </header>

    <div>
        {@render children()}
    </div>
    
</section>



<style>

    section{
        
    }

    header{

        width: 100%;
    }

    header ul {

        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;

        list-style-type: none;
    }

</style>