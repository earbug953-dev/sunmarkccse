<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSettingsController extends Controller
{
    // ── Show settings page ──
    public function index()
    {
        $user = User::where('id',Auth::id())->first();
        $gateways = PaymentGateway::orderBy('sort_order')->get();
        return view('admin.settings', compact('gateways','user'));
    }

    // ── Store new gateway ──
    public function storeGateway(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:100',
            'symbol'         => 'nullable|string|max:20',
            'network'        => 'nullable|string|max:50',
            'wallet_address' => 'required|string|max:500',
            'qr_code'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $qrPath = null;
        if ($request->hasFile('qr_code')) {
            $qrPath = $request->file('qr_code')->store('gateways', 'public');
        }

        PaymentGateway::create([
            'name'           => $request->name,
            'symbol'         => strtoupper($request->symbol ?? ''),
            'network'        => $request->network,
            'wallet_address' => $request->wallet_address,
            'qr_code'        => $qrPath,
            'active'         => $request->has('active') ? 1 : 0,
            'sort_order'     => PaymentGateway::max('sort_order') + 1,
        ]);

        return back()->with('success', '✅ Payment gateway added successfully!');
    }

    // ── Update existing gateway ──
    public function updateGateway(Request $request, PaymentGateway $gateway)
    {
        $request->validate([
            'name'           => 'required|string|max:100',
            'symbol'         => 'nullable|string|max:20',
            'network'        => 'nullable|string|max:50',
            'wallet_address' => 'required|string|max:500',
            'qr_code'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $qrPath = $gateway->qr_code;
        if ($request->hasFile('qr_code')) {
            $qrPath = $request->file('qr_code')->store('gateways', 'public');
        }

        $gateway->update([
            'name'           => $request->name,
            'symbol'         => strtoupper($request->symbol ?? ''),
            'network'        => $request->network,
            'wallet_address' => $request->wallet_address,
            'qr_code'        => $qrPath,
            'active'         => $request->has('active') ? 1 : 0,
        ]);

        return back()->with('success', '✅ Gateway updated successfully!');
    }

    // ── Toggle active status ──
    public function toggleGateway(PaymentGateway $gateway)
    {
        $gateway->update(['active' => !$gateway->active]);
        return back()->with('success', '✅ Gateway ' . ($gateway->active ? 'enabled' : 'disabled') . '.');
    }

    // ── Delete gateway ──
    public function destroyGateway(PaymentGateway $gateway)
    {
        $gateway->delete();
        return back()->with('success', '✅ Gateway deleted.');
    }
}
