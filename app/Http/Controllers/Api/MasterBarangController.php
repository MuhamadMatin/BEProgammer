<?php

namespace App\Http\Controllers\Api;

use App\Models\MasterBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = MasterBarang::all();

        if ($items->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Items empty',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'items' => $items,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|string|max:255',
            'stock' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $foto = $request->file('foto');
        $fotoPath = $foto->storeAs('foto_barang', $foto->getClientOriginalName(), 'public');

        $tahunBulan = Carbon::now()->format('y/m');

        $lastItem = MasterBarang::latest('id')->first();
        $id = $lastItem ? $lastItem->id + 1 : 1;

        $kode_barang = "BRG/{$tahunBulan}/{$id}";

        $barang = MasterBarang::create([
            'nama_barang' => $request['nama_barang'],
            'kode_barang' => $kode_barang,
            'stock' => $request['stock'],
            'harga' => $request['harga'],
            'foto' => $fotoPath,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Barang created successfully',
            'data' => $barang,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = MasterBarang::find($id);

        if (!$barang) {
            return response()->json([
                'status' => false,
                'message' => 'barang not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'barang' => $barang,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $barang = MasterBarang::find($id);

        if (!$barang) {
            return response()->json([
                'status' => false,
                'message' => 'Barang not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'sometimes|string|max:255',
            'stock' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $foto->storeAs('foto_barang', $foto->getClientOriginalName(), 'public');

            $barang->foto = $fotoPath;
        }

        if ($request['kode_barang']) {
            $barang->kode_barang = $request['kode_barang'];
        }

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'stock' => $request->stock,
            'harga' => $request->harga,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Barang update successfully',
            'data' => $barang,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = MasterBarang::find($id);

        if (!$barang) {
            return response()->json([
                'status' => false,
                'message' => 'barang not found',
            ], 404);
        }

        $barang->delete();

        return response()->json([
            'status' => true,
            'message' => 'barang delete success',
        ], 200);
    }

    public function stock(Request $request, string $id)
    {
        $barang = MasterBarang::find($id);

        if (!$barang) {
            return response()->json([
                'status' => false,
                'message' => 'barang not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'stock' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $barang->update([
            'stock' => $request['stock'],
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Update stock successfully',
        ], 201);
    }

    public function price(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'harga' => 'required|numeric|min:0',
            'tanggal_berlaku' => 'required|date|date_format:d-m-Y',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $query = MasterBarang::whereDate('updated_at', Carbon::createFromFormat('d-m-Y', $request['tanggal_berlaku']))
            ->where('harga', $request['harga'])
            ->get();

        return response()->json([
            'status' => true,
            'data' => $query,
        ], 200);
    }

    public function stockPerDay(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date|date_format:d-m-Y',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $query = MasterBarang::select('nama_barang', 'stock')->whereDate('updated_at', Carbon::createFromFormat('d-m-Y', $request['tanggal']))->get();

        return response()->json([
            'status' => true,
            'data' => $query,
        ], 201);
    }

    public function pricePerDay(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date|date_format:d-m-Y',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $query = MasterBarang::select('nama_barang', 'harga')->whereDate('updated_at', Carbon::createFromFormat('d-m-Y', $request['tanggal']))->get();

        return response()->json([
            'status' => true,
            'data' => $query,
        ], 201);
    }
}
