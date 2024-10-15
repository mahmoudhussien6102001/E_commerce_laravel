<?php
namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserProfileController extends Controller
{
    // Show user profile
    public function show()
    {
        $user = auth()->user();
        return view('website.pages.profiles.profile.show', compact('user'));
    }

    // Edit user profile
    public function edit()
    {
        $user = auth()->user();
        return view('website.pages.profiles.profile.edit', compact('user'));
    }

    // Update user profile
    public function update(Request $request)
    {
        $user = auth()->user();
        
        
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20|unique:users,phone,' . $user->id,
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'image' => 'nullable|image|max:2048'
        ]);
    
      
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
        ]);
    
        
        if ($request->hasFile('image')) {
           
            if ($user->image) {
                $oldImagePath = storage_path('app/public/profiles/' . $user->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
          
            $imageName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('public/profiles', $imageName);
    
           
            $user->update(['image' => $imageName]);
        }
    
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
    

    // Change Password
    public function changePassword(string $username)
    {
        $user = User::where('username', $username)->firstOrFail();
        
        if ($user->id == auth()->user()->id) {
            return view('website.pages.profiles.profile.changePassword', compact('user'));
        } else {
            return redirect()->route('users.changePassword', auth()->user()->id);
        }
    }

    // Update Password
    public function updatePassword(Request $request, string $id)
    {
        dd($request->all());
        $user = User::findOrFail($id);
        try {
            // Check if all required fields are filled
            if(empty($request->old_password) || empty($request->new_password) || empty($request->confirm_new_password)){
                return redirect()->back()->with('fields_are_required', 'All the fields are required to be filled!');
            }
    
            // Check if the old/current password matches the one in the database
            if(!Hash::check($request->old_password, $user->password)){
                return redirect()->back()->with('old_pass_req_not_matching_db', '"Current Password" did not match "the Current Password". Please try again!');
            }
    
            // Check if the new password matches the confirmation
            if($request->confirm_new_password != $request->new_password){
                return redirect()->back()->with('confirm_not_matching_new', '"New Password" did not match "Confirm Password". Please try again!');
            }
    
            // Check if the new password is different from the old password
            if(Hash::check($request->new_password, $user->password)){
                return redirect()->back()->with('new_pass_req_is_matching_old', 'Please choose a new password that is different from your current one.');
            }
    
            // Check if the new password is at least 8 characters long
            if(strlen($request->new_password) < 8){
                return redirect()->back()->with('new_pass_must_8_more_char', 'Password must be at least 8 characters long.');
            }
    
            // If all checks pass, update the password
            $user->password = bcrypt($request->new_password);
            $user->save();
    
            // Redirect to the profile show page with a success message
            return redirect()->route('profile.show', ['id' => $user->id])->with('success', 'Your password has been updated successfully.');
    
        } catch (\Exception $e) {
            // Log the error for debugging (optional)
            \Log::error($e->getMessage());
    
            // Redirect back with an error message if something goes wrong
            return redirect()->route('profile.changePassword')->with('error', 'Something went wrong!');
        }
    
        // Fallback redirect (should not be necessary)
        return redirect()->route('profile.changePassword')->with('error', 'Unable to change password.');
    }
    
    
}
