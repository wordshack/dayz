<template>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-danger">Esta seguro que desea quitar este elemento de el trader?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="$emit('close')">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="#" method="post" @submit="hiddenItem">
                <input type="hidden" name="_token" :value="csrf">
                <div class="form-group">
                    <label for="name" class="col-form-label">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" v-model="pname"
                               style="pointer-events:none;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="$emit('close')" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import api from "../api/api";

    export default {
        name: "ModalDeleteComponent",
        props: ['name'],
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                pname: this.name
            }
        },
        methods: {
            refreshTrade() {
                this.$bus.$emit('get-trade')
            },
            hiddenItem(e) {
                const context = this;
                e.preventDefault();
                this.axios.post(api.URLDeleteTrade, {
                    _token: this.csrf,
                    name: this.pname
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
        }
    }
</script>

<style scoped>

</style>
