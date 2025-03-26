<script>
    let currentTab = $state(0);
    function changeTab(index) {
        currentTab = index;
    }

    let { tabs, } = $props();
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

    <div>
        {#if tabs[currentTab]}
            {#each tabs[currentTab].content as content}
                {@render content()}
            {/each}
        {/if}
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