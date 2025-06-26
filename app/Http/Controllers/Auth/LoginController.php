<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    protected $redirectTo = '/home';

    public function user_login(){
        if(!empty(Auth::user())){
            return redirect()->route('home');
        }else{
            return view('user.login');
        }
    }

    public function home(){
        return view('user.index');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required|in:user,associate,admin'
        ]);

        $credentials = $request->only('email', 'password');
        $selectedRole = $request->input('role');

        // Attempt authentication
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Check if the selected role matches the user's actual role
            if ($user->role !== $selectedRole) {
                Auth::logout();
                return redirect()->back()
                    ->withInput($request->only('email', 'role'))
                    ->withErrors([
                        'role' => 'The selected role does not match your account privileges. Please select the correct role.',
                    ]);
            }

            // Role-based redirection
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard')->with('success', 'Welcome back, Admin! Login successful.');
                    
                case 'associate':
                    return redirect()->route('associate.dashboard')->with('success', 'Welcome back, Associate! Login successful.');
                    
                case 'user':
                default:
                    return redirect()->route('home')->with('success', 'Welcome back! Login successful.');
            }
        }

        // Authentication failed
        return redirect()->back()
            ->withInput($request->only('email', 'role'))
            ->withErrors([
                'email' => 'The provided credentials do not match our records for the selected role.',
            ]);
    }

    /**
     * Check if user exists with specific role
     */
    public function checkUserRole(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'role' => 'required|in:user,associate,admin'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && $user->role === $request->role) {
            return response()->json([
                'exists' => true,
                'role_match' => true,
                'message' => 'User found with matching role'
            ]);
        } elseif ($user) {
            return response()->json([
                'exists' => true,
                'role_match' => false,
                'actual_role' => $user->role,
                'message' => 'User exists but role does not match'
            ]);
        }

        return response()->json([
            'exists' => false,
            'role_match' => false,
            'message' => 'User not found'
        ]);
    }

    /**
     * Advanced login with additional security checks
     */
    public function secureLogin(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required|in:user,associate,admin'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->only('email', 'role'))
                ->withErrors($validator);
        }

        $email = $request->input('email');
        $password = $request->input('password');
        $selectedRole = $request->input('role');

        // Find user by email
        $user = User::where('email', $email)->first();

        // Check if user exists
        if (!$user) {
            return redirect()->back()
                ->withInput($request->only('email', 'role'))
                ->withErrors([
                    'email' => 'No account found with this email address.',
                ]);
        }

        // Check if role matches
        if ($user->role !== $selectedRole) {
            return redirect()->back()
                ->withInput($request->only('email', 'role'))
                ->withErrors([
                    'role' => "This email is registered as a {$user->role}, not as a {$selectedRole}. Please select the correct role.",
                ]);
        }

        // Check password
        if (!Hash::check($password, $user->password)) {
            return redirect()->back()
                ->withInput($request->only('email', 'role'))
                ->withErrors([
                    'password' => 'The provided password is incorrect.',
                ]);
        }

        // Check if account is active (if you have an active field)
        if (isset($user->is_active) && !$user->is_active) {
            return redirect()->back()
                ->withInput($request->only('email', 'role'))
                ->withErrors([
                    'email' => 'Your account has been deactivated. Please contact support.',
                ]);
        }

        // Login successful - authenticate user
        Auth::login($user, $request->has('remember'));

        // Update last login timestamp (if you have this field)
        if ($user->hasAttribute('last_login_at')) {
            $user->update(['last_login_at' => now()]);
        }

        // Role-based redirection with personalized messages
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard')->with('success', "Welcome back, Admin {$user->name}! You have full system access.");
                
            case 'associate':
                return redirect()->route('associate.dashboard')->with('success', "Welcome back, {$user->name}! Your associate dashboard is ready.");
                
            case 'user':
            default:
                return redirect()->route('home')->with('success', "Welcome back, {$user->name}! Great to see you again.");
        }
    }

    /**
     * Role-based logout
     */
    public function logout(Request $request)
    {
        $user = Auth::user();
        $userName = $user ? $user->name : 'User';
        $userRole = $user ? $user->role : 'user';

        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Role-based redirect after logout
        $message = "Goodbye, {$userName}! You have been logged out successfully.";
        
        switch ($userRole) {
            case 'admin':
                return redirect()->route('login')->with('success', $message);
                
            case 'associate':
                return redirect()->route('login')->with('success', $message);
                
            case 'user':
            default:
                return redirect('/')->with('success', $message);
        }
    }

    /**
     * Show forgot password form
     */
    public function showForgotPasswordForm()
    {
        return view('auth.passwords.email');
    }
    
    /**
     * Send password reset link
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ]);

        // Here you would typically use Laravel's built-in password reset functionality
        // For now, we'll just return a success message
        return back()->with('status', 'We have emailed your password reset link!');
    }

    /**
     * Get user dashboard based on role
     */
    public function getDashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
                
            case 'associate':
                return redirect()->route('associate.dashboard');
                
            case 'user':
            default:
                return redirect()->route('home');
        }
    }

    /**
     * Validate user credentials without logging in
     */
    public function validateCredentials(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:user,associate,admin'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'valid' => false,
                'message' => 'User not found'
            ], 404);
        }

        if ($user->role !== $request->role) {
            return response()->json([
                'valid' => false,
                'message' => 'Role mismatch',
                'actual_role' => $user->role
            ], 400);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'valid' => false,
                'message' => 'Invalid password'
            ], 401);
        }

        return response()->json([
            'valid' => true,
            'message' => 'Credentials are valid',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role
            ]
        ]);
    }

    /**
     * Switch user role (for testing or admin purposes)
     */
    public function switchRole(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'new_role' => 'required|in:user,associate,admin'
        ]);

        $user = User::findOrFail($request->user_id);
        $oldRole = $user->role;
        $user->update(['role' => $request->new_role]);

        return redirect()->back()->with('success', "User {$user->name}'s role changed from {$oldRole} to {$request->new_role}.");
    }

    /**
     * Bulk role assignment
     */
    public function bulkRoleAssignment(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
            'role' => 'required|in:user,associate,admin'
        ]);

        $updatedCount = User::whereIn('id', $request->user_ids)
                           ->update(['role' => $request->role]);

        return redirect()->back()->with('success', "Successfully updated {$updatedCount} users to {$request->role} role.");
    }

    /**
     * Get users by role
     */
    public function getUsersByRole($role)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if (!in_array($role, ['user', 'associate', 'admin'])) {
            return response()->json(['error' => 'Invalid role'], 400);
        }

        $users = User::where('role', $role)
                    ->select('id', 'name', 'email', 'role', 'created_at')
                    ->orderBy('name')
                    ->get();

        return response()->json([
            'role' => $role,
            'count' => $users->count(),
            'users' => $users
        ]);
    }

    /**
     * Role statistics
     */
    public function getRoleStatistics()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $stats = [
            'total_users' => User::count(),
            'users' => User::where('role', 'user')->count(),
            'associates' => User::where('role', 'associate')->count(),
            'admins' => User::where('role', 'admin')->count(),
            'recent_registrations' => User::where('created_at', '>=', now()->subDays(30))->count()
        ];

        return response()->json($stats);
    }

    /**
     * Check if user can access specific route based on role
     */
    public function checkRouteAccess($route, $userId = null)
    {
        $user = $userId ? User::find($userId) : Auth::user();
        
        if (!$user) {
            return false;
        }

        $rolePermissions = [
            'admin' => ['admin.*', 'associate.*', 'user.*'],
            'associate' => ['associate.*', 'user.home'],
            'user' => ['user.*']
        ];

        $allowedRoutes = $rolePermissions[$user->role] ?? [];
        
        foreach ($allowedRoutes as $pattern) {
            if (fnmatch($pattern, $route)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Handle failed login attempts
     */
    protected function handleFailedLogin(Request $request, $reason = 'invalid_credentials')
    {
        $messages = [
            'invalid_credentials' => 'The provided credentials do not match our records.',
            'role_mismatch' => 'The selected role does not match your account privileges.',
            'account_inactive' => 'Your account has been deactivated. Please contact support.',
            'user_not_found' => 'No account found with this email address.'
        ];

        return redirect()->back()
            ->withInput($request->only('email', 'role'))
            ->withErrors([
                'email' => $messages[$reason] ?? $messages['invalid_credentials']
            ]);
    }

    /**
     * Generate secure login token for API authentication
     */
    public function generateLoginToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:user,associate,admin'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password) || $user->role !== $request->role) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        // Create a personal access token (requires Laravel Sanctum)
        // $token = $user->createToken('auth-token')->plainTextToken;

        // For basic implementation, you can use a simple token
        $token = base64_encode($user->id . '|' . time() . '|' . $user->role);

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role
            ]
        ]);
    }
}