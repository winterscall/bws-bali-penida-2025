<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function visi_misi()
    {
        return view('public.pages.visi-misi');
    }

    public function tugas_dan_fungsi()
    {
        return view('public.pages.tugas-dan-fungsi');
    }

    public function wilayah_administrasi()
    {
        return view('public.pages.wilayah-administrasi');
    }

    public function struktur_organisasi()
    {
        return view('public.pages.struktur-organisasi');
    }

    public function informasi_kantor()
    {
        return view('public.pages.informasi-kantor');
    }

    public function faq()
    {
        return view('public.pages.faq');
    }
}
