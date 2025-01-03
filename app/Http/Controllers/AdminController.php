<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Melihat daftar member yang belum disetujui
    public function viewPendingMembers()
    {
        $pendingMembers = User::where('status', 'pending')->get();
        return view('admin.pending_members', compact('pendingMembers'));
    }

    // Menyetujui member atau menghapus member
    public function approveOrDeleteMember($id, $action)
    {
        $member = User::findOrFail($id);

        if ($action == 'approve') {
            $member->status = 'approved';
        } elseif ($action == 'delete') {
            $member->delete();
        }

        $member->save();
        return redirect()->route('admin.pending_members');
    }

    // Memberikan hak akses admin kepada member
    public function transferAdminRights($id)
    {
        $member = User::findOrFail($id);
        $member->role = 'admin';  // Update role to admin
        $member->save();
        return redirect()->route('admin.pending_members');
    }
}