<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Goods Receipt | InvenTrack</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
    <link href="{{ asset('css/admin-goods-receipt.css') }}" rel="stylesheet">
</head>

<body class="bg-surface text-on-surface">
    @include('admin.partials.dashboard-sidebar')

    <header
        class="fixed top-0 right-0 left-0 md:left-64 z-40 bg-white/80 dark:bg-zinc-900/80 backdrop-blur-xl flex flex-wrap items-center justify-between gap-4 px-4 md:px-8 w-full shadow-sm shadow-zinc-200/50 dark:shadow-none py-3 md:py-0 min-h-16 md:h-16">
        <div class="flex items-center flex-1 w-full md:w-auto">
            <div class="relative w-full md:max-w-md">
                <span
                    class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-zinc-400 text-sm"
                    data-icon="search">search</span>
                <input
                    class="w-full bg-zinc-100/50 dark:bg-zinc-800/50 border-none rounded-lg pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-blue-600 transition-all"
                    placeholder="Search PO # or Batch ID..." type="text" />
            </div>
        </div>
        <div class="flex items-center gap-4 sm:gap-6">
            <button
                class="relative text-zinc-500 hover:bg-zinc-50 dark:hover:bg-zinc-800/50 p-2 rounded-full transition-all active:scale-95">
                <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                <span class="absolute top-2 right-2 w-2 h-2 bg-blue-600 rounded-full border-2 border-white"></span>
            </button>
            <div class="hidden sm:flex items-center gap-3 pl-4 border-l border-zinc-200 dark:border-zinc-800">
                <div class="text-right">
                    <p class="text-xs font-bold text-zinc-900 dark:text-zinc-50">Marcus Chen</p>
                    <p class="text-[10px] text-zinc-500 uppercase tracking-tighter">Receiving Manager</p>
                </div>
                <img alt="User Avatar" class="w-9 h-9 rounded-full object-cover grayscale"
                    data-alt="professional portrait of a man in a modern office setting with soft studio lighting and a clean background"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAYqwmyw4O0NUWThdVjjKEhKyrBq4LPMZ29R_e_ODtq9lDJO71SpgU8PlmmciCOaX5AVIX_GXK_IXsKv14XeI28qj1erplYxj81M6bKqA2nWbyKd52PjG5D1KlBCM3ocovPem04l6KEMkX8F5XfUzVYZdlWH0Usggb0PD9YGLouqJVFEG0hNQEyCOWKzRGxWPccYtx_ae8JAYhWJZuNVD5fcUu4Kco5JghFuKOHN95tIyrtEIqLfTrug9M9_ehG_sIUJG38Tnm5VW_f" />
            </div>
        </div>
    </header>

    <main class="ml-0 md:ml-64 pt-28 md:pt-20 min-h-screen p-4 md:p-8 bg-surface">
        <div class="max-w-7xl ml-0 mr-auto">
            @if (session('success'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    {{ session('error') }}
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
            <div class="mb-12">
                <span class="label-sm text-xs font-bold tracking-[0.1em] text-blue-600 uppercase mb-2 block">Receiving
                    Terminal</span>
                <h2 class="text-4xl font-black text-on-surface tracking-tight mb-2">Process Incoming Shipment</h2>
                <p class="text-on-surface-variant max-w-xl">
                    @if ($purchaseRequest)
                        Verify and record goods arrival against PR #{{ $purchaseRequest->pr_number ?? 'PR-UNKNOWN' }}.
                        Ensure all discrepancies are flagged for quality control.
                    @else
                        Belum ada request berstatus approved atau partial untuk diproses.
                    @endif
                </p>
                @if ($availableRequests->isNotEmpty())
                    <form action="{{ route('goods-receipt') }}" method="GET" class="mt-4 flex flex-wrap items-center gap-3">
                        <label for="request" class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">
                            Select Request
                        </label>
                        <select id="request" name="request"
                            class="bg-surface-container-high border-none rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-primary">
                            @foreach ($availableRequests as $availableRequest)
                                <option value="{{ $availableRequest->id }}"
                                    @selected($purchaseRequest && $purchaseRequest->id === $availableRequest->id)>
                                    {{ $availableRequest->pr_number ?? 'PR-UNKNOWN' }}
                                </option>
                            @endforeach
                        </select>
                        <button
                            class="px-4 py-2 text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors"
                            type="submit">Load</button>
                    </form>
                @endif
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-surface-container-lowest p-8 rounded-xl shadow-sm border border-outline-variant/15">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-bold text-on-surface flex items-center gap-2">
                                <span class="material-symbols-outlined text-blue-600"
                                    data-icon="barcode_scanner">barcode_scanner</span>
                                SKU Registration
                            </h3>
                            <span class="text-xs font-mono bg-surface-container-high px-2 py-1 rounded">SCANNER ACTIVE</span>
                        </div>
                        <div class="relative group">
                            <input
                                class="w-full bg-surface-container-high border-none rounded-lg py-5 pl-14 pr-6 text-lg font-medium focus:ring-2 focus:ring-primary transition-all placeholder:text-zinc-400"
                                placeholder="Scan SKU or enter Serial Number..." type="text" />
                            <span
                                class="absolute left-5 top-1/2 -translate-y-1/2 material-symbols-outlined text-zinc-400 group-focus-within:text-blue-600"
                                data-icon="qr_code_2">qr_code_2</span>
                        </div>
                        <div class="mt-4 flex gap-3">
                            <button
                                class="px-4 py-2 text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">Manual
                                Override</button>
                            <button
                                class="px-4 py-2 text-xs font-bold uppercase tracking-wider text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-colors">Bulk
                                Entry</button>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/15 overflow-hidden">
                        <div class="p-6 border-b border-outline-variant/10">
                            <h3 class="text-lg font-bold">Line Items Verification</h3>
                        </div>
                        @if ($purchaseRequest)
                            <form id="receipt-form" action="{{ route('goods-receipt.store', $purchaseRequest->id) }}" method="POST">
                                @csrf
                                <div class="overflow-x-auto">
                                    <table class="w-full border-collapse">
                                        <thead>
                                            <tr class="bg-surface-container-low text-left">
                                                <th
                                                    class="px-6 py-4 text-[11px] font-black uppercase tracking-widest text-on-surface-variant">
                                                    Item Detail</th>
                                                <th
                                                    class="px-6 py-4 text-[11px] font-black uppercase tracking-widest text-on-surface-variant text-center">
                                                    Qty Ordered</th>
                                                <th
                                                    class="px-6 py-4 text-[11px] font-black uppercase tracking-widest text-on-surface-variant text-center">
                                                    Qty Received</th>
                                                <th
                                                    class="px-6 py-4 text-[11px] font-black uppercase tracking-widest text-on-surface-variant text-right">
                                                    Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-surface-container">
                                            @forelse ($items as $item)
                                                @php
                                                    $difference = $item->qty_received - $item->qty_requested;
                                                    $statusLabel = 'Match';
                                                    $statusClass = 'bg-green-100 text-green-700';
                                                    $statusNote = null;
                                                    $inputClass = 'bg-surface-container-high focus:ring-blue-500';

                                                    if ($difference < 0) {
                                                        $statusLabel = 'Shortage ('.abs($difference).')';
                                                        $statusClass = 'bg-error-container text-error';
                                                        $statusNote = 'Pending Adjustment';
                                                        $inputClass = 'bg-error-container/40 text-error border border-error/20 focus:ring-error';
                                                    } elseif ($difference > 0) {
                                                        $statusLabel = 'Overage (+'.$difference.')';
                                                        $statusClass = 'bg-error-container text-error';
                                                        $statusNote = 'Flag for QC';
                                                        $inputClass = 'bg-error-container/40 text-error border border-error/20 focus:ring-error';
                                                    }
                                                @endphp
                                                <tr class="group hover:bg-surface-container-low/50 transition-colors">
                                                    <td class="px-6 py-6">
                                                        <div class="flex items-center gap-4">
                                                            <div
                                                                class="w-12 h-12 bg-surface-container-highest rounded-lg flex items-center justify-center">
                                                                <span class="material-symbols-outlined text-zinc-500"
                                                                    data-icon="inventory_2">inventory_2</span>
                                                            </div>
                                                            <div>
                                                                <p class="text-sm font-bold text-on-surface">{{ $item->nama_barang }}</p>
                                                                <p class="text-[10px] text-zinc-500 font-mono">
                                                                    SKU: {{ $item->kode_barang ?? '-' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-6 text-center text-sm font-semibold">
                                                        {{ number_format($item->qty_requested) }}
                                                    </td>
                                                    <td class="px-6 py-6 text-center">
                                                        <input
                                                            class="w-20 text-center border-none rounded py-1 text-sm font-bold focus:ring-1 {{ $inputClass }}"
                                                            type="number" min="0" name="items[{{ $item->id }}][qty_received]"
                                                            value="{{ $item->qty_received }}" />
                                                    </td>
                                                    <td class="px-6 py-6 text-right">
                                                        <div class="flex flex-col items-end">
                                                            <span
                                                                class="px-3 py-1 rounded-full text-[10px] font-bold uppercase {{ $statusClass }}">
                                                                {{ $statusLabel }}
                                                            </span>
                                                            @if ($statusNote)
                                                                <p class="text-[9px] text-error mt-1 font-medium italic">{{ $statusNote }}</p>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="px-6 py-10 text-center text-sm text-on-surface-variant">
                                                        Belum ada item untuk diproses.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        @else
                            <div class="px-6 py-10 text-center text-sm text-on-surface-variant">
                                Tidak ada data goods receipt.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-surface-container-high rounded-xl p-6 border border-outline-variant/15">
                        <h4 class="text-xs font-black uppercase tracking-widest text-on-surface-variant mb-4">Shipment Details
                        </h4>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-on-surface-variant">Department</span>
                                <span class="text-sm font-bold">{{ $purchaseRequest?->department ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-on-surface-variant">Requester</span>
                                <span class="text-sm font-bold">{{ $purchaseRequest?->requester_name ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-on-surface-variant">Request Date</span>
                                <span class="text-sm font-bold">
                                    {{ optional($purchaseRequest?->requested_at)->format('d M Y') ?? '-' }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-on-surface-variant">Status</span>
                                <span class="text-sm font-bold">
                                    {{ strtoupper($purchaseRequest?->status ?? 'pending') }}
                                </span>
                            </div>
                        </div>
                        <div class="mt-6 pt-6 border-t border-outline-variant/20">
                            <img class="w-full h-32 object-cover rounded-lg grayscale opacity-80"
                                data-alt="a stack of industrial shipping pallets in a clean, brightly lit modern warehouse with high ceilings"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBzohZXPSLHmHURfJL5j0pEGomTBCNbWSRji7W3yLh8wOZNk-48bsBfyqjy8EPqoeGbWQF-fSVTraAGR8vuLg-vuaegtpyT6RUBMjlHVtkEyO_1f7_DyZdQCRbl--l2cRs1qILd9T1chG7wX55U6YTwi_W3sbnRfuPIWygyxYJAqhMsYPXLyG62G8GIq0MOoq4Mw7_xg1XcjRU2YXGn_6OIgzo9XZ3Z2SDVzpSTsuvnwxf1X2bpqVCHPbdyaLgMSMgxAE3T3A8l_-UJ" />
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-8 shadow-xl shadow-zinc-200/50 border border-outline-variant/10">
                        <h4 class="text-xs font-black uppercase tracking-widest text-on-surface-variant mb-6">Receipt Verification
                        </h4>
                        <div class="space-y-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-blue-600 text-lg"
                                        data-icon="check_circle">check_circle</span>
                                </div>
                                <div>
                                    <p class="text-[10px] uppercase font-bold text-zinc-400">Items Cleared</p>
                                    <p class="text-xl font-black">
                                        {{ $summary['matched'] ?? 0 }} / {{ $items->count() }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-error-container/30 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-error text-lg" data-icon="report">report</span>
                                </div>
                                <div>
                                    <p class="text-[10px] uppercase font-bold text-zinc-400">Discrepancies</p>
                                    <p class="text-xl font-black text-error">
                                        {{ $summary['discrepancies'] ?? 0 }} Items
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 space-y-3">
                            <button
                                class="w-full bg-gradient-to-r from-primary to-primary-container text-white py-4 rounded-lg font-bold shadow-lg shadow-blue-500/20 active:scale-95 duration-200 flex items-center justify-center gap-2"
                                type="submit" form="receipt-form" name="action" value="confirm" @disabled(!$purchaseRequest)>
                                <span class="material-symbols-outlined text-white" data-icon="fact_check">fact_check</span>
                                Confirm Receipt
                            </button>
                            <button
                                class="w-full bg-transparent border border-outline-variant/40 text-on-surface-variant py-4 rounded-lg font-bold hover:bg-surface-container-low transition-colors text-sm"
                                type="submit" form="receipt-form" name="action" value="draft" @disabled(!$purchaseRequest)>
                                Save as Draft
                            </button>
                        </div>
                        <p class="mt-4 text-[10px] text-center text-zinc-400 leading-relaxed italic">By confirming, you
                            verify the physical quantities match the recorded values above.</p>
                    </div>
                </div>
            </div>
            <div class="mt-10 flex justify-end">
                <div
                    class="flex flex-wrap items-center gap-4 px-6 py-4 glass-effect rounded-2xl shadow-2xl border border-white/50">
                    <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    <p class="text-xs font-bold text-zinc-800">New batch arriving in Bay 4 (15 mins)</p>
                    <button class="text-xs font-black text-blue-600 uppercase md:ml-4">View</button>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
