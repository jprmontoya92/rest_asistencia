<template>

    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="selectEstablecimientos">Establecimientos:</label>
                <select name="establecimiento" id="" class="form-control" v-model="establecimiento" @change="getUbicaciones()">
                    <option value="0">Seleccione Establecimiento</option>
                    <option v-for="data in establecimientos" :value="data.esta_id">{{data.esta_nombre}}</option>
                </select>
            </div>
            <div class="col">
                <label for="selectEstablecimientos">Ubicación:</label>
                <select name="ubicacion" id="" class="form-control" v-model="ubicacion">
                    <option value="0">Seleccione lugar</option>
                    <option v-for="data in ubicaciones" :value="data.pto_id">{{data.pto_descripcion}}</option>
                </select>
            </div>
        </div>
    
    </div>
</template>


<script>
export default {
    data() {
        return {
            establecimiento:0,
            establecimientos:[],
            ubicacion: 0,
            ubicaciones: []
            }
    },
    methods: {
        getEstablecimientos: function(){
            axios.get('/getesta').then(function(response){
                this.establecimientos = response.data;
            }.bind(this));
        },
        getUbicaciones: function(){
            axios.get('/getubi',{
                params:{
                esta_id: this.establecimiento
            }}).then(function(response){
                this.ubicaciones = response.data;
            }.bind(this));
        }
    },

    created: function() {
        this.getEstablecimientos()
    },
  
}

</script>