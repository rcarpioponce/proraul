<!DOCTYPE html>
<html>
<head>
    @include("layout.head")
    @section('carga_head')
    @show
</head>
<body>
    <div id="wrapper">
        @include("layout.sidebar")
        <div id="page-wrapper" class="gray-bg">
            @include("layout.topbar")
            @section('contenido_principal')
            @show               
            <div class="footer">
                    <div class="pull-right">
                        Todos los derechos reservados &reg; {{ date('Y') }}
                    </div>
                    <div>
                        <strong>Superintendencia Nacional de Educación Superior Universitaria</strong>
                    </div>
                </div>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="{{asset('js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

    <script src="{{asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/plugins/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('js/plugins/dataTables/dataTables.responsive.js')}}"></script>
    <script src="{{asset('js/plugins/dataTables/dataTables.tableTools.min.js')}}"></script>


    <script src="{{asset('js/scripts.min.js')}}"></script>
    <script src="{{asset('js/functions.min.js')}}"></script>
    <script src="{{asset('js/plugins/chosen/chosen.jquery.js')}}"></script> 


 



    @include('layout/winforms')
    @section('carga_footer')
    @show
</body>
</html>
<?php
?>