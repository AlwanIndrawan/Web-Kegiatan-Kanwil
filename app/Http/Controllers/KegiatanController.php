<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
        public function index()
    {
        $kegiatans = Kegiatan::with('bidang')->latest()->get();
        return view('kegiatan.index', compact('kegiatans'));
    }
    public function create()
    {
        $bidangs = Bidang::all();
        return view('kegiatan.create', compact('bidangs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'bidang_id' => 'required',
            'judul' => 'required',
            'tanggal' => 'required',
            'foto' => 'image|mimes:jpg,jpeg,png|max:20480'
        ]);

        if ($request->hasFile('foto')) {

            $path = $request->file('foto')->store('kegiatan', 'public');

            $data['foto'] = $path;
        }

        Kegiatan::create($data);

        return redirect()->route('kegiatan.index')
            ->with('success','Kegiatan berhasil ditambahkan');
    }

        public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $bidangs = Bidang::all();
        return view('kegiatan.edit', compact('kegiatan', 'bidangs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bidang_id' => 'required',
            'judul' => 'required',
            'tanggal' => 'required'
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil diupdate');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus');
    }
}
