<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Audit Log | InvenTrack</title>
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
    <link href="{{ asset('css/admin-audit-log.css') }}" rel="stylesheet">
</head>

<body class="bg-background text-on-surface">
    @include('admin.partials.dashboard-sidebar')

    <header
        class="fixed top-0 right-0 left-0 md:left-64 h-16 z-40 bg-white/80 dark:bg-zinc-900/80 backdrop-blur-xl shadow-sm shadow-zinc-200/50 flex items-center justify-between px-4 md:px-8 w-full font-sans text-sm tracking-tight">
        <div class="flex items-center flex-1">
            <div class="relative w-full max-w-md">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400 text-lg"
                    data-icon="search">search</span>
                <input
                    class="w-full bg-zinc-100/50 dark:bg-zinc-800/50 border-none rounded-lg pl-10 pr-4 py-2 focus:ring-2 focus:ring-blue-500/20 text-on-surface placeholder:text-zinc-500"
                    placeholder="Search audit events, users, or records..." type="text" />
            </div>
        </div>
        <div class="flex items-center gap-6">
            <button class="relative p-2 text-zinc-500 hover:bg-zinc-50 transition-all active:scale-95">
                <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                <span class="absolute top-2 right-2 w-2 h-2 bg-blue-600 rounded-full border-2 border-white"></span>
            </button>
            <div class="flex items-center gap-3 pl-4 border-l border-zinc-200">
                <div class="text-right">
                    <p class="font-semibold text-zinc-900 leading-none">Marcus Thorne</p>
                    <p class="text-[11px] text-zinc-500 mt-1">System Administrator</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center overflow-hidden">
                    <img alt="User Avatar" class="w-full h-full object-cover"
                        data-alt="professional male portrait with neutral background, warm lighting, sharp focus, executive look"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuC5Si1onWPKhJrstNauECxVJKDqn7W_jdl5rJbrRmQ8fFZqVzgwK6s6ryUYfR7idqWV7Vl3P0e2WiUNYGDRjbSX3FGVXVN9Kd1YBEptjEjckohY7mxvB1L1-4Pj07lJqybHv01V3cSDHs5Y6wrtp35d_qTRTUMtMwu-a2JNQDflBE1IBIEwuRKe4gMp3BfZG-fwtyAyyE8n7sOQkEZE8lrS-0fOrji-uWWvBkkmvAhGKtL4rV6tFIZbYtI7mXMIMdoI7t3SSC_I4ICM" />
                </div>
            </div>
        </div>
    </header>

    <main class="ml-0 md:ml-64 pt-24 pb-12 px-4 md:px-8 min-h-screen">
        <div class="mb-10 flex flex-col lg:flex-row lg:items-end justify-between gap-6">
            <div class="space-y-2">
                <h2 class="text-4xl font-extrabold tracking-tighter text-on-surface leading-none">System Audit Log</h2>
                <p class="text-on-surface-variant font-medium text-lg">Detailed ledger of every action within the InvenTrack
                    ecosystem.</p>
            </div>
            <div class="flex flex-wrap items-center gap-3 bg-surface-container-low p-1.5 rounded-xl">
                <button
                    class="px-5 py-2.5 bg-surface-container-lowest text-on-surface font-semibold text-sm rounded-lg shadow-sm">All
                    Time</button>
                <button
                    class="px-5 py-2.5 text-on-surface-variant hover:text-on-surface font-semibold text-sm rounded-lg transition-colors">Today</button>
                <button
                    class="px-5 py-2.5 text-on-surface-variant hover:text-on-surface font-semibold text-sm rounded-lg transition-colors">Last
                    7 Days</button>
                <button
                    class="flex items-center px-4 py-2.5 text-primary font-bold text-sm bg-white/50 border border-outline-variant/15 rounded-lg lg:ml-4">
                    <span class="material-symbols-outlined text-lg mr-2" data-icon="calendar_today">calendar_today</span>
                    Custom Range
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/10">
                <p class="text-[10px] uppercase tracking-widest text-on-surface-variant font-bold mb-4">Total Activities</p>
                <p class="text-3xl font-black text-on-surface">12,842</p>
                <p class="text-xs text-blue-600 font-bold mt-2 flex items-center">
                    <span class="material-symbols-outlined text-sm mr-1" data-icon="trending_up">trending_up</span>
                    +14% from last week
                </p>
            </div>
            <div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/10">
                <p class="text-[10px] uppercase tracking-widest text-on-surface-variant font-bold mb-4">New Entries</p>
                <p class="text-3xl font-black text-on-surface">439</p>
                <p class="text-xs text-zinc-500 font-medium mt-2">Added in last 24h</p>
            </div>
            <div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/10">
                <p class="text-[10px] uppercase tracking-widest text-on-surface-variant font-bold mb-4">Sensitive Edits</p>
                <p class="text-3xl font-black text-on-surface">18</p>
                <p class="text-xs text-error font-bold mt-2 flex items-center">
                    <span class="material-symbols-outlined text-sm mr-1" data-icon="warning">warning</span>
                    Needs review
                </p>
            </div>
            <div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/10">
                <p class="text-[10px] uppercase tracking-widest text-on-surface-variant font-bold mb-4">System Alerts</p>
                <p class="text-3xl font-black text-on-surface">0</p>
                <p class="text-xs text-zinc-500 font-medium mt-2">Normal operational state</p>
            </div>
        </div>

        <div class="relative">
            <div class="absolute left-[31px] top-0 bottom-0 w-px bg-surface-container-highest"></div>

            <div class="relative z-10 mb-8">
                <div class="flex items-center">
                    <div
                        class="w-[64px] h-[64px] rounded-2xl bg-surface-container-lowest border border-outline-variant/20 flex items-center justify-center shadow-sm">
                        <div class="text-center">
                            <span class="block text-[10px] uppercase font-black text-on-surface-variant">Oct</span>
                            <span class="block text-xl font-black text-on-surface -mt-1">24</span>
                        </div>
                    </div>
                    <div class="ml-6">
                        <h3 class="text-xl font-bold text-on-surface">Thursday</h3>
                        <p class="text-sm text-on-surface-variant font-medium">142 Events recorded</p>
                    </div>
                </div>
            </div>

            <div class="space-y-6 pl-[88px]">
                <div
                    class="group relative bg-surface-container-lowest p-6 rounded-2xl hover:bg-white transition-all border border-transparent hover:border-outline-variant/15 hover:shadow-xl hover:shadow-zinc-200/40">
                    <div class="flex items-start justify-between gap-6">
                        <div class="flex items-start gap-5">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined" data-icon="add_circle">add_circle</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-on-surface text-base">New Purchase Request Created</h4>
                                <p class="text-sm text-on-surface-variant mt-1 leading-relaxed">
                                    User <span class="font-semibold text-on-surface">Elena Rodriguez</span> initiated PR-4092
                                    for <span class="font-semibold text-on-surface">1,500 units of Raw Silicon</span>.
                                </p>
                                <div class="flex flex-wrap items-center gap-4 mt-4">
                                    <span class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant flex items-center">
                                        <span class="material-symbols-outlined text-xs mr-1" data-icon="schedule">schedule</span>
                                        14:32 PM
                                    </span>
                                    <span
                                        class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 text-[10px] font-black uppercase tracking-widest border border-blue-100">PROCUREMENT</span>
                                    <span class="text-[11px] text-zinc-400 font-medium">IP: 192.168.1.44</span>
                                </div>
                            </div>
                        </div>
                        <button
                            class="p-2 text-zinc-400 hover:text-on-surface hover:bg-zinc-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
                        </button>
                    </div>
                </div>

                <div
                    class="group relative bg-surface-container-lowest p-6 rounded-2xl hover:bg-white transition-all border border-transparent hover:border-outline-variant/15 hover:shadow-xl hover:shadow-zinc-200/40">
                    <div class="flex items-start justify-between gap-6">
                        <div class="flex items-start gap-5">
                            <div
                                class="w-12 h-12 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined" data-icon="edit_square">edit_square</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-on-surface text-base">Inventory Stock Adjustment</h4>
                                <p class="text-sm text-on-surface-variant mt-1 leading-relaxed">
                                    <span class="font-semibold text-on-surface">Warehouse-B Robot #4</span> reported a
                                    variance update on Item <span class="font-semibold text-on-surface">AX-224 (Titanium
                                        Plates)</span>. Quantity adjusted from 450 to 442.
                                </p>
                                <div class="flex flex-wrap items-center gap-4 mt-4">
                                    <span class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant flex items-center">
                                        <span class="material-symbols-outlined text-xs mr-1" data-icon="schedule">schedule</span>
                                        11:15 AM
                                    </span>
                                    <span
                                        class="px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 text-[10px] font-black uppercase tracking-widest border border-amber-100">LOGISTICS</span>
                                    <span class="text-[11px] text-zinc-400 font-medium">System Automated</span>
                                </div>
                            </div>
                        </div>
                        <button
                            class="p-2 text-zinc-400 hover:text-on-surface hover:bg-zinc-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
                        </button>
                    </div>
                </div>

                <div
                    class="group relative bg-surface-container-lowest p-6 rounded-2xl hover:bg-white transition-all border border-transparent hover:border-outline-variant/15 hover:shadow-xl hover:shadow-zinc-200/40">
                    <div class="flex items-start justify-between gap-6">
                        <div class="flex items-start gap-5">
                            <div
                                class="w-12 h-12 rounded-full bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined" data-icon="delete_forever">delete_forever</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-on-surface text-base">Supplier Record Archived</h4>
                                <p class="text-sm text-on-surface-variant mt-1 leading-relaxed">
                                    Admin <span class="font-semibold text-on-surface">Marcus Thorne</span> removed <span
                                        class="font-semibold text-on-surface">Global Dynamics Ltd.</span> from the active
                                    vendors list due to contract expiration.
                                </p>
                                <div class="flex flex-wrap items-center gap-4 mt-4">
                                    <span class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant flex items-center">
                                        <span class="material-symbols-outlined text-xs mr-1" data-icon="schedule">schedule</span>
                                        09:45 AM
                                    </span>
                                    <span
                                        class="px-2.5 py-1 rounded-full bg-red-50 text-red-700 text-[10px] font-black uppercase tracking-widest border border-red-100">ADMINISTRATION</span>
                                    <span class="text-[11px] text-zinc-400 font-medium">IP: 10.0.0.12</span>
                                </div>
                            </div>
                        </div>
                        <button
                            class="p-2 text-zinc-400 hover:text-on-surface hover:bg-zinc-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="relative z-10 mt-12 mb-8">
                <div class="flex items-center">
                    <div
                        class="w-[64px] h-[64px] rounded-2xl bg-surface-container-low border border-outline-variant/20 flex items-center justify-center">
                        <div class="text-center">
                            <span class="block text-[10px] uppercase font-black text-on-surface-variant">Oct</span>
                            <span class="block text-xl font-black text-zinc-400 -mt-1">23</span>
                        </div>
                    </div>
                    <div class="ml-6">
                        <h3 class="text-xl font-bold text-zinc-400">Wednesday</h3>
                        <p class="text-sm text-on-surface-variant font-medium">98 Events recorded</p>
                    </div>
                </div>
            </div>

            <div class="space-y-6 pl-[88px]">
                <div class="group relative bg-surface-container-low/40 p-6 rounded-2xl border border-transparent">
                    <div class="flex items-start gap-5 opacity-60">
                        <div
                            class="w-12 h-12 rounded-full bg-zinc-100 text-zinc-500 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined" data-icon="lock_open">lock_open</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-on-surface text-base">User Login Successful</h4>
                            <p class="text-sm text-on-surface-variant mt-1">Elena Rodriguez signed in via Google SSO.</p>
                            <div class="flex items-center gap-4 mt-4">
                                <span
                                    class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant flex items-center">
                                    <span class="material-symbols-outlined text-xs mr-1" data-icon="schedule">schedule</span>
                                    23:59 PM
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-16 text-center">
            <button
                class="px-8 py-3 bg-white text-on-surface font-bold text-sm rounded-xl shadow-sm border border-outline-variant/20 hover:bg-zinc-50 transition-colors">
                Load Previous Entries
            </button>
        </div>
    </main>

    <button
        class="fixed bottom-8 right-8 bg-primary text-on-primary-container px-6 py-4 rounded-2xl shadow-2xl flex items-center font-bold tracking-tight hover:scale-105 active:scale-95 transition-all z-50">
        <span class="material-symbols-outlined mr-3" data-icon="download">download</span>
        Export Full Audit Report
    </button>
</body>

</html>
