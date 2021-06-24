<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Form;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        $forms = Form::all();
        return view('dashboard.documents.index', compact('documents', 'forms'));
    }

    public function store(Request $request)
    {
        $this->saveData(new Document, $request);
        return response()->json(['status' => 'success']);
    }

    public function edit(Document $document)
    {
        $forms = $document->forms()->get();
        return response()->json(['status' => 'success', 'document' => $document, 'forms' => $forms]);
    }

    public function update(Document $document, Request $request)
    {
        $this->saveData($document, $request);
        return response()->json(['status' => 'success', 'document' => $document]);
    }

    public function destroy(Document $document)
    {
        $document->deleteForms();
        $document->fields()->detach();
        $document->delete();
    }

    public function saveData($document, $request)
    {

        $document->name = $request->name;
        $document->save();
        $document->deleteForms();
        $document->forms()->attach($request->forms);
        $document->insertFieldsValue($request);

    }
}
