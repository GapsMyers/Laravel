<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>User Management | InvenTrack</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-surface": "#1a1c1c",
                        "surface-container": "#eeeeed",
                        "surface": "#f9f9f8",
                        "on-secondary": "#ffffff",
                        "on-primary-container": "#eeefff",
                        "on-primary-fixed": "#00174b",
                        "error-container": "#ffdad6",
                        "surface-container-high": "#e8e8e7",
                        "on-secondary-container": "#57657a",
                        "on-secondary-fixed": "#0d1c2e",
                        "surface-tint": "#0053db",
                        "on-primary-fixed-variant": "#003ea8",
                        "error": "#ba1a1a",
                        "inverse-surface": "#2f3130",
                        "tertiary": "#784b00",
                        "on-tertiary-fixed": "#2a1700",
                        "on-error-container": "#93000a",
                        "on-error": "#ffffff",
                        "primary-fixed": "#dbe1ff",
                        "on-tertiary-fixed-variant": "#653e00",
                        "on-tertiary": "#ffffff",
                        "primary": "#004ac6",
                        "surface-variant": "#e2e2e2",
                        "inverse-on-surface": "#f1f1f0",
                        "tertiary-fixed-dim": "#ffb95f",
                        "background": "#f9f9f8",
                        "outline": "#737686",
                        "on-surface-variant": "#434655",
                        "on-primary": "#ffffff",
                        "surface-bright": "#f9f9f8",
                        "on-tertiary-container": "#ffeedd",
                        "secondary-container": "#d5e3fc",
                        "surface-container-lowest": "#ffffff",
                        "secondary-fixed-dim": "#b9c7df",
                        "outline-variant": "#c3c6d7",
                        "tertiary-fixed": "#ffddb8",
                        "surface-container-low": "#f4f4f3",
                        "primary-container": "#2563eb",
                        "inverse-primary": "#b4c5ff",
                        "on-secondary-fixed-variant": "#3a485b",
                        "surface-dim": "#dadad9",
                        "surface-container-highest": "#e2e2e2",
                        "secondary-fixed": "#d5e3fc",
                        "secondary": "#515f74",
                        "tertiary-container": "#996100",
                        "primary-fixed-dim": "#b4c5ff",
                        "on-background": "#1a1c1c"
                    },
                    fontFamily: {
                        "headline": ["Inter"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>

    <link href="{{ asset('css/admin-inventory.css') }}" rel="stylesheet">
</head>

<body class="bg-surface text-on-surface">
    @include('admin.partials.dashboard-sidebar')

    <header
        class="fixed top-0 right-0 left-0 md:left-64 h-16 z-40 bg-white/80 dark:bg-zinc-900/80 backdrop-blur-xl flex items-center justify-between px-4 md:px-8 w-full shadow-sm shadow-zinc-200/50 dark:shadow-none font-sans text-sm tracking-tight">
        <div class="flex items-center gap-4 flex-1">
            <div class="relative w-full max-w-md">
                <span
                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400 text-lg">search</span>
                <input
                    class="w-full bg-zinc-100/50 dark:bg-zinc-800/50 border-none rounded-lg pl-10 pr-4 py-2 text-xs focus:ring-2 focus:ring-blue-500/20 transition-all outline-none"
                    placeholder="Search users, roles, or status..." type="text" />
            </div>
        </div>
        <div class="flex items-center gap-6">
            <button
                class="relative text-zinc-500 hover:bg-zinc-50 dark:hover:bg-zinc-800/50 p-2 rounded-full transition-all active:scale-95 duration-200"
                type="button">
                <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
            </button>
            <div class="flex items-center gap-3 pl-4 border-l border-zinc-100">
                <div class="text-right">
                    <p class="text-[13px] font-semibold text-zinc-900 dark:text-zinc-100">Admin User</p>
                    <p class="text-[11px] text-zinc-500">User Management</p>
                </div>
                <div class="w-9 h-9 rounded-full bg-zinc-200 overflow-hidden ring-2 ring-zinc-50">
                    <img alt="User Avatar" class="w-full h-full object-cover"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCDJwaVrA-7DwWozhwqc0pwb_rXqklAG5Xi4i04gNgIoeydoksXuwDiuO48jwuE6_gURVlExt1VNJd_ApaiB2M4NF_Mmi0h35LuDA0owM4V_X9EyLt4gRccZD0QRNWl0i0jfXUUGtfq3HbIaiesnHDPxbCnEI4g7T9tWWwX52_2E98TLtM0p_ZrTf3xzWnCRpDS51GAYEvjkIjIt1Xd1YM9nweTtzAcxM42RZ4qY9NcRcfo_KyrPJwq_VQPPa8RIGJOWufIUkU9nYMn" />
                </div>
            </div>
        </div>
    </header>

    <main class="ml-0 md:ml-64 pt-16 min-h-screen bg-surface">
        <div class="p-10 max-w-7xl ml-0 mr-auto">
            @if (session('success'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
                <div>
                    <span class="text-[11px] font-bold tracking-[0.15em] text-blue-600 uppercase mb-2 block">Admin
                        Console</span>
                    <h2 class="text-5xl font-black tracking-tight text-on-surface leading-none">Users</h2>
                    <p class="text-on-surface-variant mt-4 max-w-md text-sm leading-relaxed">
                        Kelola data karyawan, role, dan status aktif/nonaktif dengan tampilan konsisten.
                    </p>
                </div>
                <button data-modal-open="create-modal"
                    class="px-6 py-3 rounded-lg bg-gradient-to-br from-primary to-primary-container text-white font-semibold text-sm shadow-lg shadow-primary/20 hover:shadow-primary/30 transition-all active:scale-95 flex items-center gap-2"
                    type="button">
                    <span class="material-symbols-outlined text-lg">add</span>
                    Tambah Karyawan
                </button>
            </div>

            <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm shadow-zinc-200/50">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-surface-container-low text-on-surface-variant uppercase text-[10px] font-bold tracking-[0.1em]">
                            <th class="px-8 py-5">Nama</th>
                            <th class="px-6 py-5">Email</th>
                            <th class="px-6 py-5">Role</th>
                            <th class="px-6 py-5">Status</th>
                            <th class="px-8 py-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-container-high">
                        @forelse ($karyawans as $karyawan)
                            @php
                                if ($karyawan->status) {
                                    $statusLabel = 'Aktif';
                                    $statusClass = 'text-emerald-600 bg-emerald-50';
                                    $statusDotClass = 'bg-emerald-500';
                                } else {
                                    $statusLabel = 'Nonaktif';
                                    $statusClass = 'text-zinc-600 bg-zinc-100';
                                    $statusDotClass = 'bg-zinc-500';
                                }
                            @endphp

                            <tr class="group hover:bg-surface-container-low transition-all">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-10 h-10 rounded bg-zinc-100 flex items-center justify-center text-zinc-400">
                                            <span class="material-symbols-outlined">person</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-on-surface">{{ $karyawan->Nama }}</p>
                                            <p class="text-[11px] text-on-surface-variant">ID: {{ $karyawan->id }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-sm text-on-surface-variant">
                                    {{ $karyawan->Email }}
                                </td>
                                <td class="px-6 py-6">
                                    <span
                                        class="text-xs font-medium text-on-secondary-container bg-secondary-container/30 px-3 py-1 rounded-full">{{ $karyawan->Role }}</span>
                                </td>
                                <td class="px-6 py-6">
                                    <span
                                        class="inline-flex items-center gap-1.5 text-[11px] font-bold px-2.5 py-1 rounded-full {{ $statusClass }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $statusDotClass }}"></span>
                                        {{ $statusLabel }}
                                    </span>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <button data-modal-open="edit-modal-{{ $karyawan->id }}"
                                            class="inline-flex items-center justify-center rounded-lg px-3 py-1.5 text-xs font-semibold bg-blue-50 text-blue-700 hover:bg-blue-100 transition-all"
                                            type="button">Edit</button>
                                        <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="inline-flex items-center justify-center rounded-lg px-3 py-1.5 text-xs font-semibold bg-red-50 text-red-700 hover:bg-red-100 transition-all"
                                                onclick="return confirm('Yakin hapus?')" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-10 text-center text-sm text-on-surface-variant">
                                    Belum ada data karyawan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="px-8 py-4 bg-surface-container-low flex items-center justify-between border-t border-surface-container-high">
                    <p class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider">
                        Showing all {{ number_format($karyawans->count()) }} results
                    </p>
                </div>
            </div>
        </div>
    </main>

    <div id="create-modal" data-modal-root class="hidden fixed inset-0 z-[70] flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/40" data-modal-close="create-modal"></div>
        <div class="relative w-full max-w-xl rounded-2xl bg-white shadow-2xl border border-zinc-200">
            <div class="flex items-center justify-between px-6 py-4 border-b border-zinc-100">
                <h3 class="text-lg font-bold">Tambah Karyawan</h3>
                <button class="text-zinc-500 hover:text-zinc-800" type="button" data-modal-close="create-modal">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form action="{{ route('karyawans.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold mb-2" for="nama">Nama</label>
                    <input id="nama" name="Nama" type="text" required
                        class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20"
                        value="{{ old('Nama') }}">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2" for="email">Email</label>
                    <input id="email" name="Email" type="email" required
                        class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20"
                        value="{{ old('Email') }}">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2" for="role">Role</label>
                    <select id="role" name="Role" required
                        class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20">
                        <option value="Karyawan" @selected(strtolower(old('Role') ?? '') === 'karyawan')>Karyawan</option>
                        <option value="Admin" @selected(strtolower(old('Role') ?? '') === 'admin')>Admin</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2" for="password">Password</label>
                    <input id="password" name="password" type="password" required
                        class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20"
                        placeholder="Minimal 8 karakter">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2" for="status">Status</label>
                    <select id="status" name="status" required
                        class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20">
                        <option value="1" @selected(old('status', '1') === '1')>Aktif</option>
                        <option value="0" @selected(old('status') === '0')>Nonaktif</option>
                    </select>
                </div>

                <div class="pt-2 flex items-center justify-end gap-3">
                    <button type="button" data-modal-close="create-modal"
                        class="px-4 py-2 rounded-lg border border-zinc-200 text-zinc-600 hover:bg-zinc-50">Batal</button>
                    <button type="submit" class="px-4 py-2 rounded-lg bg-primary text-white hover:opacity-90">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    @foreach ($karyawans as $karyawan)
        <div id="edit-modal-{{ $karyawan->id }}" data-modal-root
            class="hidden fixed inset-0 z-[70] flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-black/40" data-modal-close="edit-modal-{{ $karyawan->id }}"></div>
            <div class="relative w-full max-w-xl rounded-2xl bg-white shadow-2xl border border-zinc-200">
                <div class="flex items-center justify-between px-6 py-4 border-b border-zinc-100">
                    <h3 class="text-lg font-bold">Edit Karyawan</h3>
                    <button class="text-zinc-500 hover:text-zinc-800" type="button"
                        data-modal-close="edit-modal-{{ $karyawan->id }}">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <form action="{{ route('karyawans.update', $karyawan->id) }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-semibold mb-2" for="nama-{{ $karyawan->id }}">Nama</label>
                        <input id="nama-{{ $karyawan->id }}" name="Nama" type="text" required
                            class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20"
                            value="{{ $karyawan->Nama }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2" for="email-{{ $karyawan->id }}">Email</label>
                        <input id="email-{{ $karyawan->id }}" name="Email" type="email" required
                            class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20"
                            value="{{ $karyawan->Email }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2" for="role-{{ $karyawan->id }}">Role</label>
                        <select id="role-{{ $karyawan->id }}" name="Role" required
                            class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20">
                            <option value="Karyawan" @selected(strtolower($karyawan->Role) === 'karyawan')>Karyawan</option>
                            <option value="Admin" @selected(strtolower($karyawan->Role) === 'admin')>Admin</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2" for="password-{{ $karyawan->id }}">Password</label>
                        <input id="password-{{ $karyawan->id }}" name="password" type="password"
                            class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20"
                            placeholder="Kosongkan jika tidak diganti">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2" for="status-{{ $karyawan->id }}">Status</label>
                        <select id="status-{{ $karyawan->id }}" name="status" required
                            class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20">
                            <option value="1" @selected($karyawan->status)>Aktif</option>
                            <option value="0" @selected(!$karyawan->status)>Nonaktif</option>
                        </select>
                    </div>

                    <div class="pt-2 flex items-center justify-end gap-3">
                        <button type="button" data-modal-close="edit-modal-{{ $karyawan->id }}"
                            class="px-4 py-2 rounded-lg border border-zinc-200 text-zinc-600 hover:bg-zinc-50">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded-lg bg-primary text-white hover:opacity-90">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <script>
        const openButtons = document.querySelectorAll('[data-modal-open]');
        const closeButtons = document.querySelectorAll('[data-modal-close]');

        const showModal = (id) => {
            const modal = document.getElementById(id);

            if (!modal) {
                return;
            }

            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        };

        const hideModal = (id) => {
            const modal = document.getElementById(id);

            if (!modal) {
                return;
            }

            modal.classList.add('hidden');

            if (!document.querySelector('[data-modal-root]:not(.hidden)')) {
                document.body.classList.remove('overflow-hidden');
            }
        };

        openButtons.forEach((button) => {
            button.addEventListener('click', () => {
                showModal(button.getAttribute('data-modal-open'));
            });
        });

        closeButtons.forEach((button) => {
            button.addEventListener('click', () => {
                hideModal(button.getAttribute('data-modal-close'));
            });
        });

        document.addEventListener('keydown', (event) => {
            if (event.key !== 'Escape') {
                return;
            }

            document.querySelectorAll('[data-modal-root]:not(.hidden)').forEach((modal) => {
                modal.classList.add('hidden');
            });

            document.body.classList.remove('overflow-hidden');
        });
    </script>
</body>

</html>
