<template>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar a Trader</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="$emit('close')">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="#" method="post" @submit="updateItem">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                    <div class="col-sm-10" id="recipient-name">
                        <Select2 v-if="finishFor" v-model="namesSelect" :options="names"/>
                    </div>
                </div>
                <div v-if="visibleForm">
                    <div class="form-group">
                        <label for="subtype" class="col-form-label">Categoria:</label>
                        <div class="col-sm-10" id="subtype">
                            <Select2 v-if="visibleCategoria" name="subtype" v-model="categoriaSelect"
                                     :options="categoria"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="buyprice" class="col-form-label">Compra:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="buyprice" v-model="buyprice" id="buyprice">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sellprice" class="col-form-label">Venta:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="sellprice" v-model="sellprice" id="sellprice">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="traderCat" class="col-form-label">Cantidad:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="traderCat" v-model="traderCat" id="traderCat">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="$emit('close')" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>

    </div>
</template>

<script>
    import api from "../api/api";

    export default {
        name: "ModalEditComponent",
        props: ['allItems'],
        data() {
            return {
                categoria: [],
                categoriaSelect: "",
                visibleCategoria: false,
                finishFor: false,
                visibleForm: false,
                names: [], // or [{id: key, text: value}, {id: key, text: value}],
                namesSelect: "",
                subtype: "",
                buyprice: "",
                sellprice: "",
                traderCat: ""
            }
        },
        methods: {
            refreshTrade(){
                this.$bus.$emit('get-trade')
            },
            updateItem(e) {
                const context=this;
                e.preventDefault();
                this.axios.post(api.URLUpdateTrade, {
                    _token:this.csrf,
                    name:this.namesSelect,
                    subtype:this.categoriaSelect,
                    buyprice:this.buyprice,
                    sellprice:this.sellprice,
                    traderCat:this.traderCat
                })
                    .then(function (response) {
                        console.log(response.data);
                        context.refreshTrade();
                        context.$emit('close');
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            getCategoria() {
                const context = this;
                api.getCategoria()
                    .then(function (datos) {
                        for (let i = 0; i < datos.length; i += 1) {
                            context.categoria[i] = datos[i].subtype;
                        }
                        context.categoriaSelect = context.subtype;
                        context.visibleCategoria = true;
                    });
            },
            getAllItem() {
                const context = this;
                api.getAllItem()
                    .then(function (datos) {
                        for (let i = 0; i < datos.length; i += 1) {
                            context.names[i] = {
                                id: datos[i].name,
                                text: datos[i].name + ' - ' + datos[i].mods,
                            };
                        }
                        context.finishFor = true;
                    });
            },
            getFindItem() {
                const context = this;
                api.getFindItem(this.namesSelect)
                    .then(function (datos) {
                        context.subtype = datos[0].subtype;
                        context.buyprice = datos[0].buyprice;
                        context.sellprice = datos[0].sellprice;
                        context.traderCat = datos[0].traderCat;
                        context.visibleForm = true;
                    });
            }
        },
        mounted() {
            this.getAllItem();
        },
        watch: {
            namesSelect: function () {
                this.getFindItem();
                this.getCategoria();
            }
        }
    }
</script>

<style scoped>

</style>
