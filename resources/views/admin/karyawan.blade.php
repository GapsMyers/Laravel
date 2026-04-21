<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard CRUD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
        }
    </script>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link href="{{ asset('css/admin-sidebar.css') }}" rel="stylesheet">
</head>

<body class="admin-layout">
    @include('admin.partials.dashboard-sidebar')

    <main class="ml-0 md:ml-64 p-4 p-md-5 bg-white min-vh-100">
                <h2 class="mb-4">CRUD Karyawan</h2>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
                    Tambah Karyawan
                </button>

                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th width="220">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($karyawans as $karyawan)
                            <tr>
                                <td>{{ $karyawan->Nama }}</td>
                                <td>{{ $karyawan->Role }}</td>
                                <td>
                                    @if ($karyawan->status)
                                        <span class="badge text-bg-success">Aktif</span>
                                    @else
                                        <span class="badge text-bg-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $karyawan->id }}">
                                        Edit
                                    </button>

                                    <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <div class="modal fade" id="editModal{{ $karyawan->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('karyawans.update', $karyawan->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Karyawan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label class="form-label">Nama</label>
                                                    <input type="text" name="Nama" class="form-control"
                                                        value="{{ $karyawan->Nama }}" required>
                                                </div>

                                                <div class="mb-2">
                                                    <label class="form-label">Role</label>
                                                    <input type="text" name="Role" class="form-control"
                                                        value="{{ $karyawan->Role }}" required>
                                                </div>

                                                <div class="mb-2">
                                                    <label class="form-label">Status</label>
                                                    <select name="status" class="form-select" required>
                                                        <option value="1" @selected($karyawan->status)>Aktif</option>
                                                        <option value="0" @selected(!$karyawan->status)>Nonaktif</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-success">Update</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada data karyawan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
    </main>

    <div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('karyawans.store') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Karyawan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Nama</label>
                            <input type="text" name="Nama" class="form-control" required>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Role</label>
                            <input type="text" name="Role" class="form-control" required>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="1" selected>Aktif</option>
                                <option value="0">Nonaktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
