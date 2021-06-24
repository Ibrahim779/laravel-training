<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\FormsExport;
use App\Http\Controllers\Controller;
use App\Imports\FormsImport;
use App\Models\Field;
use App\Models\Form;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FormController extends Controller
{

    public function index()
    {
        $forms = Form::all();
        return view('dashboard.forms.index', compact('forms'));
    }

    public function edit(Form $form)
    {
        $fields = $form->fields()->get();
        return response()->json(['status' => 'success', 'form' => $form, 'fields' => $fields]);
    }

    public function store(Request $request)
    {
        $this->saveData(new Form, $request);
        return response()->json(['status' => 'success']);
    }

    public function update(Form $form, Request $request)
    {
        $this->saveData($form, $request);
        return response()->json(['status' => 'success', 'form' => $form]);
    }

    public function destroy(Form $form)
    {
        $form->fields()->delete();
        $form->delete();
    }

    public function export(Form $form)
    {
       return (new FormsExport($form))->download('forms.xlsx');
    }

    public function import()
    {
        return (new FormsImport)->toArray(storage_path('framework/laravel-excel/fields.xlsx'));
    }

    public function saveData($form, $request)
    {
        $form->name = $request->name;
        $form->fields()->delete();
        $form->save();
        for ($i = 0; $i<count($request->title); $i++){
            $field = new Field;
            $field->form_id = $form->id;
            $field->title = $request->title[$i];
            $field->type = $request->type[$i];
            $field->save();
        }
    }

}
