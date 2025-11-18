<?php

if(!isset($_SESSION['admin'])){
    include "login/login.php";
}else{

    if(!empty($arrayRutas[1])){
        if(
            $arrayRutas[1] == "administradores" ||
            $arrayRutas[1] == "categorias" ||
            $arrayRutas[1] == "subcategorias" ||
            $arrayRutas[1] == "inventario" ||
            $arrayRutas[1] == "mensajes" ||
            $arrayRutas[1] == "pedidos" ||
            $arrayRutas[1] == "informes" ||
            $arrayRutas[1] == "disputas" ||
            $arrayRutas[1] == "clientes" ||
            $arrayRutas[1] == "dashboard"
        ){
            include $arrayRutas[1]."/".$arrayRutas[1].".php";
        }
    }else{
        include "dashboard/dashboard.php";
    }

}