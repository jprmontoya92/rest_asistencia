<template>
    <div class="container my-5 p-3 border rounded">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="selectEstablecimiento" class="form-label">Establecimiento:</label> <br>
                     <select name="" id="" class="form-control" v-model="selected">
                        <option v-for="option in options" v-bind:value="option.esta_id" >{{option.esta_nombre}}</option>
                    </select> 
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="selectEstablecimiento" class="form-label">Ubicacion:</label> <br>
                    <select name="" id="" class="form-control">
                        <option value="">Hola Mundo </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-primary">Iniciar</button>
        </div>
    </div>
</template>

<script>

export default {
    data(){
        return {
            selected:'950',
            options:[]
        }
    },
    mounted() {
         axios.get("http://127.0.0.1:8000").then(response =>(this.options = response.data))
         console.log("hola mundo")
    },
}

</script>