<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KhojController extends Controller
{

    public function index()
    {
        return view('khoj.index');
    }

    // public function search(Request $request)
    // {
    //     $inputValues = $request->input('input_values');
    //     $searchValue = $request->input('search_value');

    //     $inputValuesArray = explode(',', $inputValues);
    //     rsort($inputValuesArray);

    //     // Store the input values
    //     $searchInput = new SearchInput();
    //     $searchInput->user_id = auth()->id();
    //     $searchInput->input_values = implode(',', $inputValuesArray);
    //     $searchInput->timestamp = now();
    //     $searchInput->save();

    //     // Check if search value exists
    //     $isPresent = in_array($searchValue, $inputValuesArray);

    //     return view('khoj.result', compact('isPresent'));
    // }
    public function search(Request $request)
    {
        $inputValues = explode(',', $request->input('input_values'));
        $searchValue = $request->input('search_value');

        $sortedInputValues = collect($inputValues)->map(function ($value) {
            return (int) $value;
        })->sortDesc()->toArray();

        $isPresent = in_array((int) $searchValue, $sortedInputValues);

        return view('khoj.result', compact('isPresent'));
    }

}
