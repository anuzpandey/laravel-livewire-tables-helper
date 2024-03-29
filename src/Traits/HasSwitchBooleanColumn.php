<?php

namespace AnuzPandey\LaravelLivewireTablesHelper\Traits;

trait HasSwitchBooleanColumn
{
    public function toggle(int $id, string $columnName = 'disabled_at'): void
    {
        $model = $this->model::find($id);

        $model->{$columnName} === null
            ? $model->update([$columnName => now()])
            : $model->update([$columnName => null]);

        // check if property exists in the component
        if (property_exists($this, 'dispatchToggleNotification') && $this->dispatchToggleNotification === true) {
            $notificationMessage = $model->{$columnName} === null
                ? 'The record has been disabled successfully!'
                : 'The record has been enabled successfully!';

            $this->dispatch('livewire_notify', $notificationMessage);
        }
    }
}
