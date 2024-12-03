<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Account;
use App\Models\Pasien;
use App\Models\Layanan;
use App\Models\Dokter;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this line
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Pembayaran::all();
        $title = 'Home Page / Payment Management';
        $name = 'Payment Management';

        $totalPayments = DB::table('pembayaran')->sum('JumlahPembayaran');

        $latestDate = DB::table('pembayaran')->latest('TanggalPembayaran')->first();
        $latestDate = new \DateTime($latestDate->TanggalPembayaran);

        $countPayments = DB::table('pembayaran')->count();

        return view('payment', compact('title', 'name', 'records', 'totalPayments', 'latestDate', 'countPayments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Home Page / Payment Management / Add New Paymnet';
        $name = 'Payment Management';

        return view('add-payment', compact('title', 'name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'TanggalPembayaran' => 'required|date',
            'JumlahPembayaran' => 'required|numeric',
            'MetodePembayaran' => 'required|string',
            'LayananID' => 'required|string',
            'PasienID' => 'required|string',
        ]);

        Pembayaran::create($request->all());

        return redirect()->route('payment.index')->with('success', 'Payment created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $record)
    {
        $title = 'Home Page / Payment Management / Edit Payment';
        $name = 'Payment Management';
        
        return view('edit-payment', [
            'title' => $title,
            'name' => $name,
            'record' => $record,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $PembayaranID)
    {
        $validated = $request->validate([
            'TanggalPembayaran' => 'required|date',
            'JumlahPembayaran' => 'required|numeric',
            'MetodePembayaran' => 'required|string',
            'LayananID' => 'required|string',
            'PasienID' => 'required|string',
        ]);
    
        $payment = Pembayaran::find($PembayaranID);
    
        if (!$payment) {
            Log::error("Payment with ID $PembayaranID not found.");
            return redirect()->back()->with('error', 'Payment record not found.');
        }
    
        try {
            $payment->update($validated);
            Log::info("Payment updated successfully: ", $validated);
            return redirect()->back()->with('success', 'Payment updated successfully!');
        } catch (\Exception $e) {
            Log::error("Update failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($PembayaranID)
    {
        $deleted = DB::table('pembayaran')->where('PembayaranID', $PembayaranID)->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Payment deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Payment not found or could not be deleted.');
        }
    }

    public function showPaymentMethod()
    {
        if (!session()->has('pending_appointment')) {
            return redirect()->route('appointment.create');
        }
        return view('payment.method');
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'MetodePembayaran' => 'required|in:Online,Cash,Credit,Debit card'
        ]);

        // Get appointment data from session
        $appointmentData = session('pending_appointment');

        // Find the service and get its price
        $service = Layanan::where('NamaLayanan', $appointmentData['NamaLayanan'])->first();
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }

        $user = Auth::user();
        $account = Account::where('email', $user->email)->first();
        $patient = Pasien::where('AccountID', $account->AccountID)->first();
        $doctor = Dokter::where('LayananID', $service->LayananID)->first();

        // Generate payment record first
        $payment = Pembayaran::create([
            'TanggalPembayaran' => now(),
            'JumlahPembayaran' => floatval($service->HargaLayanan), // Convert to float to ensure proper number formatting
            'MetodePembayaran' => $request->MetodePembayaran,
            'LayananID' => $service->LayananID,
            'PasienID' => $patient->PasienID
        ]);

        // Create appointment after payment
        $appointment = Appointment::create([
            'TanggalJanjiTemu' => $appointmentData['TanggalJanjiTemu'],
            'JamJanjiTemu' => $appointmentData['JamJanjiTemu'],
            'DokterID' => $doctor->DokterID,
            'PasienID' => $patient->PasienID,
            'Tujuan' => 'Konsultasi ' . $doctor->Departemen,
            'Status' => 'Ongoing'
        ]);

        // Clear session data
        session()->forget('pending_appointment');

        return redirect()->route('payment.success');
    }

    public function showSuccess()
    {
        return view('payment.success');
    }
}
