<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        $query = Agenda::query()->orderBy('created_at', 'desc');
                       
        // Handle search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('konten', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
            });
        }
        
        $agendas = $query->paginate(9);
        
        return view('agenda.index', compact('agendas'));
    }

    public function show($id)
    {
        $agenda = Agenda::findOrFail($id);

        // Related agendas
        $relatedAgendas = Agenda::where('id', '!=', $id)
                           ->when($agenda->kampanye_id, function ($query) use ($agenda) {
                               // If this agenda has a kampanye, prioritize agendas from same kampanye
                               return $query->where('kampanye_id', $agenda->kampanye_id);
                           })
                           ->latest()
                           ->take(3)
                           ->get();

        return view('agenda.show', compact('agenda', 'relatedAgendas'));
    }
}