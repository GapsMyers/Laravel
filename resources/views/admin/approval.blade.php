<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>InvenTrack - Approval Queue</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
                        "inverse-on-surface": "#f1f1f0",
                        "on-secondary": "#ffffff",
                        "surface-tint": "#0053db",
                        "on-primary-fixed": "#00174b",
                        "on-secondary-container": "#57657a",
                        "tertiary-container": "#996100",
                        "surface-bright": "#f9f9f8",
                        "error-container": "#ffdad6",
                        "tertiary-fixed-dim": "#ffb95f",
                        "surface-container-high": "#e8e8e7",
                        "on-secondary-fixed-variant": "#3a485b",
                        "surface-dim": "#dadad9",
                        "on-error-container": "#93000a",
                        "secondary-container": "#d5e3fc",
                        "surface-container": "#eeeeed",
                        "on-secondary-fixed": "#0d1c2e",
                        "secondary-fixed-dim": "#b9c7df",
                        "surface-container-low": "#f4f4f3",
                        "on-primary-fixed-variant": "#003ea8",
                        "outline": "#737686",
                        "surface-container-highest": "#e2e2e2",
                        "on-tertiary-fixed-variant": "#653e00",
                        "outline-variant": "#c3c6d7",
                        "on-error": "#ffffff",
                        "tertiary-fixed": "#ffddb8",
                        "on-surface-variant": "#434655",
                        "on-tertiary": "#ffffff",
                        "primary-fixed": "#dbe1ff",
                        "on-primary": "#ffffff",
                        "tertiary": "#784b00",
                        "primary-fixed-dim": "#b4c5ff",
                        "background": "#f9f9f8",
                        "on-background": "#1a1c1c",
                        "surface-container-lowest": "#ffffff",
                        "error": "#ba1a1a",
                        "on-primary-container": "#eeefff",
                        "on-tertiary-container": "#ffeedd",
                        "primary": "#004ac6",
                        "secondary-fixed": "#d5e3fc",
                        "secondary": "#515f74",
                        "inverse-primary": "#b4c5ff",
                        "surface-variant": "#e2e2e2",
                        "on-tertiary-fixed": "#2a1700",
                        "primary-container": "#2563eb",
                        "surface": "#f9f9f8",
                        "on-surface": "#1a1c1c",
                        "inverse-surface": "#2f3130"
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
    <link href="{{ asset('css/admin-approval.css') }}" rel="stylesheet">
</head>

