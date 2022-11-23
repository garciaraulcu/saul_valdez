<template>
    <div>
        <h1>App.vue</h1>
        <h2>
            <center>
                {{ msg }}
            </center>
        </h2>
        
            <index-component></index-component>
        
    </div>
</template>

<script>
import IndexComponent from "./products/IndexComponent.vue";

export default {
    name: "App",

    data() {
        return {
            msg: "App Component",
        };
    },

    components: {
        IndexComponent,
    },
};
</script>

<style scoped>
#app{
    align-content: center;
}
</style>