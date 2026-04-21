<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>InvenTrack - Purchase Requests</title>
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

    <link href="{{ asset('css/admin-Request.css') }}" rel="stylesheet">
</head>

<body class="bg-surface text-on-surface">
    @include('admin.partials.dashboard-sidebar')

    <!-- TopNavBar -->
    <header
        class="fixed top-0 right-0 left-0 md:left-64 h-16 z-40 bg-white/80 dark:bg-zinc-900/80 backdrop-blur-xl shadow-sm shadow-zinc-200/50 dark:shadow-none flex items-center justify-between px-4 md:px-8 w-full">
        <div class="flex items-center gap-4 flex-1">
            <div class="relative w-full max-w-md">
                <span
                    class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-zinc-400 text-sm">search</span>
                <input
                    class="w-full bg-zinc-100/50 dark:bg-zinc-800/50 border-none rounded-lg py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-blue-600 transition-all outline-none"
                    placeholder="Search purchase requests..." type="text" />
            </div>
        </div>
        <div class="flex items-center gap-6">
            <button class="relative text-zinc-500 hover:bg-zinc-50 p-2 rounded-full transition-all active:scale-95">
                <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
            </button>
            <div class="flex items-center gap-3 group cursor-pointer">
                <div class="text-right">
                    <p class="text-sm font-semibold text-zinc-900 dark:text-zinc-50 leading-tight">Admin User</p>
                    <p class="text-[11px] text-zinc-500">Logistics Manager</p>
                </div>
                <img alt="User Avatar" class="w-10 h-10 rounded-full object-cover"
                    data-alt="professional corporate headshot of a middle-aged male manager in a modern office environment"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCMiU2Oy7d0OpRPi8eiBliFLHIwMPGo5h6kS6AehQO21kYz0UkZ4x_eHtTW1032B3bNgjqFwvZK3gPTQYh0D-hlM1-eYHgKJDwqOeRs3TFoO5Jn3DfxW8z6kJZTPP3LW1FzhZmMrUirdZwZcTzUMigYhxQfIvN8J0KZYHxR4Sutv4WKishiSOF6rj2e1gKhUOJEnimzwYdmR2mDtozRZQHvEeh9wyJd6OBa8QDR3IIa2LvX2yDzM8fYdz4ZnGM8FPfwQeWOeBtrS7e0" />
            </div>
        </div>
    </header>
    <!-- Main Content Canvas -->
    <main class="ml-0 md:ml-64 pt-24 px-4 md:px-8 pb-12 min-h-screen">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
            <div>
                <nav class="flex text-[11px] font-bold uppercase tracking-wider text-on-surface-variant mb-2 gap-2">
                    <span class="hover:text-primary cursor-pointer transition-colors">Purchasing</span>
                    <span>/</span>
                    <span class="text-zinc-400">Request List</span>
                </nav>
                <h2 class="text-4xl font-extrabold tracking-tight text-on-surface">Purchase Request</h2>
            </div>
            <button
                class="flex items-center gap-2 bg-gradient-to-br from-primary to-primary-container text-white px-6 py-3 rounded-lg font-semibold text-sm shadow-lg shadow-blue-600/20 active:scale-95 transition-all">
                <span class="material-symbols-outlined text-sm" data-icon="add">add</span>
                Buat PR
            </button>
        </div>
        <!-- Filters & Toolbar -->
        <div class="bg-surface-container-low p-5 rounded-xl flex flex-wrap items-center gap-6 mb-8">
            <div class="flex-1 flex flex-wrap items-center gap-4">
                <div class="group relative">
                    <label
                        class="block text-[10px] font-bold uppercase tracking-tighter text-on-surface-variant mb-1 ml-1">Status</label>
                    <select
                        class="appearance-none bg-surface-container-lowest border-none rounded-lg text-sm px-4 py-2 pr-10 focus:ring-2 focus:ring-primary transition-all outline-none cursor-pointer min-w-[140px]">
                        <option>All Status</option>
                        <option>Approved</option>
                        <option>Pending</option>
                        <option>Rejected</option>
                    </select>
                    <span
                        class="material-symbols-outlined absolute right-3 bottom-2.5 text-zinc-400 pointer-events-none text-sm">expand_more</span>
                </div>
                <div class="group relative">
                    <label
                        class="block text-[10px] font-bold uppercase tracking-tighter text-on-surface-variant mb-1 ml-1">Date
                        Range</label>
                    <div class="bg-surface-container-lowest flex items-center gap-2 rounded-lg px-4 py-2">
                        <span class="material-symbols-outlined text-sm text-zinc-400">calendar_today</span>
                        <input class="bg-transparent border-none text-sm p-0 focus:ring-0 w-48 outline-none"
                            placeholder="15 Feb 2026 - 22 Feb 2026" type="text" />
                    </div>
                </div>
                <div class="group relative">
                    <label
                        class="block text-[10px] font-bold uppercase tracking-tighter text-on-surface-variant mb-1 ml-1">Department</label>
                    <select
                        class="appearance-none bg-surface-container-lowest border-none rounded-lg text-sm px-4 py-2 pr-10 focus:ring-2 focus:ring-primary transition-all outline-none cursor-pointer min-w-[160px]">
                        <option>All Departments</option>
                        <option>Production</option>
                        <option>Logistics</option>
                        <option>Maintenance</option>
                        <option>Quality Control</option>
                    </select>
                    <span
                        class="material-symbols-outlined absolute right-3 bottom-2.5 text-zinc-400 pointer-events-none text-sm">expand_more</span>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <button
                    class="p-2.5 bg-surface-container-highest text-on-surface rounded-lg hover:bg-zinc-200 transition-all active:scale-95"
                    title="Export to PDF">
                    <span class="material-symbols-outlined text-sm">picture_as_pdf</span>
                </button>
                <button
                    class="p-2.5 bg-surface-container-highest text-on-surface rounded-lg hover:bg-zinc-200 transition-all active:scale-95"
                    title="Export to Excel">
                    <span class="material-symbols-outlined text-sm">grid_on</span>
                </button>
            </div>
        </div>
        <!-- Data Table Container -->
        <div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-surface-container-low border-b-none">
                    <tr>
                        <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-on-surface-variant">PR
                            Number</th>
                        <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-on-surface-variant">
                            Date</th>
                        <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-on-surface-variant">
                            Department</th>
                        <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-on-surface-variant">
                            Requester</th>
                        <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-on-surface-variant">
                            Status</th>
                        <th
                            class="px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-on-surface-variant text-right">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y-0">
                    <!-- Row 1 -->
                    <tr class="hover:bg-surface-container-low transition-colors group">
                        <td class="px-6 py-5">
                            <span class="text-sm font-bold text-primary font-mono tracking-tight">#PR-2026-001</span>
                        </td>
                        <td class="px-6 py-5 text-sm text-on-surface-variant">15 Feb 2026</td>
                        <td class="px-6 py-5">
                            <span class="text-sm font-medium text-on-surface">Production</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[10px] font-bold text-blue-700">
                                    AW</div>
                                <span class="text-sm font-medium text-on-surface">Andi Wijaya</span>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-500/10 text-green-700">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-600 mr-2"></span>
                                Approved
                            </span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <button
                                class="p-2 text-zinc-400 hover:text-primary hover:bg-white rounded-lg transition-all active:scale-90">
                                <span class="material-symbols-outlined text-sm">visibility</span>
                            </button>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr class="hover:bg-surface-container-low transition-colors group">
                        <td class="px-6 py-5">
                            <span class="text-sm font-bold text-primary font-mono tracking-tight">#PR-2026-002</span>
                        </td>
                        <td class="px-6 py-5 text-sm text-on-surface-variant">16 Feb 2026</td>
                        <td class="px-6 py-5">
                            <span class="text-sm font-medium text-on-surface">Logistics</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-zinc-100 flex items-center justify-center text-[10px] font-bold text-zinc-700">
                                    SP</div>
                                <span class="text-sm font-medium text-on-surface">Siti Putri</span>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-orange-500/10 text-orange-700">
                                <span class="w-1.5 h-1.5 rounded-full bg-orange-600 mr-2"></span>
                                Pending
                            </span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <button
                                class="p-2 text-zinc-400 hover:text-primary hover:bg-white rounded-lg transition-all active:scale-90">
                                <span class="material-symbols-outlined text-sm">visibility</span>
                            </button>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr class="hover:bg-surface-container-low transition-colors group">
                        <td class="px-6 py-5">
                            <span class="text-sm font-bold text-primary font-mono tracking-tight">#PR-2026-003</span>
                        </td>
                        <td class="px-6 py-5 text-sm text-on-surface-variant">18 Feb 2026</td>
                        <td class="px-6 py-5">
                            <span class="text-sm font-medium text-on-surface">Maintenance</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[10px] font-bold text-blue-700">
                                    BK</div>
                                <span class="text-sm font-medium text-on-surface">Budi Kusuma</span>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-500/10 text-red-700">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-600 mr-2"></span>
                                Rejected
                            </span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <button
                                class="p-2 text-zinc-400 hover:text-primary hover:bg-white rounded-lg transition-all active:scale-90">
                                <span class="material-symbols-outlined text-sm">visibility</span>
                            </button>
                        </td>
                    </tr>
                    <!-- Loading Skeleton Placeholder Row -->
                    <tr class="opacity-40 animate-pulse pointer-events-none">
                        <td class="px-6 py-5">
                            <div class="h-4 bg-zinc-200 rounded w-24"></div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="h-4 bg-zinc-200 rounded w-20"></div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="h-4 bg-zinc-200 rounded w-24"></div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-zinc-200"></div>
                                <div class="h-4 bg-zinc-200 rounded w-24"></div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="h-6 bg-zinc-200 rounded-full w-20"></div>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <div class="h-8 w-8 bg-zinc-200 rounded-lg ml-auto"></div>
                        </td>
                    </tr>
                    <!-- Row 4 -->
                    <tr class="hover:bg-surface-container-low transition-colors group">
                        <td class="px-6 py-5">
                            <span class="text-sm font-bold text-primary font-mono tracking-tight">#PR-2026-004</span>
                        </td>
                        <td class="px-6 py-5 text-sm text-on-surface-variant">21 Feb 2026</td>
                        <td class="px-6 py-5">
                            <span class="text-sm font-medium text-on-surface">Quality Control</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-zinc-100 flex items-center justify-center text-[10px] font-bold text-zinc-700">
                                    DH</div>
                                <span class="text-sm font-medium text-on-surface">Dewi Hestari</span>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-500/10 text-green-700">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-600 mr-2"></span>
                                Approved
                            </span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <button
                                class="p-2 text-zinc-400 hover:text-primary hover:bg-white rounded-lg transition-all active:scale-90">
                                <span class="material-symbols-outlined text-sm">visibility</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Pagination -->
            <div
                class="bg-surface-container-low px-6 py-4 flex items-center justify-between border-t border-zinc-100 dark:border-zinc-800">
                <p class="text-[11px] text-on-surface-variant font-medium">Showing 1-10 of 24 Purchase Requests</p>
                <div class="flex items-center gap-1">
                    <button class="p-2 text-zinc-400 hover:bg-white rounded-lg transition-all disabled:opacity-30"
                        disabled="">
                        <span class="material-symbols-outlined text-sm">chevron_left</span>
                    </button>
                    <button
                        class="w-8 h-8 flex items-center justify-center bg-primary text-white text-[11px] font-bold rounded-lg shadow-md shadow-primary/20">1</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center text-[11px] font-bold text-zinc-500 hover:bg-white rounded-lg">2</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center text-[11px] font-bold text-zinc-500 hover:bg-white rounded-lg">3</button>
                    <button class="p-2 text-zinc-400 hover:bg-white rounded-lg transition-all">
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Quick Summary Widgets (Asymmetric Layout Example) -->
        <div class="mt-12 grid grid-cols-12 gap-8">
            <div class="col-span-12 lg:col-span-8">
                <div class="bg-surface-container p-6 rounded-xl flex items-center gap-8 border-l-4 border-primary">
                    <div class="flex-1">
                        <h4 class="text-[10px] font-black uppercase tracking-widest text-primary mb-1">Monthly
                            Procurement Insights</h4>
                        <p class="text-on-surface-variant text-sm leading-relaxed">System processing speeds have
                            increased by 14% this month. Average PR-to-PO conversion time is currently 1.4 days.</p>
                    </div>
                    <div class="w-px h-12 bg-zinc-200"></div>
                    <div class="text-center">
                        <p class="text-2xl font-black text-on-surface">248</p>
                        <p class="text-[9px] uppercase font-bold text-zinc-400">Total Requests</p>
                    </div>
                </div>
            </div>
            <div
                class="col-span-12 lg:col-span-4 bg-zinc-900 text-white p-6 rounded-xl flex flex-col justify-between relative overflow-hidden group">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-primary/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700">
                </div>
                <div>
                    <h4 class="text-[10px] font-black uppercase tracking-widest text-zinc-400 mb-4">Urgent Approvals
                    </h4>
                    <p class="text-lg font-medium leading-tight mb-2">3 Pending requests require your immediate
                        signature.</p>
                </div>
                <button
                    class="w-fit text-primary font-bold text-xs uppercase tracking-widest flex items-center gap-2 mt-4 hover:gap-3 transition-all">
                    Go to Approval Queue
                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                </button>
            </div>
        </div>
    </main>
    <!-- FAB Suppression (Per Mandate) -->
    <!-- Suppressed on List View screens to avoid clutter and focus on the Data Table actions -->
</body>

</html>
