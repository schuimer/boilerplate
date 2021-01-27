<?php

namespace App\Http\Livewire\Backend;
use App\Models\Currency;
use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CurrenciesTable extends TableComponent
{
    use HtmlComponents;

    /**
     * @var string
     */
    public $sortField = 'id';

    /**
     * @var string
     */
    public $status;

    /**
     * @var array
     */
    protected $options = [
        'bootstrap.container' => false,
        'bootstrap.classes.table' => 'table table-striped',
    ];

    /**
     * @param  string  $status
     */
    public function mount($status = 'active'): void
    {
        $this->status = $status;
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $query = Currency::query();
        return $query;
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
            ->searchable()
            ->sortable(),
            Column::make(__('Name'), 'name')
            ->searchable()
            ->sortable(),
            Column::make(__('Code'), 'code')
            ->searchable()
            ->sortable(),
            Column::make(__('Created On'), 'created_at')
            ->searchable()
            ->sortable()
            ->format(function (Currency $model) {
                return date("jS F, Y H:i A", strtotime($model->created_at));
            }),
            Column::make(__('Updated On'), 'updated_at')
            ->searchable()
            ->sortable()
            ->format(function (Currency $model) {
                return date("jS F, Y H:i A", strtotime($model->updated_at));
            }),
            Column::make(__('Actions'))
            ->format(function (Currency $model) {
                return view('backend.currency.includes.actions',['id'=>$model->id]);
            }),
        ];
    }
}
