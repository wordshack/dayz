<template>
    <tr>
        <td>{{item.name}}</td>
        <td>{{item.subtype}}</td>
        <td>{{item.buyprice}}</td>
        <td>{{item.sellprice}}</td>
        <td>{{item.traderCat}}</td>
        <td>{{item.mods}}</td>
        <td>
            <button class="btn btn-info" @click="show()"><i class="fa fa-edit"></i></button>
            <button class="btn btn-danger"  @click="showDelete"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
</template>

<script>
    import ModalEditComponent from "../modal/ModalEditComponent.vue";
    import ModalDeleteComponent from "../modal/ModalDeleteComponent";
    export default {
        name: "TraderItems",
        props:['item'],
        methods: {
            show () {
               this.$modal.show(ModalEditComponent, {
                   name:this.item.name,
                   subtype:this.item.subtype,
                   buyprice:this.item.buyprice,
                   sellprice:this.item.sellprice,
                   traderCat:this.item.traderCat
               }, {
                   height: 'auto'
               });
            },
            showDelete () {
                this.$modal.show(ModalDeleteComponent, {
                    name:this.item.name,
                }, {
                    height: 'auto'
                });
            }
        }
    }
</script>

<style scoped>

</style>
