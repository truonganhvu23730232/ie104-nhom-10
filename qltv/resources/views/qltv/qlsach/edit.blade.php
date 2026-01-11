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


    </div>

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
                    <div class="mb-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('qltv.qls') }}"
                                    class="text-decoration-none">
                                        Quản lý sách
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('qltv.qls') }}"
                                    class="text-decoration-none">
                                        Danh sách sách
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Sửa sách</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <form method="POST" action="{{ route('qltv.qls.update', $book) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Tên sách <span style="color: red;">*</span></label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control mb-2"
                            value="{{ old('name', $book->name) }}"
                            placeholder="Nhập tên sách..."
                            required
                            autofocus
                        >
                        @error('name')
                            <span class="error mb-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                        <a href="{{ route('qltv.qls') }}" class="btn btn-danger">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>