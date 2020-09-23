<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
/**
 * clase para el manejo de invitados
 */
class GuestController extends Controller
{
    //
    public function index()
    {
        $entries =Entry::with('user')
                    ->orderByDesc('created_at')
                    ->orderByDesc('id')
                    ->paginate(10);
        return view('welcome',compact('entries'));
    }

    public function show(Entry $entryBySlug)
    {
        return view('entries.show', [
            'entry'=>$entryBySlug
        ]);
    }
}
