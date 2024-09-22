<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();

        switch($user->user_type) 
        {
            case 'Student':
                return view('students.dashboard');
                break;

            case 'Teacher':
                return view('teachers.dashboard');
                break;

            case 'Admin':

                $data = [
                    'verifiedTeacherCount' => User::teachers(true)->count(),
                    'unverifiedTeacherCount' => User::teachers(false)->count(),
                    'totalTeacherCount' => User::where('user_type', 'Teacher')->count()
                ];

                return view('admin.dashboard', compact('data'));
                break;
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
