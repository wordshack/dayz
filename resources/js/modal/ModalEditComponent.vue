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
                    <label for="nominal" class="col-form-label">Nominal:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nominal" v-model="pnominal" id="nominal" >
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
        props: ['name', 'nominal'],
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                update:api.URLUpdateTrade,
                categoria:[],
                categoriaSelect:"",
                visibleCategoria:false,
                pname:this.name,
                pnominal:this.nominal,
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
                    nominal:this.pnominal,
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
