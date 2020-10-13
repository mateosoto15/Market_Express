<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Notifications\ImportHasFailedNotification;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Validators\Failure;

class ProductsImport implements ToModel, WithValidation, WithHeadingRow, SkipsOnFailure
{
    use Importable, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name' => $row['name'] ?? $row['nombre'] ?? $row['Nombre'] ?? null,
            'description' => $row['descripcion'] ?? $row['description'] ?? $row['Descripcion'] ?? $row['Description'] ?? $row['descripción'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'Nombre' => ['nullable', 'string', 'max:255'],
            'nombre' => ['nullable', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'Descripcion' => ['nullable', 'string'],
            'Description' => ['nullable', 'string'],
            'descripción' => ['nullable', 'string'],
        ];
    }
}
