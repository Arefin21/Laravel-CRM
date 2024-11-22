<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function handleGoogleCallback()
    // {
    //     try {
    //         $user = Socialite::driver('google')->stateless()->user();

    //         $existingUser = User::where('google_id', $user->getId)->first();

    //         if (!$existingUser) {
    //             Auth::login($existingUser);
    //         } else {
    //             $newUser = User::create([
    //                 'name' => $user->getName(),
    //                 'email' => $user->getEmail(),
    //                 'google_id' => $user->getId(),
                    
    //             ]);

    //             Auth::login($newUser);
    //         }

    //         return redirect()->route('admin.home');
    //     } catch (\Exception $e) {
    //         return redirect()->route('login');
    //     }
    // }

//     public function handleGoogleCallback()
// {
//     try {
//         $user = Socialite::driver('google')->user(); // Removed stateless() if you haven't already

//         // Log user info for debugging
//         \Log::info('Google User:', [
//             'id' => $user->id,
//             'name' => $user->getName(),
//             'email' => $user->getEmail(),
//         ]);

//         $existingUser = User::where('google_id', $user->id)->first();

//         if ($existingUser) {
//             Auth::login($existingUser);
//         } else {
//             $newUser = User::create([
//                 'name' => $user->getName(),
//                 'email' => $user->getEmail(),
//                 'google_id' => $user->getId(),
//             ]);

//             Auth::login($newUser);
//         }

//         return redirect()->route('admin.home'); // Ensure this route exists and is accessible
//     } catch (\Exception $e) {
//         \Log::error('Google login error:', ['error' => $e->getMessage()]);
//         return redirect()->route('login')->withErrors(['msg' => 'Unable to login using Google']);
//     }
// }



public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

// public function handleGoogleCallback()
// {
//     try {
//         $user = Socialite::driver('google')->user();
        
//         // Check if the user already exists in the database
//         $existingUser = User::where('email', $user->email)->first();

//         if ($existingUser) {
//             // Log the existing user in
//             Auth::login($existingUser);
//         } else {
//             // Create a new user and assign 'is_admin' if necessary
//             $newUser = User::create([
//                 'name' => $user->name,
//                 'email' => $user->email,
//                 'google_id' => $user->id,
//                 'password' => bcrypt('1234'), // Generate a default password
//                 'is_admin' => '1'
//             ]);
            
//             // Log the new user in
//             Auth::login($newUser);
//         }

//         // Redirect to the home page (or wherever you want)
//         return redirect('http://localhost:8000/admin/home'); 
//     } catch (\Exception $e) {
//         \Log::error('Google Login Error: ' . $e->getMessage());
//         return redirect('/login')->with('alert-danger', 'Something went wrong!');
//     }
// }

public function handleGoogleCallback()
{
    try {
        $user = Socialite::driver('google')->user();
        
        // Check if the user already exists in the database
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // Log the existing user in
            Auth::login($existingUser);
        } else {
            // Create a new user and assign 'is_admin' if necessary
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => bcrypt('1234'), // Generate a default password
                'is_admin' => 1,  // Assuming the user is an admin
            ]);
            
            // Log the new user in
            Auth::login($newUser);
        }

        // Check if the logged-in user is an admin and redirect to the appropriate page
        if (Auth::user()->is_admin == 1) {
            return redirect()->route('admin.home'); // Redirect to admin dashboard
        }

        // Redirect to home page or other area for non-admin users
        return redirect()->route('home'); 

    } catch (\Exception $e) {
        \Log::error('Google Login Error: ' . $e->getMessage());
        return redirect('/login')->with('alert-danger', 'Something went wrong!');
    }
}

}
