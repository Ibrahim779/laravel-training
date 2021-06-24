<?php

namespace App\Imports;

use App\Models\Document;
use App\Models\Field;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FormsImport implements ToModel, WithHeadingRow
{
    use Importable;

    private $document;

//    public function __construct(Document $document)
//    {
//        $this->document = $document;
//    }

    public function model(array $row)
    {
        return $row;
    }
}
