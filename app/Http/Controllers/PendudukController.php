<?php
namespace App\Http\Controllers;


use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class PendudukController extends Controller{
    
    public function __construct()
    {
        
    }

    public function get()
    {
        $data = Penduduk::get();
        return response()->json($data);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            // 'foto'=>'file',
            'nokk'=>'required',
            'nik'=>'required',
            'nama'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
            'pekerjaan'=>'required',
            'status'=>'required',
        ]);

        if($request->file('foto')){
            $name = time().$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('uploads',$name);

            $foto = url('uploads'.'/'.$name);
            $nokk = $request->nokk;
            $nik = $request->nik;
            $nama = $request->nama;
            $alamat = $request->alamat;
            $no_telp = $request->no_telp;
            $pekerjaan = $request->pekerjaan;
            $status = $request->status;
        }else{
            $foto = 'default.png';
            $nokk = $request->nokk;
            $nik = $request->nik;
            $nama = $request->nama;
            $alamat = $request->alamat;
            $no_telp = $request->no_telp;
            $pekerjaan = $request->pekerjaan;
            $status = $request->status;
        }

        $add = Penduduk::create([
            'foto'=> $foto,
            'nokk'=> $nokk,
            'nik'=> $nik,
            'nama'=> $nama,
            'alamat'=> $alamat,
            'no_telp'=> $no_telp,
            'pekerjaan'=> $pekerjaan,
            'status'=> $status,
        ]);

        if($add)
        {
            return response()->json([
                'status'=>"Berhasil menambahkan data penduduk",
                'data'=>$add
            ]);
        }else{
            return response()->json([
                'status' => "Gagal menambahkan data penduduk",
                'data'=>null
            ]);
        }
    }


    public function update (Request $request, $id)
    {
        $this->validate($request, [
            'foto' => 'required',
            'nokk'=>'required',
            'nik'=>'required',
            'nama'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
            'pekerjaan'=>'required',
            'status'=>'required',
        ]);

        $foto = $request->foto;
        $nokk = $request->nokk;
        $nik = $request->nik;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $no_telp = $request->no_telp;
        $pekerjaan = $request->pekerjaan;
        $status = $request->status;

        $penduduk = Penduduk::find($id);

        $update = $penduduk->update([
            'foto'=> $foto,
            'nokk'=> $nokk,
            'nik'=> $nik,
            'nama'=> $nama,
            'alamat'=> $alamat,
            'no_telp'=> $no_telp,
            'pekerjaan'=> $pekerjaan,
            'status'=> $status,
        ]);

        if($update)
        {
            return response()->json([
                'status'=>"Berhasil mengubah data penduduk",
                'data'=>$penduduk
            ]);
        }else{
            return response()->json([
                'status' => "Gagal mengubah data penduduk",
                'data'=>null
            ]);
        }

    }


    public function delete($id)

    {
        $penduduk = Penduduk::find($id);
        $delete = $penduduk->delete();

        if($delete)
        {
            return response()->json([
                'status'=>"Berhasil mengubah data penduduk",
                'data'=>$delete
            ]);
        }else{
            return response()->json([
                'status' => "Gagal mengubah data penduduk",
                'data'=>null
            ]);
        }
    }



}






?>