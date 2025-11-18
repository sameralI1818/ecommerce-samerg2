<?php

declare(strict_types=1);
header('Content_Type: application/json; charset=utf-8');
// header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
// header('Pragma: no-cache');

require_once __DIR__.'/../../Models/AdminsModel.php';


//iniciar sesión y validar
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

// Parámetros Datatables
$draw           = (int)($_GET['draw'] ?? 1); //Datatables espera este valor

if(empty($_SESSION['admin'])){
    if(session_status() === PHP_SESSION_ACTIVE){
        $_SESSION = [];
        session_destroy();
    }

    echo json_encode([
        'draw'              => $draw,
        'recordsTotal'      => 0,
        'recordsFiltered'   => 0,
        'error'             => 'No autenticado',
        'logout'            => true,
        'redirect'          => '/salir'
    ], JSON_UNESCAPED_UNICODE);
    exit;
}



$start          = (int)($_GET['start'] ?? 0);
$length         = (int)($_GET['length'] ?? 10);
$search         = $_GET['search']['value'] ?? '';
$orderIdx       = (int)($_GET['ORDER'][0]['column'] ?? 0);
$orderDir       =(($_GET['order'][0]['dir'] ?? 'asc') === 'desc') ? 'DESC' : 'ASC';

//MAPEAR ÍNDICES DE COLUMNAS DATATABKES -> NOMBRES REALES DE BD
$columnas = ['id_administrador','nombre_administrador','email_administrador', 'rol_administrador','ultimo_login_administrador'];

$orderCol = $columnas[$orderIdx] ?? 'id_administrador';

//Consulta al modelo
$respuesta = AdminsModel::getDataTable([
    'start'         => $start,
    'length'        => $length,
    'search'        => $search,
    'orderCol' => $orderCol,
    'orderDir'      => $orderDir
]);

$data = [];

foreach ($respuesta['rows'] as $i => $r){

    $id= (int)$r['id_administrador'];

    //ruta de acción directa con id normal
    $editUrl = "/admin/administradores/editar/{$id}";
    
    $acciones = '
        <div class="btn-group">
            <a href="'.$editUrl.'" class="bg-info border-0 rounded-pill mr-2 btn-sm px-3">
                <i class="fas fa-pencil-alt text-white"></i>
            </a>
            <button type="button" class="bg-danger border-0 rounded-pill mr-2 btn-sm px-3 btn-delete" data-id="'.$id.'">
                <i class="fas fa-trash-alt text-white"></i>
            </button>
        </div>
    ';

    $data[] = [
        $start + $i + 1,
        htmlspecialchars($r['nombre_administrador']),
        htmlspecialchars($r['email_administrador']),
        htmlspecialchars($r['rol_administrador']),
        $r['ultimo_login_administrador'] ?: '-',
        $acciones
    ];
}

echo json_encode([
    'draw'              => $draw,
    'recordsTotal'      => $respuesta['total'],
    'recordsFiltered'   => $respuesta['filtered'],
    'data'              => $data,
], JSON_UNESCAPED_UNICODE);