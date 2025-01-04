<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $feeds = Feed::with('user', 'attachments')->latest()->get();

        return Inertia::render('Dashboard', [
            'feeds' => $feeds,
        ]);
    }
}
