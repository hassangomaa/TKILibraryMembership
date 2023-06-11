<?php

namespace App\Repositories;

use App\Models\FormData;

class FormDataRepository
{
    public function create(array $data): FormData
    {
        return FormData::create($data);
    }

    public function findById(int $id): ?FormData
    {
        return FormData::find($id);
    }

    public function update(FormData $form, array $data): bool
    {
        return $form->update($data);
    }

    public function delete(FormData $form): bool
    {
        return $form->delete();
    }
}
