<template>
    <div class="d-flex">
        <div class="mx-auto my-auto text-center">
            <div>   
                <img src="/img/error404.svg" width="500px" class="mx-auto" alt="">
            </div>
            <h1 class="text-h1 pt-3">Opps!!!</h1>
            <h4 class="text-h4 my-8">No se encontró esta pagina o no estas autorizado</h4>
            <v-btn 
            color="warning"
            size="large"
            :to="{name:'login'}"
            >
                Regresar a inicio
            </v-btn>
     
        </div>
    </div>
</template>