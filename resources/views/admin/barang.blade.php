<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Inventory Management | InvenTrack</title>
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
    @php
        $totalSkus = $barangs->count();
        $totalUnits = $barangs->sum('stok');
        $criticalStock = $barangs->where('stok', 0)->count();
        $activeItems = $barangs->where('status', true)->count();
        $maxStock = max((int) $barangs->max('stok'), 1);
    @endphp

    @include('admin.partials.dashboard-sidebar')

    <header
        class="fixed top-0 right-0 left-0 md:left-64 h-16 z-40 bg-white/80 dark:bg-zinc-900/80 backdrop-blur-xl flex items-center justify-between px-4 md:px-8 w-full shadow-sm shadow-zinc-200/50 dark:shadow-none font-sans text-sm tracking-tight">
        <div class="flex items-center gap-4 flex-1">
            <div class="relative w-full max-w-md">
                <span
                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400 text-lg">search</span>
                <input
                    class="w-full bg-zinc-100/50 dark:bg-zinc-800/50 border-none rounded-lg pl-10 pr-4 py-2 text-xs focus:ring-2 focus:ring-blue-500/20 transition-all outline-none"
                    placeholder="Search inventory, SKUs, or batches..." type="text" />
            </div>
        </div>
        <div class="flex items-center gap-6">
            <button
                class="relative text-zinc-500 hover:bg-zinc-50 dark:hover:bg-zinc-800/50 p-2 rounded-full transition-all active:scale-95 duration-200">
                <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
            </button>
            <div class="flex items-center gap-3 pl-4 border-l border-zinc-100">
                <div class="text-right">
                    <p class="text-[13px] font-semibold text-zinc-900 dark:text-zinc-100">Marcus Thorne</p>
                    <p class="text-[11px] text-zinc-500">Warehouse Manager</p>
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

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <span class="text-[11px] font-bold tracking-[0.15em] text-blue-600 uppercase mb-2 block">Global
                        Operations</span>
                    <h2 class="text-5xl font-black tracking-tight text-on-surface leading-none">Inventory</h2>
                    <p class="text-on-surface-variant mt-4 max-w-md text-sm leading-relaxed">
                        Real-time tracking barang gudang dengan dashboard modern untuk memantau stok dan status item.
                    </p>
                </div>
                <div class="flex gap-3">
                    <button
                        class="px-6 py-3 rounded-lg bg-surface-container-highest text-on-surface font-semibold text-sm hover:bg-surface-variant transition-all active:scale-95 flex items-center gap-2"
                        type="button">
                        <span class="material-symbols-outlined text-lg">download</span>
                        Export Report
                    </button>
                    <button data-modal-open="create-modal"
                        class="px-6 py-3 rounded-lg bg-gradient-to-br from-primary to-primary-container text-white font-semibold text-sm shadow-lg shadow-primary/20 hover:shadow-primary/30 transition-all active:scale-95 flex items-center gap-2"
                        type="button">
                        <span class="material-symbols-outlined text-lg">add</span>
                        Tambah Barang
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                <div class="col-span-1 bg-surface-container-lowest p-6 rounded-xl shadow-sm border border-outline-variant/10">
                    <p class="text-xs font-bold text-on-surface-variant uppercase tracking-wider mb-4">Total SKU</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-bold tracking-tighter">{{ number_format($totalSkus) }}</h3>
                        <span
                            class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">Live</span>
                    </div>
                </div>
                <div class="col-span-1 bg-surface-container-lowest p-6 rounded-xl shadow-sm border border-outline-variant/10">
                    <p class="text-xs font-bold text-on-surface-variant uppercase tracking-wider mb-4">Total Unit</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-bold tracking-tighter">{{ number_format($totalUnits) }}</h3>
                        <span class="text-xs font-bold text-zinc-400">Units</span>
                    </div>
                </div>
                <div class="col-span-1 bg-error-container/10 p-6 rounded-xl shadow-sm border border-error/5">
                    <p class="text-xs font-bold text-error uppercase tracking-wider mb-4">Empty Stock</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-bold tracking-tighter text-error">{{ number_format($criticalStock) }}</h3>
                        <span class="material-symbols-outlined text-error" data-weight="fill">warning</span>
                    </div>
                </div>
                <div class="col-span-1 bg-secondary-container/20 p-6 rounded-xl shadow-sm border border-secondary/5">
                    <p class="text-xs font-bold text-on-secondary-container uppercase tracking-wider mb-4">Active Items</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-bold tracking-tighter text-on-secondary-container">
                            {{ number_format($activeItems) }}</h3>
                        <span class="material-symbols-outlined text-on-secondary-container">verified</span>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-4 mb-8">
                <div
                    class="flex items-center gap-2 bg-surface-container-low px-4 py-2 rounded-full text-sm font-medium text-on-surface-variant">
                    <span class="material-symbols-outlined text-base">filter_list</span>
                    <span>Filters:</span>
                </div>
                <select
                    class="bg-surface-container-high border-none rounded-full px-5 py-2 text-sm focus:ring-2 focus:ring-primary/20 transition-all outline-none cursor-pointer">
                    <option>All Warehouse Zones</option>
                    <option>Zone A: Raw Materials</option>
                    <option>Zone B: Assembly</option>
                    <option>Zone C: Quality Control</option>
                    <option>Zone D: Finished Goods</option>
                </select>
                <select
                    class="bg-surface-container-high border-none rounded-full px-5 py-2 text-sm focus:ring-2 focus:ring-primary/20 transition-all outline-none cursor-pointer">
                    <option>All Categories</option>
                    <option>Electronics</option>
                    <option>Mechanical</option>
                    <option>Fasteners</option>
                    <option>Packaging</option>
                </select>
                <button class="ml-auto text-sm font-bold text-primary hover:underline" type="button">Clear All</button>
            </div>

            <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm shadow-zinc-200/50">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-surface-container-low text-on-surface-variant uppercase text-[10px] font-bold tracking-[0.1em]">
                            <th class="px-8 py-5">Item Details</th>
                            <th class="px-6 py-5">Category</th>
                            <th class="px-6 py-5">Warehouse Zone</th>
                            <th class="px-6 py-5">Stock Level</th>
                            <th class="px-6 py-5">Status</th>
                            <th class="px-8 py-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-container-high">
                        @forelse ($barangs as $barang)
                            @php
                                $stockPercent = (int) min(100, round(($barang->stok / $maxStock) * 100));

                                if (!$barang->status) {
                                    $statusLabel = 'Inactive';
                                    $statusClass = 'text-zinc-600 bg-zinc-100';
                                    $statusDotClass = 'bg-zinc-500';
                                    $stockTextClass = 'text-zinc-500';
                                    $stockBarClass = 'bg-zinc-400';
                                } elseif ($barang->stok === 0) {
                                    $statusLabel = 'Out of Stock';
                                    $statusClass = 'text-red-600 bg-red-50';
                                    $statusDotClass = 'bg-red-500';
                                    $stockTextClass = 'text-red-600';
                                    $stockBarClass = 'bg-red-500';
                                } elseif ($barang->stok < 10) {
                                    $statusLabel = 'Low Stock';
                                    $statusClass = 'text-amber-600 bg-amber-50';
                                    $statusDotClass = 'bg-amber-500';
                                    $stockTextClass = 'text-amber-600';
                                    $stockBarClass = 'bg-amber-500';
                                } else {
                                    $statusLabel = 'Safe Stock';
                                    $statusClass = 'text-emerald-600 bg-emerald-50';
                                    $statusDotClass = 'bg-emerald-500';
                                    $stockTextClass = 'text-emerald-600';
                                    $stockBarClass = 'bg-emerald-500';
                                }
                            @endphp
                            <tr class="group hover:bg-surface-container-low transition-all">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-10 h-10 rounded bg-zinc-100 flex items-center justify-center text-zinc-400">
                                            <span class="material-symbols-outlined">inventory_2</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-on-surface">{{ $barang->nama_barang }}</p>
                                            <p class="text-[11px] text-on-surface-variant">SKU: {{ $barang->kode_barang }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <span
                                        class="text-xs font-medium text-on-secondary-container bg-secondary-container/30 px-3 py-1 rounded-full">Inventory</span>
                                </td>
                                <td class="px-6 py-6">
                                    <p class="text-sm text-on-surface">Main Warehouse</p>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex flex-col gap-1 w-32">
                                        <div class="flex justify-between text-[10px] font-bold">
                                            <span>{{ number_format($barang->stok) }} units</span>
                                            <span class="{{ $stockTextClass }}">{{ $stockPercent }}%</span>
                                        </div>
                                        <div class="h-1.5 w-full bg-surface-container-highest rounded-full overflow-hidden">
                                            <div class="h-full {{ $stockBarClass }} rounded-full"
                                                style="width: {{ $stockPercent }}%"></div>
                                        </div>
                                    </div>
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
                                        <button data-modal-open="edit-modal-{{ $barang->id }}"
                                            class="inline-flex items-center justify-center rounded-lg px-3 py-1.5 text-xs font-semibold bg-blue-50 text-blue-700 hover:bg-blue-100 transition-all"
                                            type="button">Edit</button>
                                        <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" class="inline-block">
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
                                <td colspan="6" class="px-8 py-10 text-center text-sm text-on-surface-variant">
                                    Belum ada data barang.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div
                    class="px-8 py-4 bg-surface-container-low flex items-center justify-between border-t border-surface-container-high">
                    <p class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider">
                        Showing all {{ number_format($barangs->count()) }} results
                    </p>
                    <div class="flex items-center gap-2">
                        <button
                            class="w-8 h-8 flex items-center justify-center rounded bg-surface-container-highest text-zinc-400 hover:bg-zinc-200 transition-colors"
                            type="button">
                            <span class="material-symbols-outlined text-sm">chevron_left</span>
                        </button>
                        <button class="w-8 h-8 flex items-center justify-center rounded bg-primary text-white text-xs font-bold"
                            type="button">1</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-zinc-100 text-xs font-bold"
                            type="button">2</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-zinc-100 text-xs font-bold"
                            type="button">3</button>
                        <button
                            class="w-8 h-8 flex items-center justify-center rounded bg-surface-container-highest text-zinc-400 hover:bg-zinc-200 transition-colors"
                            type="button">
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mt-16">
                <div class="lg:col-span-2 space-y-8">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xl font-bold tracking-tight">Zone Logistics Overview</h4>
                        <button class="text-sm font-bold text-primary flex items-center gap-1" type="button">
                            Live Feed <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                        </button>
                    </div>
                    <div class="relative h-96 rounded-2xl overflow-hidden bg-zinc-200 shadow-xl group">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent z-10"></div>
                        <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuD8SAVogql8rmd7grKRjPXIS4U0B9cUfhlC6fEZfTMxqLfVeW52JVeKufB213Xnp6sI7s4lowjoomJ6_hAiwZJfobZX4HJfKWLCPjkQQCZxuQ2n7AxJLatsT748KSGwtx61zhkypXv_WifXI55fOOtlv4vp_7XCo3fRdaIGlS1LXJJxCRqvvuuqgPkQH9gPnHIeXXxNS12hhS3Gcf1aBvl8w_vMdMO1IkX8U4cqzFQm7feLZCnC195nFd61xLljl7CYKusizIy-9dtr"
                            alt="Warehouse" />
                        <div class="absolute bottom-6 left-6 z-20">
                            <p class="text-white/70 text-[10px] uppercase font-bold tracking-widest mb-1">Central Hub</p>
                            <h5 class="text-white text-2xl font-black">Warehouse Zone Alpha-4</h5>
                            <div class="flex items-center gap-4 mt-4">
                                <div
                                    class="flex items-center gap-2 text-white/90 text-xs bg-white/10 backdrop-blur-md px-3 py-1.5 rounded-full">
                                    <span class="material-symbols-outlined text-sm">thermostat</span>
                                    <span>21.4C</span>
                                </div>
                                <div
                                    class="flex items-center gap-2 text-white/90 text-xs bg-white/10 backdrop-blur-md px-3 py-1.5 rounded-full">
                                    <span class="material-symbols-outlined text-sm">humidity_mid</span>
                                    <span>45%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-1">
                    <div
                        class="bg-surface-container-lowest p-8 rounded-2xl shadow-sm border border-outline-variant/10 h-full">
                        <h4 class="text-lg font-bold tracking-tight mb-8">Quick Stock Actions</h4>
                        <div class="space-y-4">
                            <button
                                class="w-full flex items-center justify-between p-4 bg-surface-container-low hover:bg-surface-container-high rounded-xl transition-all group"
                                type="button" data-modal-open="create-modal">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                                        <span class="material-symbols-outlined">barcode_scanner</span>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-sm font-bold">Tambah Barang</p>
                                        <p class="text-[10px] text-on-surface-variant">Register item baru</p>
                                    </div>
                                </div>
                                <span
                                    class="material-symbols-outlined text-zinc-400 group-hover:translate-x-1 transition-transform">chevron_right</span>
                            </button>
                            <button
                                class="w-full flex items-center justify-between p-4 bg-surface-container-low hover:bg-surface-container-high rounded-xl transition-all group"
                                type="button">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center text-secondary">
                                        <span class="material-symbols-outlined">transfer_within_a_station</span>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-sm font-bold">Internal Transfer</p>
                                        <p class="text-[10px] text-on-surface-variant">Move items between zones</p>
                                    </div>
                                </div>
                                <span
                                    class="material-symbols-outlined text-zinc-400 group-hover:translate-x-1 transition-transform">chevron_right</span>
                            </button>
                            <button
                                class="w-full flex items-center justify-between p-4 bg-surface-container-low hover:bg-surface-container-high rounded-xl transition-all group"
                                type="button">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-tertiary/10 flex items-center justify-center text-tertiary">
                                        <span class="material-symbols-outlined">inventory</span>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-sm font-bold">Stock Count</p>
                                        <p class="text-[10px] text-on-surface-variant">Perform physical audit</p>
                                    </div>
                                </div>
                                <span
                                    class="material-symbols-outlined text-zinc-400 group-hover:translate-x-1 transition-transform">chevron_right</span>
                            </button>
                        </div>
                        <div class="mt-10 p-6 bg-primary-container/10 rounded-xl border border-primary/10">
                            <p class="text-[10px] font-bold text-primary uppercase tracking-[0.1em] mb-2">Automated
                                Optimization</p>
                            <p class="text-sm font-medium leading-relaxed mb-4">InvenTrack AI suggests moving selected
                                SKU items to faster-pick zones to reduce fulfillment time.</p>
                            <button class="text-xs font-black text-primary hover:underline" type="button">Review
                                Suggestion -></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <button
        class="fixed bottom-8 right-8 w-14 h-14 bg-primary text-white rounded-full shadow-2xl shadow-primary/40 flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-50"
        type="button" data-modal-open="create-modal">
        <span class="material-symbols-outlined text-2xl" data-weight="fill">bolt</span>
    </button>

    <div id="create-modal" data-modal-root class="hidden fixed inset-0 z-[70] flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/40" data-modal-close="create-modal"></div>
        <div class="relative w-full max-w-xl rounded-2xl bg-white shadow-2xl border border-zinc-200">
            <div class="flex items-center justify-between px-6 py-4 border-b border-zinc-100">
                <h3 class="text-lg font-bold">Tambah Barang</h3>
                <button class="text-zinc-500 hover:text-zinc-800" type="button" data-modal-close="create-modal">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <form action="{{ route('barangs.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold mb-2" for="nama_barang">Nama Barang</label>
                    <input id="nama_barang" name="nama_barang" type="text" required
                        class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20"
                        value="{{ old('nama_barang') }}">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2" for="kode_barang">Kode Barang</label>
                    <input id="kode_barang" name="kode_barang" type="text" required
                        class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20"
                        value="{{ old('kode_barang') }}">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-2" for="stok">Stok</label>
                        <input id="stok" name="stok" type="number" min="0" required
                            class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20"
                            value="{{ old('stok', 0) }}">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2" for="status">Status</label>
                        <select id="status" name="status" required
                            class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20">
                            <option value="1" @selected(old('status', '1') === '1')>Aktif</option>
                            <option value="0" @selected(old('status') === '0')>Nonaktif</option>
                        </select>
                    </div>
                </div>
                <div class="pt-2 flex items-center justify-end gap-3">
                    <button type="button" data-modal-close="create-modal"
                        class="px-4 py-2 rounded-lg border border-zinc-200 text-zinc-600 hover:bg-zinc-50">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 rounded-lg bg-primary text-white hover:opacity-90">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    @foreach ($barangs as $barang)
        <div id="edit-modal-{{ $barang->id }}" data-modal-root class="hidden fixed inset-0 z-[70] flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-black/40" data-modal-close="edit-modal-{{ $barang->id }}"></div>
            <div class="relative w-full max-w-xl rounded-2xl bg-white shadow-2xl border border-zinc-200">
                <div class="flex items-center justify-between px-6 py-4 border-b border-zinc-100">
                    <h3 class="text-lg font-bold">Edit Barang</h3>
                    <button class="text-zinc-500 hover:text-zinc-800" type="button"
                        data-modal-close="edit-modal-{{ $barang->id }}">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                <form action="{{ route('barangs.update', $barang->id) }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-semibold mb-2">Nama Barang</label>
                        <input name="nama_barang" type="text" required
                            class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20"
                            value="{{ $barang->nama_barang }}">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">Kode Barang</label>
                        <input name="kode_barang" type="text" required
                            class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20"
                            value="{{ $barang->kode_barang }}">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold mb-2">Stok</label>
                            <input name="stok" type="number" min="0" required
                                class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20"
                                value="{{ $barang->stok }}">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2">Status</label>
                            <select name="status" required
                                class="w-full rounded-lg border-zinc-200 focus:border-primary focus:ring-primary/20">
                                <option value="1" @selected($barang->status)>Aktif</option>
                                <option value="0" @selected(!$barang->status)>Nonaktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="pt-2 flex items-center justify-end gap-3">
                        <button type="button" data-modal-close="edit-modal-{{ $barang->id }}"
                            class="px-4 py-2 rounded-lg border border-zinc-200 text-zinc-600 hover:bg-zinc-50">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 rounded-lg bg-primary text-white hover:opacity-90">Update</button>
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

        @if ($errors->any())
            showModal('create-modal');
        @endif
    </script>
</body>

</html>
