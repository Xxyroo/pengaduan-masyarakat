<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index(){
        $pengaduans = Pengaduan::all();
        return view('pengaduan.index', compact('pengaduans'));
    }
    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('pengaduan.detail', compact('pengaduan'));
    }

    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'tgl_pengaduan' => 'required|date',
            'isi_laporan' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:65536', // Contoh validasi untuk file gambar
            'status' => 'required|string',
        ]);

        // Simpan data pengaduan ke dalam database
        $pengaduan = new Pengaduan([
            'tgl_pengaduan' => $request->input('tgl_pengaduan'),
            'user_id' => Auth::user()->id,
            'isi_laporan' => $request->input('isi_laporan'),
            'status' => $request->input('status'),
        ]);

        // Upload dan simpan gambar jika ada
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $pengaduan->foto = $imageName;
        }

        $pengaduan->save();
        return redirect('/pengaduan')->with('success', 'Pengaduan berhasil diajukan');
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->delete();
        return redirect('/pengaduan') ->with('message','Pengaduan berhasil dihapus');
    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('pengaduan.edit', compact('pengaduan'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tgl_pengaduan' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'mimes:jpg,jpeg,png',
            'status' => 'required'
        ]);
            $pengaduan = Pengaduan::find($id);
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);
                $pengaduan->foto = $imageName;
                $pengaduan->update([
                'tgl_pengaduan' => $request->tgl_pengaduan,
                'isi_laporan' => $request->isi_laporan,
                'foto' => $imageName,
                'status' => $request->status
                ]);
            }
            else
            {
                $pengaduan->update([
                'tgl_pengaduan' => $request->tgl_pengaduan,
                'isi_laporan' => $request->isi_laporan,
                'foto' => $request->foto,
                'status' => $request->status
                ]);
            }
            
            return redirect()->route('pengaduan.index')->with('message','Pengaduan berhasil diupdate');
        }

    // Anda dapat menambahkan metode lain seperti edit, update, delete, dll.
    public function laporan(){
        $pengaduans = Pengaduan::all();
        return view('pengaduan.laporan', compact('pengaduans'));
    }
    public function pdf(){
        $pengaduans = Pengaduan::all();
        $pdf = \PDF::loadview ('pengaduan.pdf', compact ('pengaduans'));
        return $pdf->download ('laporan.pdf');

    }
}