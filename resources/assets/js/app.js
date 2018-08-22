new Vue({
  el: '#main',
  created: function(){
    this.getKeeps();
  },
  data:{
    keeps:[],
    nuevoKeep: '',
    errors:[],
    pagination:{
      'total':0,
      'current_page':0,
      'per_page':0,
      'last_page':0,
      'from':0,
      'to':0,
    },
    llenarKeep: {'id': '', 'keep': ''}
  },
  computed:{
    activoActivao: function(){
      return this.pagination.current_page;
    },
    paginasNumero: function(){
      if(!this.pagination.to){
        return [];
      }

      let from = this.pagination.current_page -2;
      if(from < 1) {
        from = 1;
      }

      var to = from+(2*2);
      if(to >= this.pagination.last_page){
        to = this.pagination.last_page;
      }

      var pagesArray = [];
      while(from <= to){
        pagesArray.push(from);
        from++;
      }
      return pagesArray;
    }
  },
  methods:{
    getKeeps: function(potato){
      let urlKeeps = "tasks?page="+potato;
      axios.get(urlKeeps).then(response => {
        this.keeps = response.data.task.data
        this.pagination = response.data.paginate
      });
    },
    deleteKeep: function(keep){
      let url = 'tasks/'+keep.id;
      axios.delete(url).then(response => {
        console.log(response.data);
        this.getKeeps();
        toastr.success(response.data);
      });
    },
    createKeep: function(keep){
      let urlKeeps = 'tasks';
      axios.post(urlKeeps,{
        keep: this.nuevoKeep
      }).then(response =>{
        this.getKeeps();
        this.nuevoKeep = "";
        this.errors = [];
        $('#crear').modal('hide');
        toastr.success(response.data);
      }).catch(error => {
        this.errors = error.response.data
      });
    },
    editKeeps: function(keep){

      this.llenarKeep.id = keep.id;
      this.llenarKeep.keep = keep.keep;

      $('#editar').modal('show');
    },
    updateKeeps: function(idKeep){
      let urlKeeps = 'tasks/'+idKeep;

      axios.put(urlKeeps, this.llenarKeep).then(response => {
        this.getKeeps();
        this.llenarKeep = {'id': '', 'keep': ''};
        this.errors = [];
        $('#editar').modal('hide');
        toastr.success(response.data);
      }).catch(error => {
        this.errors = error.response.data
      });
    },
    cambiarPagina: function(pagina){
      this.pagination.current_page = pagina;
      this.getKeeps(pagina);
    }
  }
});