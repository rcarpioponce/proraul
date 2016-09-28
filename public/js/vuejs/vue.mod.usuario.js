var dominio = document.domain;
var urlBase = 'hTtp://' + dominio;
if(dominio == 'localhost'){
  urlBase = urlBase + '/wsusu/public';
}

Vue.component('row-usuario', {
  template: '#rowUsuario',
  props:{
  	id:{},
    entidad:{},//desemtidad
    entidadlarga:{},
  	acceso:{},//deslog
    maxhor:{},
    maxdia:{},
    maxmes:{},
    ip:{},//desenlace
  	limitconsulta:{},
  	nivel:{},//nivelconsulta
  	fechaconvenio:{},//feccovenio
    estado:{},
    nomcontacto:{},
    dnicontacto:{},
    checkestado:{}
  },
  watch:{
    checkestado:{
        handler: function (newVal, oldVal) {
        }   
    }   
  },  
  ready:function(){
        if(parseInt(this.estado) == 1){
          this.checkestado = true;
        }else{
          this.checkestado = false;
        }
        var elementoHTML = this.$el;
        var check = elementoHTML.getElementsByClassName('check-switchery');
        this.switchery = new Switchery(check[0],{size: 'small',secondaryColor: '#DD4B39'});     
        var self = this;
        $(check).on('change',function(){
          var mensaje = 'Estas seguro de cambiar el estado de la entidad ' + self.entidad + '?'; 
          if(confirm(mensaje)){
            self.estado = self.estado == '1' ? '0' : '1';
            self.edit();
            self.$root.addUsuario();
          }else{
            self.switchery.setPosition(1);
          }
        });
  },
  methods:{
  	getNivelDescrip: function(){
  		var nivel = parseInt(this.nivel);
  		if(nivel == 1){
  			return 'Basico';
  		}
  		else if(nivel ==2){
  			return 'Intermedio';
  		}
  		else if(nivel == 3){
  			return 'Complejo';
  		}  		  		
  	},
  	edit: function(event){
      if(typeof(event) != 'undefined'){
  	   event.preventDefault();
      }
      var obj = {
        ID_USUA_WEB: this.id,
        DES_LOG: this.acceso,
        DES_PAS: "",
        DES_ENT: this.entidad,
        MAX_MIN: "0",
        MAX_HOR: this.maxhor,
        MAX_DIA: this.maxdia,
        MAX_MES: this.maxmes,
        NIVEL_CONSULTA: this.nivel,
        ID_PERSONA: "",
        FEC_USUA_CREA: "",
        BIT_ESTADO: this.estado,
        DES_ENT_LARGA: this.entidadlarga,
        DES_ENLACE: this.ip,
        RUT_CONVENIO: "",
        FEC_CONVENIO: this.fechaconvenio,
        NOMBRE_CONTACTO: this.nomcontacto,
        DNI_CONTACTO: this.dnicontacto    
      };  		
  		this.$root.new_usuario = obj;
  	}
  }
});	

new Vue({
  el: '#appUsuarios',
  data: {
    message: 'Hello Vue.js!',
    arUsuarios : [],
    filtro:{
    	codacceso: '',
    	nivel: '',
    	entidad: ''
    },
    new_usuario:{}
  },
  ready:function(){
  	this.getUsuarios();
    this.new_usuario = this.newUsuario();
  },
  methods:{
  	newUsuario: function(){
      var objeto = {
        ID_USUA_WEB: 0,
        DES_LOG: "",
        DES_PAS: "",
        DES_ENT: "",
        MAX_MIN: "0",
        MAX_HOR: "0",
        MAX_DIA: "0",
        MAX_MES: "0",
        NIVEL_CONSULTA: "1",
        ID_PERSONA: "",
        FEC_USUA_CREA: "",
        DES_TERM_CREA: "",
        IDX_USUA_MODI: "",
        FEC_USUA_MODI: "",
        DES_TERM_MODI: "",
        BIT_ESTADO: "",
        DES_ENT_LARGA: "",
        DES_ENLACE: "",
        RUT_CONVENIO: "",
        FEC_CONVENIO: "",
        NOMBRE_CONTACTO: "",
        DNI_CONTACTO: ""      
      };

      return objeto;
    },
    btnAgregar: function(event){
      this.new_usuario = this.newUsuario();
    },
    addUsuario: function(event){
      //event.preventDefault();
      if(this.newUsuario.ID_USUA_WEB == 0){
        this.$http.post(urlBase + '/api/usuarios/add',this.new_usuario).then((response) => {
                this.getUsuarios();
              }, (response) => {
                console.log('Error al obtener los usuarios');
              });
      }else{
        this.$http.post(urlBase + '/api/usuarios/edit/' + this.new_usuario.ID_USUA_WEB,this.new_usuario).then((response) => {
                this.getUsuarios();
              }, (response) => {
                console.log('Error al obtener los usuarios');
              })
      }
      if(typeof(event) != 'undefined'){
        $('#modalUsuario').modal('toggle');    
      }
    },
    getUsuarios: function(event){
      //event.preventDefault();
  	  this.$http.post(urlBase + '/api/usuarios',this.filtro).then((response) => {
  	    // success callback
  	    this.arUsuarios = response.data;
  	  }, (response) => {
  	    console.log('Error al obtener los usuarios');
  	  });  		
  	}
  }
});