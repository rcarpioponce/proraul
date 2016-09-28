var dominio = document.domain;
var urlBase = 'hTtp://' + dominio;
if(dominio == 'localhost'){
  urlBase = urlBase + '/wsusu/public';
}

new Vue({
  el: '#appConsultas',
  data: {
  	filtro:{
  		fechaini:'',
  		fechafin:'',
  		entidad:'',
  		numdoc:''
  	},
  	arEntidades: [],
  	arConsultas: []
  },
  ready:function(){
  	this.getEntidades();
  	this.getResultados();
  },
  methods:{
  	getEntidades: function(){
  	  this.$http.post(urlBase + '/api/usuarios').then((response) => {
  	    // success callback
  	    this.arEntidades = response.data;
  	  }, (response) => {
  	    console.log('Error al obtener los usuarios');
  	  });  		
  	},
  	getResultados: function(event){
  		if(typeof(event) != 'undefined'){
  			event.preventDefault();
  		}	
  	  this.$http.post(urlBase + '/api/consumo',this.filtro).then((response) => {
  	    // success callback
  	    this.arConsultas = response.data;
  	  }, (response) => {
  	    console.log('Error al obtener los consumos');
  	  });
  	}
  }
})