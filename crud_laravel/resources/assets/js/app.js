new Vue({
    el: '#crud',
    created: function(){
        this.getKeeps();
    },
    data: {
        keeps: [],
        pagination:{
            'total'         :0,
            'current_page'  :0,
            'per_page'      :0,
            'last_page'     :0,
            'from'          :0,
            'to'            :0
        },
        newKeep: '',
        fillKeep: {id:'',keep:''},
        errors: [],
        offset: 3 // compensar
    },
    computed:{
        //pagina actual
        isActived:function(){
            return this.pagination.current_page;
        },
        //cant elementos vista
        pagesNumber:function(){
            if(!this.pagination.to){
                return [];
            }
            //desde
            var from = this.pagination.current_page - this.offset;
            if(from < 1){
                from = 1;
            }
            //hasta
            var to = from + (this.offset*2);
            if(to >= this.pagination.last_page){
                to=this.pagination.last_page;
            }
            //numeracion necesaria
            var pagesArray = [];
            while(from <= to){
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    methods:{
        //then si todo esta correcto
        getKeeps: function(page){
            var urlKeeps = 'tasks?page='+ page;
            axios.get(urlKeeps).then(response =>{
               this.keeps = response.data.tasks.data,
               this.pagination = response.data.pagination
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
        },
        changePage:function(page){
            this.pagination.current_page = page;
            this.getKeeps(page);
        }

    }
});