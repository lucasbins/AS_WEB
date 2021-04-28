var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!',
        clicou: false
    },
    methods:{
        tradutor: function(){
            if (this.clicou == false) {
                this.message = 'Olá vue!'
                this.clicou = true
            } else {
                this.message = 'Hello vue!',
                this.clicou = false
            }
        },
        
    }
})