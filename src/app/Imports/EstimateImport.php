<?php


namespace OnDezk\Estimate\app\Imports;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use OnDezk\Estimate\App\Models\Local\Area;
use Throwable;

class EstimateImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        // TODO: Implement model() method.
    }
}
