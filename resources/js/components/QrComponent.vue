<template>
    <div class="m-0">
        <div v-for="qr in qrs">
                <img v-if="qr.id" v-bind:src="'data:image/png;base64,'+qr.id" alt="">
        </div>
    
    </div>
</template>

<script>
export default {
    data() {
        return {
            qrs: [{id:false}],
            duration:15000,
        }
    },
    mounted() {
     
    },

    methods: {
        start: function(){
            var id = setInterval(()=>{  
                axios.get("http://127.0.0.1:8000").then(response =>(this.qrs = response.data))
            },this.duration)
        }
        
    },
     beforeDestroy() {
        clearInterval(this.id)
    },
    created() {
        this.start()
    },
   
}
</script>
