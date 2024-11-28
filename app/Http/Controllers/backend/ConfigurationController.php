<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{      
    public function index(){
        $config = Configuration::first();
        return view('backend.configuration.index', compact('config'));
    }

    public function aksi_edit(Request $request){
        $request->validate([
            'title_web' => 'required',
            'phone' => 'required',
            'title_about' => 'required',
            'description_about' => 'required',
            'title_product' => 'required',
            'description_product' => 'required'
        ], [
            'title_web.required' => 'Title Web tidak boleh kosong',
            'phone.required' => 'Phone tidak boleh kosong',
            'title_about.required' => 'Title About tidak boleh kosong',
            'description_about.required' => 'Description About tidak boleh kosong',
            'title_product.required' => 'Title Product tidak boleh kosong',
            'description_product.required' => 'Description Product tidak boleh kosong'
        ]);

        $data = [
            'title_web' => $request->title_web,
            'phone' => $request->phone,
            'title_about' => $request->title_about,
            'description_about' => $request->description_about,
            'title_product' => $request->title_product,
            'description_product' => $request->description_product
        ];

        $dataConfig = Configuration::first();

        if ($dataConfig) {
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $data['logo'] = $this->uploadImage($file);
                $this->hapus_gambar(public_path($dataConfig->logo));
            }
            if ($request->hasFile('file_about')) {
                $file = $request->file('file_about');
                $data['file_about'] = $this->uploadImage($file);
                $this->hapus_gambar(public_path($dataConfig->file_about));
            }
            if ($request->hasFile('file_product')) {
                $file = $request->file('file_product');
                $data['file_product'] = $this->uploadImage($file);
                $this->hapus_gambar(public_path($dataConfig->file_product));
            }
            Configuration::where('id', 1)->update($data);
        }
        
        return redirect()->back();
    }

    protected function uploadImage($file){
        $filename = 'config' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('config'), $filename);
        return 'config/' . $filename;
    }

    protected function hapus_gambar($gambar)
    {
        if (file_exists($gambar)) {
            unlink($gambar);
        }
    }
}
