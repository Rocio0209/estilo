<?php

namespace App\DataTables;

use App\Models\Estado;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class EstadosDataTable extends DataTable
{
    protected $permiso = 'estados';

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('Acciones', function($row){
                $user = Auth()->user();

                $acciones="";
                if($user->can('updt_'.$this->permiso)){
                    $acciones.=' <a id-accion1="'.$row->idestado.'" class="modificar"><span data-bs-toggle="tooltip" class="fa fa-edit" title="Modificar"> </span></a> ';
                }
                if($user->can('del_'.$this->permiso)){
                    $acciones.= ' <a id-accion1="'.$row->idestado.'" class="eliminar"><span data-bs-toggle="tooltip" class="fa fa-trash" title="Eliminar"> </span></a> ';
                }
                return $acciones;
            })
            ->rawColumns(['Acciones'])
            ->setRowId('idestado');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Estado $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('dataTable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0,'asc')
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reload')
            ])->addTableClass(['table', 'table-striped', 'table-bordered', 'table-hover'])
            ->parameters([
                'layout' => [
                    'top2Start' => 'buttons',
                    'topStart' => 'pageLength',
                    'topEnd' => 'search',
                    'bottomStart' => 'info',
                    'bottomEnd' => 'paging'
                ],
                'responsive' => true,
                'oLanguage' => [
                    "sSearch" => "Buscar:",
                    "sInfoEmpty"=> "No existen resultados para mostrar",
                    "sInfoFiltered" => " (filtrado de _MAX_ registros en total)",
                    "sLoadingRecords" => "Por favor espere - cargando...",
                    "sZeroRecords" => "No existen registros para mostrar",
                    "sEmptyTable" => "No existe información en la tabla",
                    "sProcessing" => "Procesando...",
                    "sLengthMenu" => 'Ver <select style="border-radius:5px;">'.
                    '<option value="10">10</option>'.
                    '<option value="20">20</option>'.
                    '<option value="50">50</option>'.
                    '<option value="100">100</option>'.
                    '<option value="-1">Todos</option>'.
                    '</select> Registros&nbsp;',
                    "sInfo" => "Mostrando _START_ - _END_ de _TOTAL_ registros",
                    "oPaginate" => [
                        "sPrevious" => "Anterior",
                        "sNext" => "Siguiente"
                    ],
                    "select"=>[
                        "rows"=>[
                            "_"=>'%d filas seleccionadas',
                            "0"=>'',
                            "1"=>'%d fila seleccionada',
                        ]
                    ]
                ],
                'drawCallback' => 'function() { var tooltipTriggerList = [].slice.call(document.querySelectorAll(\'[data-bs-toggle="tooltip"]\'))
                    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                        return new bootstrap.Tooltip(tooltipTriggerEl)
                    }); }',
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('idestado')->title('ID'),
            Column::make('estado')->title('Estado'),
            Column::make('siglas')->title('Siglas'),
            Column::computed('Acciones')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)->addClass('all'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Estados_' . date('YmdHis');
    }
}
