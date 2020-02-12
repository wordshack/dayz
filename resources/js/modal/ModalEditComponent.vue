<template>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="$emit('close')">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="#" method="post" @submit="updateItem">
                <input type="hidden" name="_token" :value="csrf">
                <div class="form-group">
                    <label for="name" class="col-form-label">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" v-model="pname"  style="pointer-events:none;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="subtype" class="col-form-label">Categoria:</label>
                    <div class="col-sm-10" id="subtype" >
                        <Select2 v-if="visibleCategoria" name="subtype" v-model="categoriaSelect" :options="categoria"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="buyprice" class="col-form-label">Compra:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="buyprice" v-model="pbuyprice" id="buyprice" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="sellprice" class="col-form-label">Venta:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sellprice" v-model="psellprice" id="sellprice" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="traderCat" class="col-form-label">Cantidad:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="traderCat" v-model="ptraderCat" id="traderCat" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="$emit('close')" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>

    </div>
</template>

<script>
    import api from "../api/api";

    export default {
        name: "ModalEditComponent",
        props: ['name', 'subtype', 'buyprice', 'sellprice', 'traderCat'],
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                update:api.URLUpdateTrade,
                categoria:[],
                categoriaSelect:"",
                visibleCategoria:false,
                pname:this.name,
                pbuyprice:this.buyprice,
                psellprice:this.sellprice,
                ptraderCat:this.traderCat,
            }
        },
        methods:{
            refreshTrade(){
                this.$bus.$emit('get-trade')
            },
            getCategoria(){
                const context=this;
                api.getCategoria()
                    .then(function (datos) {
                        for (let i = 0; i < datos.length; i+=1) {
                            context.categoria[i]=datos[i].subtype;
                        }
                        context.categoriaSelect=context.subtype;
                        context.visibleCategoria=true;
                    });
            },
            updateItem(e) {
                const context=this;
                e.preventDefault();
                this.axios.post(api.URLUpdateTrade, {
                    _token:this.csrf,
                    name:this.pname,
                    subtype:this.categoriaSelect,
                    buyprice:this.pbuyprice,
                    sellprice:this.psellprice,
                    traderCat:this.ptraderCat
                })
                    .then(function (response) {
                        console.log(response.data);
                        context.refreshTrade();
                        context.$emit('close');
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        mounted() {
            this.getCategoria()
        }
    }
</script>

<style scoped>

</style>
