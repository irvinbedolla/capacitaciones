@extends('layouts.app')

@section('content')
<style>
    /* style.css o dentro de <style> */
.tab {
    /* Permite que el contenido se desborde */
    overflow-x: auto; 
    /* Oculta la barra de desplazamiento estándar en algunos navegadores */
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none; /* Firefox */
    /* Asegura que los elementos permanezcan en una sola línea */
    white-space: nowrap; 
    /* Elimina la barra de desplazamiento en Chrome/Safari */
    padding-bottom: 5px; /* Espacio extra para que no se corte la sombra si hubiera */
}

/* Opcional: Eliminar la barra de desplazamiento visualmente en navegadores basados en WebKit (Chrome, Safari) */
.tab::-webkit-scrollbar {
    display: none;
}

/* Si quieres que los botones se vean un poco más anchos y no solo lo que ocupa el texto */
.tab .btn {
    min-width: 120px; /* Asegura un ancho mínimo legible */
}
.h5 {
    style="text-align: justify;"
}
</style>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Formación y Actualización</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if (\Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            
                            <h4 class="mb-3">
                            SEMINARIO 1: <br>
                            FUNDAMENTOS DE LA CONCILIACIÓN Y LA JUSTICIA LABORAL.</h4>




                            <div class="tab d-flex gap-2"> 
                                <a class="btn btn-info text-nowrap" onclick="openCity(event, 'detalles')">Objetivo</a>
                                <a class="btn btn-info text-nowrap" onclick="openCity(event, 'solicitante')">Introducción</a>
                                <a class="btn btn-info text-nowrap" onclick="openCity(event, 'documentos')">Desarrollo</a>
                                <a class="btn btn-info text-nowrap" onclick="openCity(event, 'observaciones')">Conclusiones</a>
                            </div>

                                <div id="detalles" class="tabcontent">
                                    <div id="tabla_detalles" class="row"><br><br>
                                        <br><br>
                                        <h5>Proporcionar a las y los participantes los fundamentos teóricos, jurídicos e históricos del nuevo sistema de justicia 
                                        laboral en México, así como las bases conceptuales y metodológicas de la conciliación como mecanismo alternativo de solución de conflictos.</h5>
                                    </div>
                                </div>

                                <div id="solicitante" class="tabcontent">
                                    <div id="tabla_detalles" class="row"><br><br>
                                        <img 
                                            src="../public/assets/images/modulos/1.jpg" 
                                            class="img-fluid rounded mb-3 shadow-sm" 
                                            alt="Imagen representativa del curso de Conciliación Laboral"
                                            style="max-height: 250px; width: auto;"
                                        >
                                        <h5 style="text-align: justify;">
                                            S1M1U1 Historia y evolución del derecho laboral mexicano<br>
                                            I.	Antecedentes constitucionales del derecho laboral<br>
                                            II.	Las reformas laborales en México: contexto y alcances<br>
                                            III.	De las Juntas de Conciliación y Arbitraje al nuevo modelo<br>
                                            IV.	Comparativo entre el sistema anterior y el actual
                                            <br><br>
                                            S1M1U2 Marco jurídico del nuevo sistema de justicia laboral<br>
                                            I.	Reforma constitucional de 2017 (artículos 107 y 123)<br>
                                            II.	Reforma a la Ley Federal del Trabajo (2019)<br>
                                            III.	Normatividad estatal en materia de conciliación<br>
                                            IV.	Tratados internacionales aplicables (Convenios OIT)
                                             <br><br>
                                            S1M1U3 Organización y funcionamiento de los Centros de Conciliación Laboral<br>
                                            I.	Naturaleza jurídica y autonomía de los CCL<br>
                                            II.	Estructura organizacional tipo<br>
                                            III.	Atribuciones y competencias<br>
                                            IV.	Coordinación con tribunales laborales y otras instancias

                                        </h5>
                                    </div>
                                </div>

                                <div id="documentos" class="tabcontent">
                                    <div id="tabla_detalles" class="row"><br><br>
                                        <img 
                                            src="../public/assets/images/modulos/2.jpg" 
                                            class="img-fluid rounded mb-3 shadow-sm" 
                                            alt="Imagen representativa del curso de Conciliación Laboral"
                                            style="max-height: 250px; width: auto;"
                                        >
                                        <h5>
                                            S1M2U1 Métodos alternos de solución de controversias (MASC)<br>
                                            I.	Conceptos fundamentales: negociación, mediación, conciliación y arbitraje<br>
                                            II.	Diferencias y similitudes entre MASC<br>
                                            III.	Ventajas de los MASC frente al litigio tradicional<br>
                                            IV.	Experiencias internacionales en MASC laborales
                                            <br><br>
                                            S1M2U2 La conciliación laboral: concepto, principios y características<br>
                                            I.	Definición y naturaleza jurídica de la conciliación laboral<br>
                                            II.	Principios rectores: imparcialidad, equidad, celeridad, gratuidad<br>
                                            III.	Características del procedimiento conciliatorio<br>
                                            IV.	Diferencias entre conciliación prejudicial y judicial
                                            <br><br>
                                            S1M2U3 El conflicto laboral: teoría y tipología<br>
                                            I.	Teoría general del conflicto<br>
                                            II.	Tipos de conflictos laborales: individuales y colectivos<br>
                                            III.	Causas y dinámicas del conflicto en el ámbito laboral<br>
                                            IV.	Análisis de casos típicos en conciliación<br>
                                        </h5>
                                    </div>
                                </div>

                                <div id="observaciones" class="tabcontent">
                                    <div id="tabla_detalles" class="row"><br><br>
                                        <img 
                                            src="../public/assets/images/modulos/3.jpg" 
                                            class="img-fluid rounded mb-3 shadow-sm" 
                                            alt="Imagen representativa del curso de Conciliación Laboral"
                                            style="max-height: 250px; width: auto;"
                                        >
                                        <h5>S1M3U1 Etapas del procedimiento conciliatorio<br>
                                            I.	Fase prejudicial: solicitud y admisión<br>
                                            II.	Citación a las partes<br>
                                            III.	Audiencia de conciliación: desarrollo y estructura<br>
                                            IV.	Conclusión del procedimiento: convenio, incomparecencia, sin acuerdo
                                            <br><br>
                                            S1M3U2 Análisis estratégico de jurisprudencia sobre la etapa prejudicial<br>
                                            I.	Criterios de la SCJN sobre conciliación obligatoria<br>
                                            II.	Interpretación judicial del rol de los CCL<br>
                                            III.	Requisitos de validez de los convenios<br>
                                            IV.	Parámetros de legalidad y ejecutabilidad
                                            <br><br>
                                            S1M3U3 El convenio conciliatorio<br>
                                            I.	Naturaleza jurídica del convenio<br>
                                            II.	Requisitos formales y de fondo<br>
                                            III.	Límites a la autonomía de la voluntad<br>
                                            IV.	Homologación y ejecución del convenio
                                        </h5>
                                    </div>
                                </div>


                            <!-- Centramos la paginación a la derecha-->
                            <div class="pagination justify-content-end">
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<div id="menu_carga" style ="display: none;">
    <div>.</div>
    <div class="loader"></div>
</div>


@section('scripts')
    <script>
        const detalles = document.getElementById("detalles").style.display = 'none';
        const solicitante = document.getElementById("solicitante").style.display = 'none';
        const documentos = document.getElementById("documentos").style.display = 'none';
        const observaciones = document.getElementById("observaciones").style.display = 'none';

        function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;
        
            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
            }
        
            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
        
            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endsection