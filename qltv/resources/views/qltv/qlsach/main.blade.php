<x-layout>
    <x-slot:title>
        QLS
    </x-slot:title>

    <div>
        <nav class="d-flex justify-content-between align-items-center border-bottom p-2">
            <h5>Quản lý thư viện công cộng</h5>

            @auth
                <div class="d-flex justify-content-center align-items-center gap-2">
                    <span>{{ ucfirst(Auth::user()->name) }}</span>

                    <form action="{{ route('qltv.auth.signout') }}" method="POST">
                        @csrf
                        <button type="submit"
                        class="btn btn-link text-decoration-none p-0 border-0
                        d-flex justify-content-center align-items-center">
                            <small>Sign out</small>
                        </button>
                    </form>
                </div>
            @endauth
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2 border-end" style="min-height: 100vh;">
                    <ul class="list-group mt-4">
                        <li class="list-group-item border-0">
                            <a href="{{ route('qltv.main') }}"
                            class="text-decoration-none">Dashboard</a>
                        </li>

                        <li class="list-group-item border-0">
                            <a href="{{ route('qltv.qls') }}"
                            class="text-decoration-none">Quản lý sách</a>
                        </li>

                        <li class="list-group-item border-0">
                            <a href="{{ route('qltv.qltg') }}"
                            class="text-decoration-none">Quản lý tác giả</a>
                        </li>

                        <li class="list-group-item border-0">
                            <a href="{{ route('qltv.qltvcc') }}"
                            class="text-decoration-none">Quản lý thư viện</a>
                        </li>
                    </ul>
                </div>
                
                <div class="col-sm-10">
                    <div class="mt-4">
                        <h5>Quản lý sách</h5>

                        <div>
                            content goes here
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>