<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FriendController extends Controller
{
    public function index()
    {
        return Inertia::render('Friends/Index', [
            'friends' => auth()->user()->friends()->get(),
        ]);
    }

    public function requestFriends()
    {
        return Inertia::render('Friends/RequestFriends', [
            'requestFriends' => auth()->user()->receivedPendingFriendRequests()->get(),
        ]);
    }

    public function potentialFriends()
    {
        if (auth()->guest()) {
            return [];
        }

        return auth()->user()->potentialFriends(auth()->id())->latest()->limit(3)->get();
    }

    public function request(Request $request, User $friend)
    {
        auth()->user()->fromPendingFriendRequests()->syncWithoutDetaching($friend->id);

        return back();
    }

    public function accept(User $friend)
    {
        abort_if($friend->fromPendingFriendRequests()->where('to', auth()->id())->doesntExist(), 404);

        $friend->fromPendingFriendRequests()->updateExistingPivot(auth()->id(), [
            'accepted_at' => now(),
        ]);

        return back();
    }
}
