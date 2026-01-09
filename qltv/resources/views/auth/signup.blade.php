<x-layout>
    <x-slot:title>
        Sign up
    </x-slot:title>

    <div>
        <form action="{{ route('auth.signup') }}" method="post">
            @csrf
            <div>
                <label for="name">Username</label>
                <input type="text" name="name" id="">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="">
            </div>

            <div>
                <label for="password">Confirm Password</label>
                <input type="password" name="password" id="">
            </div>

            <input type="submit" value="Sign in">
        </form>

        <div>
            Already have an account? <span>
                <a href="{{ route('auth.signin') }}">Sign in</a>
            </span>
        </div>
    </div>
</x-layout>