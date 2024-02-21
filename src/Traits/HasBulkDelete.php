<?php

namespace AnuzPandey\LaravelLivewireTablesHelper\Traits;

trait HasBulkDelete
{
    public function bulkDelete(): void
    {
        $this->model::whereIn('id', $this->getSelected())->delete();

        $this->clearSelected();
    }
}
