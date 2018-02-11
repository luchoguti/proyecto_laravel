new Vue({
    el: '#crud',
    created: function(){
        this.getKeeps();
    },
    data: {
        keeps: [],
        newKeep: '',
        fillKeep: {id:'',keep:''},
        errors: []
    },
    methods:{
        //then si todo esta correcto
        getKeeps: function(){
            var urlKeeps = 'tasks';
            axios.get(urlKeeps).then(response =>{
               this.keeps = response.data.tasks.data; 
            });
        },
        deleteKeep: function(keep){
            var urldelete= 'tasks/' + keep.id;
            axios.delete(urldelete).then(response =>{//eliminamos
                this.getKeeps();//refrescar el listado
                toastr.success('Eliminado Exitosamente!'); //mensaje notificaciones
            });
        },
        createKeep:function () {
            var urlCreate ='tasks';
            axios.post(urlCreate,{
                //paramentros del post
                keep : this.newKeep
            }).then(response =>{
                this.getKeeps();//refrescar el listado
                this.newKeep = ''; //coloca la caja de text sin valor
                this.errors = [];
                $('#create').modal('hide');
                toastr.success('Tarea Creada Exitosamente!'); //mensaje notificaciones
            }).catch(error =>{
                this.errors = error.response.data
            });
        },
        editKeep:function(keep) {
            this.fillKeep.id = keep.id;
            this.fillKeep.keep = keep.keep;
            $('#edit').modal('show');
        },
        UpdateKeep:function(id){
            var urlUpdate = 'tasks/'+ id ;
            axios.put(urlUpdate,this.fillKeep).then(response=>{//actilice
                this.getKeeps();//refrescar el listado
                this.fillKeep = {id:'',keep:''};
                this.errors = [];
                $('#edit').modal('hide');
                toastr.success('Actulizacion Exitosa!'); //mensaje notificaciones
            }).catch(error =>{
                this.errors = error.response.data
            });
        }

    }
});