<body class="bg-background text-on-background antialiased overflow-hidden">

    @include ('admin.partials.dashboard-sidebar')

    <!-- Main Content Canvas -->
    <main class="ml-64 min-h-screen flex flex-col">
        <!-- TopNavBar Shell -->
        <header
            class="fixed top-0 right-0 left-64 h-16 z-40 bg-white/80 dark:bg-zinc-900/80 backdrop-blur-xl flex items-center justify-between px-8 w-full shadow-sm shadow-zinc-200/50 dark:shadow-none">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <span
                        class="absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400 material-symbols-outlined text-lg"
                        data-icon="search">search</span>
                    <input
                        class="bg-zinc-100/50 dark:bg-zinc-800/50 border-none rounded-lg pl-10 pr-4 py-1.5 text-sm w-64 focus:ring-2 focus:ring-blue-600/20 transition-all outline-none"
                        placeholder="Search approvals..." type="text" />
                </div>
            </div>
            <div class="flex items-center gap-6">
                <button
                    class="relative text-zinc-500 hover:text-blue-600 transition-colors active:scale-95 duration-200">
                    <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                </button>
                <div class="flex items-center gap-3 pl-6 border-l border-zinc-100">
                    <div class="text-right">
                        <p class="text-xs font-bold text-zinc-900 dark:text-zinc-100">Marcus Wright</p>
                        <p class="text-[10px] text-zinc-500">Inventory Manager</p>
                    </div>
                    <img alt="User Avatar" class="w-8 h-8 rounded-full object-cover"
                        data-alt="Close up portrait of a professional man in a white shirt with a clean background and soft studio lighting"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAsfbfiHJDJAPUO7zo2UclR4MESWiLKjiTxGydlhLQU7ABFFNvO48VsA392W8yY2pwu0u7QCr5hjlnVV_mcK1iNAdq677FC_shHLwx7GVdzJ8jp1y2I2IiO6YMsy1MJZGnn3mqWV7iOqw8MXEbVDkp9twQfMnXnnadwYFJfe2brC9TH1JWP441ONT_JxYqrCiVRkmhYicPpfmzivuy0v6d5FBdELZhlikF735mJUaaJJyK3A-nSeUpL2aorh4iTkZAmre9DDc9EpG2R" />
                </div>
            </div>
        </header>
        <!-- Page Body -->
        <div class="mt-16 p-8 flex-1 flex flex-col gap-6 overflow-hidden max-h-[calc(100vh-64px)]">
            @if (session('success'))
                <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            <div class="flex items-end justify-between">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-on-surface">Approval Queue</h2>
                    <p class="text-on-surface-variant text-sm mt-1">Manage and authorize pending purchase requests from
                        all departments.</p>
                </div>
                <div class="flex gap-2">
                    <button
                        class="px-4 py-2 text-sm font-medium text-zinc-600 bg-surface-container-high rounded-lg hover:bg-zinc-200 transition-colors">Export
                        CSV</button>
                    <button
                        class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-br from-primary to-primary-container rounded-lg shadow-lg shadow-primary/20">Batch
                        Approve</button>
                </div>
            </div>
            <!-- Asymmetric Split Layout -->
            <div class="flex-1 flex gap-8 min-h-0">
                <!-- Left List (1/3 width) -->
                <section class="w-1/3 flex flex-col gap-4 overflow-y-auto custom-scrollbar pr-2">
                    @forelse ($pendingRequests as $pendingRequest)
                        @php
                            $isActive = $selectedRequest && $selectedRequest->id === $pendingRequest->id;
                            $cardClass = $isActive
                                ? 'bg-surface-container-lowest border-l-4 border-primary shadow-lg shadow-zinc-200/40'
                                : 'bg-surface-container-low hover:bg-surface-container';
                            $prClass = $isActive ? 'text-primary' : 'text-zinc-400';
                            $headline = $pendingRequest->items->first()->nama_barang ?? 'Purchase Request';
                            $totalQty = $pendingRequest->items->sum('qty_requested');
                        @endphp
                        <a
                            class="p-5 rounded-xl transition-all {{ $cardClass }}"
                            href="{{ route('approval', ['request' => $pendingRequest->id]) }}">
                            <div class="flex justify-between items-start mb-3">
                                <span class="text-[10px] font-black tracking-widest uppercase {{ $prClass }}">
                                    {{ $pendingRequest->pr_number ?? 'PR-UNKNOWN' }}
                                </span>
                                <span class="px-2 py-1 text-[10px] font-bold bg-orange-100 text-orange-700 rounded-full">
                                    PENDING
                                </span>
                            </div>
                            <h3 class="font-bold text-on-surface mb-1">{{ $headline }}</h3>
                            <p class="text-xs text-on-surface-variant flex items-center gap-1 mb-4">
                                <span class="material-symbols-outlined text-sm" data-icon="person">person</span>
                                {{ $pendingRequest->requester_name ?? '-' }}
                            </p>
                            <div class="flex justify-between items-end">
                                <div class="text-[10px] text-zinc-400 uppercase font-bold tracking-tighter">Total Qty</div>
                                <div class="text-lg font-black text-zinc-900">
                                    {{ number_format($totalQty) }}
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="p-6 rounded-xl bg-surface-container-low text-sm text-on-surface-variant">
                            Tidak ada request pending.
                        </div>
                    @endforelse
                </section>
                <!-- Right Detail View (2/3 width) -->
                <section
                    class="w-2/3 bg-surface-container-lowest rounded-2xl shadow-xl shadow-zinc-200/20 flex flex-col overflow-hidden">
                    @if ($selectedRequest)
                    <!-- Header Info -->
                    <div class="p-8 pb-6 border-b border-zinc-100 bg-white/50 backdrop-blur-sm">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h1 class="text-2xl font-black text-zinc-900 tracking-tighter">
                                    PR #{{ $selectedRequest->pr_number ?? 'PR-UNKNOWN' }}
                                </h1>
                                <div class="flex items-center gap-4 mt-2">
                                    <div class="flex items-center gap-1.5 text-xs text-on-surface-variant">
                                        <span class="material-symbols-outlined text-sm"
                                            data-icon="person">person</span>
                                        <span class="font-semibold">{{ $selectedRequest->requester_name ?? '-' }}</span>
                                    </div>
                                    <div class="w-1 h-1 bg-zinc-300 rounded-full"></div>
                                    <div class="flex items-center gap-1.5 text-xs text-on-surface-variant">
                                        <span class="material-symbols-outlined text-sm"
                                            data-icon="calendar_today">calendar_today</span>
                                        <span>{{ optional($selectedRequest->requested_at)->format('d M Y') ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-[10px] font-bold text-zinc-400 uppercase block mb-1">Status</span>
                                <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-bold rounded-full">
                                    {{ strtoupper($selectedRequest->status ?? 'pending') }}
                                </span>
                            </div>
                        </div>
                        <div class="p-4 bg-surface-container-low rounded-lg">
                            <span class="text-[10px] font-bold text-zinc-500 uppercase block mb-1">Catatan</span>
                            <p class="text-sm text-zinc-700 leading-relaxed italic">
                                {{ $selectedRequest->notes ?: 'Tidak ada catatan.' }}
                            </p>
                        </div>
                    </div>
                    <!-- Scrollable Content -->
                    <div class="flex-1 overflow-y-auto custom-scrollbar p-8 pt-0">
                        <!-- Items Table -->
                        <div class="mt-8">
                            <h4 class="text-[11px] font-black uppercase tracking-widest text-zinc-400 mb-4">Line Items
                            </h4>
                            <div class="space-y-4">
                                <div class="grid grid-cols-12 text-[10px] font-bold text-zinc-400 uppercase px-4 mb-2">
                                    <div class="col-span-6">Item Description</div>
                                    <div class="col-span-2 text-center">Qty / Unit</div>
                                    <div class="col-span-4 text-right">Est. Price</div>
                                </div>
                                @forelse ($selectedRequest->items as $item)
                                    <div
                                        class="grid grid-cols-12 items-center p-4 bg-zinc-50 rounded-xl hover:bg-zinc-100/80 transition-colors">
                                        <div class="col-span-6">
                                            <p class="font-bold text-zinc-900">{{ $item->nama_barang }}</p>
                                            <p class="text-[10px] text-zinc-500">
                                                SKU: {{ $item->kode_barang ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col-span-2 text-center text-sm font-medium">
                                            {{ number_format($item->qty_requested) }} Units
                                        </div>
                                        <div class="col-span-4 text-right">
                                            <p class="font-black text-zinc-900">-</p>
                                            <p class="text-[10px] text-zinc-500">Harga belum diisi</p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-sm text-zinc-500 px-4">Belum ada item.</div>
                                @endforelse
                            </div>
                        </div>
                        <!-- Timeline -->
                        <div class="mt-12">
                            <h4 class="text-[11px] font-black uppercase tracking-widest text-zinc-400 mb-6">Activity
                                Timeline</h4>
                            <div
                                class="relative pl-8 space-y-8 before:absolute before:left-3 before:top-2 before:bottom-2 before:w-[2px] before:bg-zinc-100">
                                <div class="relative">
                                    <div
                                        class="absolute -left-8 top-1 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 ring-4 ring-white">
                                        <span class="material-symbols-outlined text-[14px]" data-icon="add">add</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-zinc-900">Request Created</p>
                                        <p class="text-[11px] text-zinc-500">
                                            {{ $selectedRequest->created_at?->format('d M Y • H:i') }} by {{ $selectedRequest->requester_name ?? '-' }}
                                        </p>
                                    </div>
                                </div>
                                @if ($selectedRequest->approved_at)
                                    <div class="relative">
                                        <div
                                            class="absolute -left-8 top-1 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center text-green-600 ring-4 ring-white">
                                            <span class="material-symbols-outlined text-[14px]"
                                                data-icon="check">check</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-zinc-900">Request Approved</p>
                                            <p class="text-[11px] text-zinc-500">{{ $selectedRequest->approved_at->format('d M Y • H:i') }}</p>
                                        </div>
                                    </div>
                                @elseif ($selectedRequest->rejected_at)
                                    <div class="relative">
                                        <div
                                            class="absolute -left-8 top-1 w-6 h-6 rounded-full bg-red-100 flex items-center justify-center text-red-600 ring-4 ring-white">
                                            <span class="material-symbols-outlined text-[14px]"
                                                data-icon="close">close</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-zinc-900">Request Rejected</p>
                                            <p class="text-[11px] text-zinc-500">{{ $selectedRequest->rejected_at->format('d M Y • H:i') }}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="relative">
                                        <div
                                            class="absolute -left-8 top-1 w-6 h-6 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 ring-4 ring-white">
                                            <span class="material-symbols-outlined text-[14px]"
                                                data-icon="hourglass_empty">hourglass_empty</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-zinc-900">Awaiting Approval</p>
                                            <p class="text-[11px] text-zinc-500">Menunggu persetujuan.</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Action Footer -->
                    <div class="p-8 border-t border-zinc-100 bg-white flex items-center justify-between gap-4">
                        <div class="flex items-center gap-2 text-zinc-400">
                            <span class="material-symbols-outlined" data-icon="info">info</span>
                            <span class="text-xs">Once approved, a PO will be automatically generated.</span>
                        </div>
                        <div class="flex gap-4 w-1/2">
                            <form action="{{ route('approval.reject', $selectedRequest->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button
                                    class="w-full py-3 px-6 rounded-xl border border-red-200 text-red-600 font-bold text-sm hover:bg-red-50 transition-all flex items-center justify-center gap-2 active:scale-[0.98]"
                                    type="submit">
                                    <span class="material-symbols-outlined text-lg" data-icon="close">close</span>
                                    Reject
                                </button>
                            </form>
                            <form action="{{ route('approval.approve', $selectedRequest->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button
                                    class="w-full py-3 px-10 rounded-xl bg-gradient-to-br from-green-600 to-green-700 text-white font-bold text-sm shadow-lg shadow-green-200 hover:brightness-110 transition-all flex items-center justify-center gap-2 active:scale-[0.98]"
                                    type="submit">
                                    <span class="material-symbols-outlined text-lg" data-icon="done_all"
                                        data-weight="fill" style="font-variation-settings: 'FILL' 1;">done_all</span>
                                    Approve Request
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                        <div class="p-10 text-center text-on-surface-variant">
                            Tidak ada request pending untuk ditampilkan.
                        </div>
                    @endif
                </section>
            </div>
        </div>
    </main>
</body>

</html>
