@component('components.info-box', [
    'style' => 'purple',
    'icon' => 'users',
    'text' => 'Clientes',
    'number' => $clientes,
    'progress' => 100,
    'progress_description' => 'Clientes registrados en el sistema',
    ])
@endcomponent
@component('components.info-box', [
    'style' => 'green',
    'icon' => 'cubes',
    'text' => 'Inventario neto',
    'number' => count($listaArticulos),
    'progress' => '100',
    'progress_description' => '100% del total de articulos!',
    ])
@endcomponent
@component('components.info-box', [
    'style' => 'orange',
    'icon' => 'calendar-check-o',
    'text' => 'Reparaciones',
    'number' => count($listaReparaciones),
    'progress' => 100,
    'progress_description' => 'Reparaciones registradas',
    ])
@endcomponent
@component('components.info-box', [
    'style' => 'aqua',
    'icon' => 'handshake-o',
    'text' => 'Deudas',
    'number' => $deudas,
    'progress' => 100,
    'progress_description' => 'Clientes con deudas!',
    ])
@endcomponent