<template>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Trader</h4>
                <h6 class="card-subtitle">*Cantidad * significa valor máximo; Cantidad V significa Vehículo;
                    Cantidad VNK significa Vehículo sin Llave; Cantidad M significa revista; La cantidad W significa
                    arma; Cantidad S significa carne Steack; Cantidad K significa duplicación de clave</h6>
                <div class="table-responsive">
                    <button type="button" @click="showAdd" class="btn btn-success col-sm-12">Agregar a Trader</button>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Compra</th>
                            <th>Venta</th>
                            <th>Cantidad</th>
                            <th>Mod</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <trader-items v-for="itemtrade in trader" :key="itemtrade.name" :item="itemtrade" @get-trade="getTrade"></trader-items>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import TraderItems from "../items/TraderItems";
    import api from "../api/api.js";
    import ModalAddComponent from "../modal/ModalAddComponent";
    export default {
        name: "TraderComponent",
        components: {TraderItems},
        data(){
            return {
             trader:[]
            }
        },
        created(){
            this.$bus.$on('get-trade',()=>{
                this.getTrade();
            });
        },
        methods:{
            getTrade(){
                const context=this;
                api.getTrader()
                    .then(function (datos) {
                        context.trader=datos;
                    });
            },
            showAdd () {
                this.$modal.show(ModalAddComponent, {
                }, {
                    height: 'auto'
                });
            },
        },
        mounted() {
            this.getTrade();
        }
    }
</script>

<style scoped>

</style>
