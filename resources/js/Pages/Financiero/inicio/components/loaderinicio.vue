<template>
    <v-row> 
        <v-col cols="12">
            <v-skeleton-loader  type="list-item-two-line"></v-skeleton-loader>
        </v-col>
        <v-col cols="12" sm="3" >
            <v-skeleton-loader height="100" type="table-heading"></v-skeleton-loader>
        </v-col>
        <v-col cols="12" sm="3" >
            <v-skeleton-loader height="100" type="table-heading"></v-skeleton-loader>
        </v-col>
        <v-col cols="12" sm="3" >
            <v-skeleton-loader height="100" type="table-heading"></v-skeleton-loader>
        </v-col>
        <v-col cols="12" sm="3" >
            <v-skeleton-loader height="100" type="table-heading"></v-skeleton-loader>
        </v-col>
     
        <v-col cols="12">
            <v-skeleton-loader type="image" ></v-skeleton-loader>
            <v-skeleton-loader type="image" ></v-skeleton-loader>
            <v-skeleton-loader type="image" ></v-skeleton-loader>
        </v-col>
    </v-row>

</template>
<script>
export default{
    name:'loaderInicio',
    
}
</script>