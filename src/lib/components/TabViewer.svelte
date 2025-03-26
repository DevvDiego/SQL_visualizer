<script>
    let currentTab = $state(0);
    function changeTab(index) {
        currentTab = index;
    }

    let { tabs, children } = $props();
</script>


<section>
    <header>
        <ul>
            {#each tabs as tab, index}
                <li>
                    <button onclick={()=>{changeTab(index)}}>
                        {tab.title}
                    </button>
                </li>
            {/each}
        </ul>
    </header>


    {#if tabs[currentTab]}
        {#each tabs[currentTab].content as content}
            {@render content()}
        {/each}
    {/if}


    {@render children()}

    
</section>



<style>

    /* section{
        
    } */

    header{

        width: 100%;
    }

    header ul {

        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;

        list-style-type: none;
    }

    header ul button{
        cursor: pointer;

        font-size: 1rem;
        font-weight: normal;

        background-color: #151515;
        color: #ffffffde;

        border: none;
        padding: 10px 15px;

    }

</style>