<x-layout>
    <x-slot:title>
        Main
    </x-slot:title>

    <div>
        <nav>
            @auth
                <span>{{ Auth::user()->name }}</span>
                
                <form action="{{ route('qltv.auth.signout') }}" method="POST">
                    @csrf
                    <input type="submit" value="Sign out">
                </form>
            @endauth
        </nav>

        <h1>Quản lý thư viện công cộng</h1>
    </div>
</x-layout>