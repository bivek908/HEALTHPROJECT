<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

use App\Models\Professional;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::orderBy('name', 'asc')->get();

        return view('barang.barang', [
            'barang' => $barang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  $professional = Professional::orderBy('name', 'asc')->get();
	 	$uid = Auth::user()->id_user; 
        return view('barang.barang-add', [
            'professional' => $professional,'uid' => $uid
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100|unique:barangs',
            'healthcare_professional_id' => 'required',
            'appointment_start_time' => 'required',
            'appointment_end_time' => 'required',
           
            'note' => 'required',
        ]);

        $barang = Barang::create($request->all());

        Alert::success('Success', 'Appoinment has been saved !');
        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_barang)
    {
		
		
		$professional = Professional::orderBy('name', 'asc')->get();
	 	$uid = Auth::user()->id_user; 
        $barang = barang::findOrFail($id_barang);

        return view('barang.barang-edit', [
            'barang' => $barang, 'professional' => $professional,'uid' => $uid
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_barang)
    {
        $validated = $request->validate([
            'name' => 'required|max:100|unique:barangs,name,' . $id_barang . ',id_barang',
            
            'healthcare_professional_id' => 'required',
            'appointment_start_time' => 'required',
            'appointment_end_time' => 'required',
             'status' => 'required',
            'note' => 'required',
        ]);

        $barang = Barang::findOrFail($id_barang);
        $barang->update($validated);

        Alert::info('Success', 'Appoinment has been updated !');
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_barang)
    {
        try {
            $deletedbarang = Barang::findOrFail($id_barang);

            $deletedbarang->delete();

            Alert::error('Success', 'Appoinment has been deleted !');
            return redirect('/barang');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Appoinment already used !');
            return redirect('/barang');
        }
    }
}
