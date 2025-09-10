<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;
use App\Models\PolicyConsent;
use Illuminate\Support\Facades\Auth;

class PolicyConsentController extends Controller
{

    public function index()
    {
        $policyConsents = PolicyConsent::with(['user', 'policy'])->paginate(10);

        return view('admin.policies.policy_consents.index', compact('policyConsents'));
    }


    public function store(Request $request, Policy $policy)
    {
        // Ensure only employees can consent
        if (Auth::user()->role !== 'employee') {
            return redirect()->back()->with('error', 'Only employees can consent to policies.');
        }

        // Check if the user has already consented to this policy
        if ($policy->consents()->where('user_id', Auth::id())->exists()) {
            return redirect()->back()->with('info', 'You have already consented to this policy.');
        }

        // Create the consent record
        PolicyConsent::create([
            'user_id' => Auth::id(),
            'policy_id' => $policy->id,
        ]);

        return redirect()->back()->with('success', 'Thank you for acknowledging the policy!');
    }
}
