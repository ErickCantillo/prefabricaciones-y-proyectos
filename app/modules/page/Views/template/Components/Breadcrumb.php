<div class="breadcrumb">
    <span class="b-title"> <?= $this->page ?></span>
    <div class="d-flex gap-2">
        <p >
        <span class="b-inicio">
            Inicio /
        </span>    
         </p>
        <p><?= $this->page ?></p>
    </div>
</div>


<style>
    .breadcrumb {
        background-color: black;
        padding: 1.5rem 6rem;
        margin: 2.8rem 0 0 0 ;
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        
    }
    .b-inicio {
        color: #E3AE24;
    }
    .breadcrumb p {
        color: white;
        font-size: 1.2rem;
        font-family: 'Helvetica' sans-serif;
        margin: 0;
    }
    

    .b-title {
        color: #E3AE24;
        font-size: 2rem;
        font-family: 'Helvetica' sans-serif;
    }

    

</style>