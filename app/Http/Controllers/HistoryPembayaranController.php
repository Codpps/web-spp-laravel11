<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class HistoryPembayaranController extends Controller
{
    public function index()
    {
        // Get all payments with relationships loaded (eager loading)
        $pembayaran = Pembayaran::with(['user', 'siswa', 'spp'])->get();

        return view('admin.history.index', compact('pembayaran'));
    }
}
