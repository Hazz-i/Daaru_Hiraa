<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnnouncementResource;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\RollCallResource;
use App\Models\Announcement;
use App\Models\Notification;
use App\Models\RollCall;
use App\Models\user;
use App\Http\Requests\StoreuserRequest;
use App\Http\Requests\UpdateuserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = RollCall::query();
        $notification = Notification::query();
        $announcement = Announcement::query();
        $userId = auth()->user()->id;

        
        $rollCalls = $query->where('user_id', $userId)->get();
        $notifications = $notification->where('user_id', $userId)->get();
        $announcements = $announcement->get();
        // ->paginate(10)
        // ->onEachSide(1);

        
        return inertia('Member/Index', [
            "rollCalls" => RollCallResource::collection($rollCalls),
            "notifications" => NotificationResource::collection($notifications),
            "announcements" => AnnouncementResource::collection($announcements),
            // dd(AnnouncementResource::collection($announcements)),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreuserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateuserRequest $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }
}
