<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>          
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @if ($errors->has('password'))
                <span class="help-block ">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>  
        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="{{ route('login') }}" class="btn btn-secondary">Already have an account? Login</a>
        </div>
    </form>
    <div class="mt-4">
        <p class="text-center text-gray-600">
            {{ __('By registering, you agree to our') }} 
            <a href="{{ route('terms') }}" class="text-blue-500 hover:underline">{{ __('Terms of Service') }}</a> 
            {{ __('and') }} 
            <a href="{{ route('privacy') }}" class="text-blue-500 hover:underline">{{ __('Privacy Policy') }}</a>.
        </p>
</body>
</html>