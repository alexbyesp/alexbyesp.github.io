<?php
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


    if (strpos($url, "error=c") == true) {
        #MENSAJE DE INSERCIÓN ERRONEA
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>¡ Error !</strong> Se produjo un error al INSERTAR sus datos.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } else if (strpos($url, "error=s") == true) {
        #MENSAJE DE INSERCIÓN CORRECTA
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>¡ Correcto !</strong> Sus datos se han INSERTADO correctamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } else if (strpos($url, "error=e") == true) {
        #MENSAJE DE EDICIÓN CORRECTA
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>¡ Correcto !</strong> Sus datos se han EDITADO correctamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } elseif (strpos($url, "error=g") == true) {
        #MENSAJE DE EDICIÓN ERRONEA
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>¡ Error !</strong> Se produjo un error al EDITAR sus datos.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } else if (strpos($url, "error=h") == true) {
        #MENSAJE DE ELIMINACIÓN CORRECTA
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>¡ Correcto !</strong> Sus datos se han ELIMINADO correctamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } else if (strpos($url, "error=d") == true) {
        #MENSAJE DE ELIMINACIÓN ERRONEA
    ?>
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">Error!</h4>
            <p>Se produjo un error al ELIMINAR sus datos.</p>
            <hr>
            <p class="mb-0">Esto puede que se deba a que otros registros dependan de este registro.</p>
        </div>
    <?php
    } 
?>