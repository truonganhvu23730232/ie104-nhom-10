<x-layout>
    <x-slot:title>
        Sign in
    </x-slot:title>

    <div>
        <form action="{{ route('auth.signin') }}" method="post">
            @csrf
            <div>
                <label for="username">Username</label>
                <input type="text" name="name" id="">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="">
            </div>

            <input type="submit" value="Sign in">
        </form>

        <div>
            Don't have an account? <span>
                <a href="{{ route('auth.signup') }}">Sign up</a>
            </span>
        </div>
    </div>
</x-layout>