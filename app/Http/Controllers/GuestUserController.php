<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GuestUserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('profileImage'); // Eager load profile image

        // 🔍 Search
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // 🔽 Filter (jika tidak ada role bisa dihapus)
        if ($request->has('role') && $request->role != '') {
            $query->where('role', $request->role);
        }

        // 📌 Pagination
        $users = $query->paginate(8);
        $users->appends($request->all());

        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'role'     => 'required|in:admin,user',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        // Create user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => $request->role,
        ]);

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $this->uploadProfileImage($user, $request->file('profile_image'));
        }

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::with('profileImage')->findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'role']);
        $data['name'] = strtolower($request->name);

        // Handle password update
        if ($request->filled('password')) {
            $request->validate(['password' => 'min:8|confirmed']);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profileImage) {
                Storage::disk('public')->delete($user->profileImage->file_name);
                $user->profileImage->delete();
            }
            
            // Upload new image
            $this->uploadProfileImage($user, $request->file('profile_image'));
        }

        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Delete all media associated with this user
        foreach ($user->media as $media) {
            if (Storage::disk('public')->exists($media->file_name)) {
                Storage::disk('public')->delete($media->file_name);
            }
            $media->delete();
        }
        
        $user->delete();
        
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }

    /**
     * Helper method to upload profile image
     */
    private function uploadProfileImage(User $user, $file)
    {
        // Simpan file
        $path = $file->store('uploads/users', 'public');

        // Simpan ke tabel media
        Media::create([
            'ref_table'  => 'users',
            'ref_id'     => $user->id,
            'file_name'  => $path,
            'caption'    => 'Profile image for ' . $user->name,
            'mime_type'  => $file->getClientMimeType(),
            'sort_order' => 0,
        ]);
    }

    /**
     * API endpoint to delete profile image (optional)
     */
    public function deleteProfileImage($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->profileImage) {
            Storage::disk('public')->delete($user->profileImage->file_name);
            $user->profileImage->delete();
            
            return redirect()->back()->with('success', 'Foto profil berhasil dihapus.');
        }
        
        return redirect()->back()->with('error', 'Foto profil tidak ditemukan.');
    }
}