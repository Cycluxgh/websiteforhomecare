<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard.index');
    }

    public function employee(): View
{
    $apiKey = env('OPENWEATHER_API_KEY');
    if (!$apiKey) {
        // \Log::error('OpenWeather API key is missing');
        $weather = ['description' => 'API Key Missing', 'temp' => 'N/A', 'name' => 'N/A'];
    } else {
        try {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => 'Edinburgh, GB',
                'appid' => $apiKey,
                'units' => 'metric',
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $weather = [
                    'description' => isset($data['weather'][0]['description']) ? ucfirst($data['weather'][0]['description']) : 'N/A',
                    'temp' => isset($data['main']['temp']) ? round($data['main']['temp']) : 'N/A',
                    'name' => isset($data['name']) ? $data['name'] : 'N/A',
                ];
                // \Log::info('OpenWeather API response', $data);
            } else {
                // \Log::error('OpenWeather API request failed', [
                //     'status' => $response->status(),
                //     'body' => $response->body(),
                // ]);
                $weather = ['description' => 'API Error', 'temp' => 'N/A', 'name' => 'N/A'];
            }
        } catch (\Exception $e) {
            // \Log::error('OpenWeather API request exception', ['error' => $e->getMessage()]);
            $weather = ['description' => 'Network Error', 'temp' => 'N/A', 'name' => 'N/A'];
        }
    }
    return view('employee.dashboard.index', compact('weather'));
}
}
