<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\DataQueuing;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QueueController extends Controller
{
    // Menampilkan QR Code untuk scan oleh customer
    public function showQRCode()
    {
        $url = route('ambil-tiket.form');
        $qrCode = QrCode::size(300)->generate($url);

        return view('queue.qrcode', compact('qrCode'));
    }

    // Form Pengambilan Tiket
    public function showFormPengambilanTiket()
    {
        return view('queue.form_pengambilan_tiket');
    }

    // Proses Pengambilan Tiket
    public function submitFormPengambilanTiket(Request $request)
    {
        $request->validate([
            'no_polisi' => 'required|string',
            'jenis_antrian' => 'required|in:GR,BP',
        ]);

        // Cek apakah customer sudah ada
        $customer = Customer::where('no_polisi', $request->no_polisi)->first();

        if (!$customer) {
            // Jika tidak ada, minta customer mengisi data
            return redirect()->route('customer.create')->withInput($request->only('no_polisi', 'jenis_antrian'));
        }

        // Buat nomor antrian
        $nomorAntrian = $this->generateQueueNumber($request->jenis_antrian);

        // Simpan data antrian
        $dataQueue = DataQueuing::create([
            'customer_id' => $customer->id,
            'jenis_antrian' => $request->jenis_antrian,
            'nomor_antrian' => $nomorAntrian,
            'status' => 'menunggu',
            'waktu_ambil' => now(),
        ]);

        return view('queue.ticket', compact('dataQueue'));
    }

    // Form Input Data Customer Baru
    public function showFormInputCustomerData(Request $request)
    {
        $no_polisi = old('no_polisi', $request->no_polisi);
        $jenis_antrian = old('jenis_antrian', $request->jenis_antrian);

        return view('queue.form_input_customer_data', compact('no_polisi', 'jenis_antrian'));
    }

    // Proses Input Data Customer Baru
    public function submitCustomerData(Request $request)
    {
        $request->validate([
            'no_polisi' => 'required|string',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'jenis_antrian' => 'required|in:GR,BP',
        ]);

        // Simpan data customer baru
        $customer = Customer::create($request->only('no_polisi', 'nama', 'alamat', 'no_hp'));

        // Buat nomor antrian
        $nomorAntrian = $this->generateQueueNumber($request->jenis_antrian);

        // Simpan data antrian
        $dataQueue = DataQueuing::create([
            'customer_id' => $customer->id,
            'jenis_antrian' => $request->jenis_antrian,
            'nomor_antrian' => $nomorAntrian,
            'status' => 'menunggu',
            'waktu_ambil' => now(),
        ]);

        return view('queue.ticket', compact('dataQueue'));
    }

    // Generate Nomor Antrian
    private function generateQueueNumber($jenis_antrian)
    {
        $latestQueue = DataQueuing::where('jenis_antrian', $jenis_antrian)
            ->whereDate('created_at', now()->toDateString())
            ->orderBy('nomor_antrian', 'desc')
            ->first();

        if ($latestQueue) {
            return $latestQueue->nomor_antrian + 1;
        } else {
            return 1;
        }
    }

    // Form Pemanggilan Antrian
    public function showFormPemanggilanAntrian()
    {
        $admin = Auth::user();
        $department = $admin->masterLoginAdmin->department;

        $nextQueue = DataQueuing::where('jenis_antrian', $department)
            ->where('status', 'menunggu')
            ->orderBy('nomor_antrian', 'asc')
            ->first();

        return view('queue.form_pemanggilan_antrian', compact('nextQueue'));
    }

    // Proses Pemanggilan Antrian
    public function submitFormPemanggilanAntrian(Request $request)
    {
        $request->validate([
            'queue_id' => 'required|exists:data_queuings,id',
        ]);

        $queue = DataQueuing::findOrFail($request->queue_id);
        $queue->update([
            'status' => 'dipanggil',
            'waktu_panggil' => now(),
        ]);

        return redirect()->route('panggil-antrian.form')->with('success', 'Antrian ' . $queue->nomor_antrian . ' telah dipanggil.');
    }

    // Laporan Rekap Pemanggilan Antrian
    public function showLaporan()
    {
        $admin = Auth::user();
        $department = $admin->masterLoginAdmin->department;
    
        // Ambil antrian berdasarkan department
        $queues = DataQueuing::where('jenis_antrian', $department)
            ->orderBy('waktu_ambil', 'desc')
            ->get();
    
        // Ambil semua data antrian
        $allQueues = DataQueuing::all();
    
        // Kirim data ke view
        return view('queue.laporan', compact('queues', 'allQueues'));
    }

public function formatTimeAgo($time)
{
    return Carbon::parse($time)->diffForHumans();
}


public function showCustomers()
{
    // Ambil semua data customer
    $customers = Customer::all();

    return view('queue.data_customers', compact('customers'));
}


}
