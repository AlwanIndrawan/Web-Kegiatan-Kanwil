<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'superadmin'){

            $kegiatans = Kegiatan::with('bidang')
                ->orderBy('tanggal','asc')
                ->get();

        } else {

            $kegiatans = Kegiatan::with('bidang')
                ->where('bidang_id', Auth::user()->bidang_id)
                ->orderBy('tanggal','asc')
                ->get();
        }

        return view('kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        if(Auth::user()->role == 'superadmin'){

            $bidangs = Bidang::all();

            return view('kegiatan.create', compact('bidangs'));

        }

        return view('kegiatan.create');
    }

    public function store(Request $request)
    {

        if(Auth::user()->role == 'superadmin'){

            $data = $request->validate([
                'bidang_id' => 'required',
                'judul' => 'required',
                'deskripsi' => 'nullable',
                'tanggal' => 'required|date',
                'foto' => 'image|mimes:jpg,jpeg,png|max:20480'
            ]);

        } else {

            $data = $request->validate([
                'judul' => 'required',
                'deskripsi' => 'nullable',
                'tanggal' => 'required|date',
                'foto' => 'image|mimes:jpg,jpeg,png|max:20480'
            ]);

            $data['bidang_id'] = Auth::user()->bidang_id;
        }

        if ($request->hasFile('foto')) {

            $path = $request->file('foto')->store('kegiatan', 'public');

            $data['foto'] = $path;
        }

        Kegiatan::create($data);

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function edit($id)
    {
        if(Auth::user()->role == 'superadmin'){

            $kegiatan = Kegiatan::findOrFail($id);

            $bidangs = Bidang::all();

            return view('kegiatan.edit', compact('kegiatan','bidangs'));

        } else {

            $kegiatan = Kegiatan::where('bidang_id', Auth::user()->bidang_id)
                ->findOrFail($id);

            return view('kegiatan.edit', compact('kegiatan'));
        }
    }

    public function update(Request $request, $id)
    {

        if(Auth::user()->role == 'superadmin'){

            $request->validate([
                'bidang_id' => 'required',
                'judul' => 'required',
                'deskripsi' => 'required',
                'tanggal' => 'required|date',
                'foto' => 'image|mimes:jpg,jpeg,png|max:20480'
            ]);

            $kegiatan = Kegiatan::findOrFail($id);

            $data = $request->only([
                'bidang_id',
                'judul',
                'deskripsi',
                'tanggal'
            ]);

        } else {

            $request->validate([
                'judul' => 'required',
                'deskripsi' => 'required',
                'tanggal' => 'required|date',
                'foto' => 'image|mimes:jpg,jpeg,png|max:20480'
            ]);

            $kegiatan = Kegiatan::where('bidang_id', Auth::user()->bidang_id)
                ->findOrFail($id);

            $data = $request->only([
                'judul',
                'deskripsi',
                'tanggal'
            ]);
        }

        if ($request->hasFile('foto')) {

            if ($kegiatan->foto) {
                Storage::disk('public')->delete($kegiatan->foto);
            }

            $path = $request->file('foto')->store('kegiatan','public');

            $data['foto'] = $path;
        }

        $kegiatan->update($data);

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil diupdate');
    }

    public function destroy($id)
    {
        if(Auth::user()->role == 'superadmin'){

            $kegiatan = Kegiatan::findOrFail($id);

        } else {

            $kegiatan = Kegiatan::where('bidang_id', Auth::user()->bidang_id)
                ->findOrFail($id);
        }

        if ($kegiatan->foto) {
            Storage::disk('public')->delete($kegiatan->foto);
        }

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus');
    }
}