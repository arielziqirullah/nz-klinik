<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Database\Capsule\Manager as DB;
use App\Helpers\TelegramBot;
use App\Models\Complaint;
use Carbon\Carbon;
use App\Models\Slider;
use App\Models\Dentist;
use App\Models\Product;
use App\Models\Category;

class FrontEndController extends Controller
{
    public function beranda()
    {
        return view('front.home',[
            'current_page' => 'beranda',
            'slider' => Slider::orderBy('id', 'desc')->limit(3)->get(),
            'layanan' => Dentist::orderBy('id', 'desc')->limit(4)->get(),
            'produk' => Product::orderBy('id', 'desc')->limit(6)->get(),
        ]);
    }

    public function layanan()
    {
        return view('front.layanan', [
            'current_page' => 'layanan',
            'layanan' => Dentist::latest()->paginate(6)
        ]);
    }

    public function profil()
    {
        return view('front.profil', ['current_page' => 'profile_dokter']);
    }

    public function lokasi()
    {
        return view('front.lokasi', ['current_page' => 'lokasi']);
    }

    public function daftarPasien()
    {
        return view('front.daftar_pasien', ['current_page' => 'daftar_pasien']);
    }

    public function catalog(Request $request)
    {
        $products = Product::query();

        if (!empty($request->input('search'))) {
            $products->where('name', 'like', '%' . $request->input('search') . '%');
        }

        if (!empty($request->input('category'))) {
            $products->whereHas('categories', function($query) use($request) {
                return $query->where('categories.id', $request->input('category'));
            });
        }

        return view('front.catalog', [
            'current_page' => 'catalog',
            'categories' => Category::with('products')->get(),
            'products' => $products->latest()->paginate(6),
        ]);
    }

    public function daftarProcess(Request $request)
    {

        $validator = $this->validate($request, [
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'no_wa' => 'required',
            'keluhan' => 'required'
        ]);

        $patient = Patient::create([
            'name' => $validator['nama'],
            'birth_place' => $validator['tempat_lahir'],
            'birth_date' => $validator['tgl_lahir'],
            'gender' => $validator['jenis_kelamin'],
            'address' => $validator['alamat'],
            'profession' => $validator['pekerjaan'],
            'phone' => $validator['no_wa'],
        ]);

        $id = $patient['id'];

        foreach($validator['keluhan'] as $value){
            $complaints = Complaint::create([
                'name' => $value,
                'patient_id' => $patient['id']
            ]);
        }

        $age = Carbon::parse($validator['tgl_lahir'])->diff(\Carbon\Carbon::now())->format('%y Tahun, %m Bulan');
        $phone = ltrim($validator['no_wa'], '0');
        $nowa = '+62' . $phone;

        $patient = [
            'nama' => $validator['nama'],
            'umur' => $age,
            'nomor' => $nowa,
            'jenis_kelamin' => $validator['jenis_kelamin'],
            'alamat' => $validator['alamat'],
            'keluhan' => $validator['keluhan']
        ];

        TelegramBot::pushMessage($patient);

        session()->flash('message', 'Terima kasih telah mendaftar di NZ Dental Care, kami akan segera menghubungi anda melalui WhatsApp.');

        return redirect()->route('daftar');

    }
}
