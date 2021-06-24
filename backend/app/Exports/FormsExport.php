<?php

namespace App\Exports;

use App\Models\Form;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class FormsExport implements FromCollection
{
    use Exportable;

    protected $form;

    public function __construct(Form $form)
    {
        return $this->form = $form;
    }

    public function collection()
    {
        return $this->form->fields()->select('title')->get();
    }
}
