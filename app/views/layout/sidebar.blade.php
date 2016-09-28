<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element">
					<span id="logo-normal">
                       <img alt="SUNEDU" class="barras" src="{{asset('img/sunedu-logo-small.png')}}" />
                       <img alt="SUNEDU" class="texto" src="{{asset('img/texto_sunedu.png')}}" />
                   </span>
               </div>
               <div class="logo-element">

               </div>
           </li>

            <li class="special_link active">
             <a href="#" data-original-title="" title="">
             <i class="fa fa-cogs"></i> 
             <span class="nav-label">CONFIGURACIÒN</span><span class="fa arrow"></span></a>
               <ul class="nav nav-second-level collapse in" aria-expanded="true">
                  <li>
                    <a href="{{asset('listausuario')}}">><i class="fa fa-users"></i> USUARIO</a>
                  </li>
                </ul>
            </li>


            <li class="special_link active">
             <a href="#" data-original-title="" title="">
             <i class="fa fa-print"></i> 
             <span class="nav-label">REPORTES</span><span class="fa arrow"></span></a>
               <ul class="nav nav-second-level collapse in" aria-expanded="true">
                  <li>
                  <a href="{{asset('consumo')}}" target="_blank" data-toggle="tooltip" title="" data-original-title="Permite generar reportes por cantidad de consultas realizadas consolidad. "><i class="fa fa-line-chart"></i> CONSUMO</a>
                  </li>
                  <li>
                  <a href="{{asset('detalle')}}" target="_blank" data-toggle="tooltip" title="" data-original-title="Permite generar reportes por cantidad de consultas realizadas detallada. "><i class="fa fa-barcode"></i> DETALLE</a>
                  </li>
                </ul>
            </li>

</li>
</ul>
</div>
</nav>
