<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EntryRequest;
use App\Models\Entry;
class EntryController extends Controller
{

     public function index(Request $request)
    {
        return Entry::latest()->paginate(10);
    }

    public function store(EntryRequest $request)
    {
        return Entry::create($request->validated());
    }

    public function update(EntryRequest $request, Entry $entry)
    {
        $entry->update($request->validated());
        return $entry;
    }

    public function destroy(Entry $entry)
    {
        $entry->delete();
        return response()->noContent();
    }
}
