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

class ProductsMarketsImport implements ToModel, WithValidation, WithHeadingRow, SkipsOnFailure
{
    use Importable, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $product = Product::find($row['product_id']);
        $product->markets()->attach($row['market_id'], ['price' => $row['precio']]);
    }

    public function rules(): array
    {
        return [
            'precio' => ['required'],
            'market_id' => ['required', 'integer'],
            'product_id' => ['required', 'integer']
        ];
    }
}
