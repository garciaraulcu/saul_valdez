<template>
    <div>
        <center>
            <h1>
                {{ msg }}
            </h1>

            <div class="cards">
                <div class="bg-card" v-for="item in objetos" :key="item.id">
                    <div>
                        <a href="#">
                            <img
                                :src=item.image
                                alt="Image1"
                                class="img"
                            />
                        </a>
                    </div>
                    <div>
                        <a href="item?a=68" style="text-decoration: none"
                            >
                            <br>
                            <h4 style="color: black">
                                {{ item.name }}
                            </h4></a
                        >
                        <h6>Skin</h6>

                        <h4>
                            <span>$45 MXN</span>
                        </h4>
                        <br>
                        <button type="submit" class="btn btn-primary" name="add">
                            Agregar al Carrito
                            <i class="fa fa-cart-plus cart-font"></i>
                        </button>
                        <input type="hidden" name="product_id" value="68" />
                    </div>
                    <br />
                </div>
            </div>
        </center>
    </div>
</template>

<script>
export default {
    name: "IndexComponent",
    data() {
        return {
            msg: "Catalogo",
            objetos: [],
        };
    },

    mounted() {
        fetch("http://127.0.0.1:8000/api/items")
            .then((res) => res.json())
            .then((data) => (this.objetos = data));
    },
};
</script>

<style scoped>
.cards {
    margin: 0 auto;
    max-width: 90%;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(225px, 1fr));
    grid-auto-rows: auto;
    gap: 20px;
    font-family: sans-serif;
    padding-top: 0px;

}
.bg-card{
  background-color: #FFFFFF;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4);
}

.cart-font{
    font-size: 20px;
}


</style>
