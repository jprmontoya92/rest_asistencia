<template>
    <div class="m-0">
        <div v-for="qr in qrs">
                <img  v-bind:src="'data:image/png;base64,'+qr" alt="">
        </div>
        <div v-if="show" id="progressbar">
            <div class="progress mb-2">
                <div class="progress-bar progress-bar-striped" role="progressbar" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100" :style="{'width': `${progress}%`}">
                    {{ progress }}%
                </div>
            </div>
        </div>
        {{progress}} - {{tempo}}
    </div>
</template>

<script>
export default {
    data() {
        return {
            qrs: [],
            tempo:15000,
            progress:0,
            show: false

        }
    },
    mounted() {
     
    },

    methods: {
        startqr: function(tempo){
            var id = setInterval(()=>{
                axios.get("/get-qr").then(response =>(this.qrs = response.data));
                this.timer(tempo);
            },tempo)
        },
        	timer: function(tempo) {
                let vm = this;
    	     var setIntervalRef = setInterval(function() {
                 vm.progress++;
              if (vm.progress == 100) {
                  //clearInterval(setIntervalRef);
                  vm.progress = 0;
				}
            }, 150);
        },
        
    },
     beforeDestroy() {
        clearInterval(this.id);
        clearInterval(this.timer);
    },
    created() {
        this.startqr(this.tempo)        
    },
   
}
</script>
