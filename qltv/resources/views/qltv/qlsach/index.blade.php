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
                        <div class="mb-2">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('qltv.qls') }}"
                                        class="text-decoration-none">
                                            Quản lý sách
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách sách</li>
                                </ol>
                            </nav>

                            <a href="{{ route('qltv.qls.create') }}"
                            class="btn btn-primary">Thêm sách</a>
                        </div>

                        @if($books->count() > 0)
                            <div>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tên sách</th>
                                            <th scope="col">Ngày tạo</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($books as $book)
                                        <tr>
                                            <td><strong>{{ $loop->iteration }}</strong></td>
                                            <td>{{ $book->name }}</td>
                                            <td>{{ $book->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <div class="actions d-flex gap-4">
                                                    <a href="{{ route('qltv.qls.edit', $book) }}" class="btn btn-warning btn-sm">Sửa</a>
                                                    <form method="POST" action="{{ route('qltv.qls.destroy', $book) }}" style="margin: 0;" onsubmit="return confirm('Bạn có chắc muốn xóa sách này?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tên sách</th>
                                        <th scope="col">Ngày tạo</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="text-center">Không có dữ liệu...</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>