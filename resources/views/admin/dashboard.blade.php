<!DOCTYPE html>
<html class="light" lang="en">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<title>InvenTrack Dashboard | Manufacturing ERP</title>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
		rel="stylesheet" />
	<link
		href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
		rel="stylesheet" />
	<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
	<link href="{{ asset('css/admin-dashboard.css') }}" rel="stylesheet">
</head>

<body class="flex min-h-screen">
	@include('admin.partials.dashboard-sidebar')

	<main class="flex-1 ml-0 md:ml-64 bg-surface">
		<header
			class="fixed top-0 right-0 left-0 md:left-64 h-16 z-40 bg-white/80 dark:bg-zinc-900/80 backdrop-blur-xl flex items-center justify-between px-4 md:px-8 w-full shadow-sm shadow-zinc-200/50 dark:shadow-none">
			<div class="flex items-center gap-4 flex-1">
				<div class="relative w-full max-w-md">
					<span
						class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400 text-lg"
						data-icon="search">search</span>
					<input
						class="w-full pl-10 pr-4 py-2 bg-zinc-100/50 dark:bg-zinc-800/50 border-none rounded-lg text-sm focus:ring-2 focus:ring-blue-500 transition-all outline-none"
						placeholder="Search components, orders, or suppliers..." type="text" />
				</div>
			</div>
			<div class="flex items-center gap-6">
				<button class="relative text-zinc-500 hover:text-blue-600 transition-colors active:scale-95 duration-200">
					<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
					<span class="absolute top-0 right-0 w-2 h-2 bg-error rounded-full"></span>
				</button>
				<div class="hidden sm:flex items-center gap-3 pl-6 border-l border-zinc-200 dark:border-zinc-700">
					<div class="text-right">
						<p class="text-xs font-bold text-zinc-900 dark:text-zinc-50">Alex Chen</p>
						<p class="text-[10px] text-zinc-500 uppercase tracking-tighter">Inventory Manager</p>
					</div>
					<img alt="User Avatar" class="w-9 h-9 rounded-full object-cover border-2 border-white shadow-sm"
						src="https://lh3.googleusercontent.com/aida-public/AB6AXuDncM4zLO5DwaSf2g8ekj81UVxQrYLdY6KEe8PDWPiD-QUUVYxHNkmBZt02442xzgpHtJZQ5G1OQGlA99qLma3NCqirXsoWIzyzxs8wumTC-F7nbi_Gs82HJeJdC9JcK8y9Zo8Is2-825T_4hpz_kI5pzvjJY-tvow1-x7ROv3l2kq17D6pYyzR1dNfrWI-CI61Bzb7oq2-S1DLCztd9H2pC9DpFNGEvdsUY-Nw3Tv9r-nHIsi2HJ-yZL_rvGrjVU9_r0v59H7fqeq4" />
				</div>
			</div>
		</header>

		<div class="pt-24 pb-12 px-4 md:px-8 max-w-[1600px] mx-auto">
			<div class="mb-10 flex justify-between items-end">
				<div>
					<span class="text-[11px] font-bold text-blue-600 tracking-[0.1em] uppercase">Executive Overview</span>
					<h2 class="text-3xl font-black text-on-surface tracking-tight mt-1">Operational Performance</h2>
				</div>
				<div class="hidden md:flex gap-3">
					<button
						class="px-4 py-2 bg-surface-container-high text-on-surface text-sm font-semibold rounded-lg hover:bg-surface-container-highest transition-all flex items-center gap-2">
						<span class="material-symbols-outlined text-lg" data-icon="file_download">file_download</span>
						Export Report
					</button>
					<button
						class="px-5 py-2 bg-gradient-to-br from-primary to-primary-container text-white text-sm font-semibold rounded-lg shadow-lg shadow-blue-500/20 active:scale-95 transition-all flex items-center gap-2">
						<span class="material-symbols-outlined text-lg" data-icon="add">add</span>
						New Request
					</button>
				</div>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
				<div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow group">
					<div class="flex justify-between items-start mb-4">
						<div class="p-2 bg-amber-50 rounded-lg text-amber-600">
							<span class="material-symbols-outlined" data-icon="pending_actions">pending_actions</span>
						</div>
						<span class="text-[10px] font-bold text-amber-600 bg-amber-100/50 px-2 py-0.5 rounded-full">ACTION REQ</span>
					</div>
					<p class="text-sm font-medium text-on-surface-variant mb-1">PR Pending</p>
					<p class="text-4xl font-black text-on-surface">12</p>
					<div class="mt-4 h-1 w-full bg-zinc-100 rounded-full overflow-hidden">
						<div class="h-full bg-amber-500 w-[35%]"></div>
					</div>
				</div>
				<div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
					<div class="flex justify-between items-start mb-4">
						<div class="p-2 bg-emerald-50 rounded-lg text-emerald-600">
							<span class="material-symbols-outlined" data-icon="check_circle">check_circle</span>
						</div>
						<span class="text-[10px] font-bold text-emerald-600 bg-emerald-100/50 px-2 py-0.5 rounded-full">+12% WK</span>
					</div>
					<p class="text-sm font-medium text-on-surface-variant mb-1">PR Approved</p>
					<p class="text-4xl font-black text-on-surface">45</p>
					<div class="mt-4 h-1 w-full bg-zinc-100 rounded-full overflow-hidden">
						<div class="h-full bg-emerald-500 w-[78%]"></div>
					</div>
				</div>
				<div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
					<div class="flex justify-between items-start mb-4">
						<div class="p-2 bg-blue-50 rounded-lg text-blue-600">
							<span class="material-symbols-outlined" data-icon="local_shipping">local_shipping</span>
						</div>
						<span class="text-[10px] font-bold text-blue-600 bg-blue-100/50 px-2 py-0.5 rounded-full">ON-GOING</span>
					</div>
					<p class="text-sm font-medium text-on-surface-variant mb-1">PO Aktif</p>
					<p class="text-4xl font-black text-on-surface">28</p>
					<div class="mt-4 h-1 w-full bg-zinc-100 rounded-full overflow-hidden">
						<div class="h-full bg-blue-500 w-[55%]"></div>
					</div>
				</div>
				<div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
					<div class="flex justify-between items-start mb-4">
						<div class="p-2 bg-rose-50 rounded-lg text-rose-600">
							<span class="material-symbols-outlined" data-icon="warning">warning</span>
						</div>
						<span class="text-[10px] font-bold text-rose-600 bg-rose-100/50 px-2 py-0.5 rounded-full">CRITICAL</span>
					</div>
					<p class="text-sm font-medium text-on-surface-variant mb-1">Stok Menipis</p>
					<p class="text-4xl font-black text-on-surface">5</p>
					<div class="mt-4 h-1 w-full bg-zinc-100 rounded-full overflow-hidden">
						<div class="h-full bg-rose-500 w-[20%]"></div>
					</div>
				</div>
			</div>

			<div class="mb-10 bg-surface-container-low p-8 rounded-2xl">
				<h3 class="text-sm font-bold text-zinc-900 uppercase tracking-widest mb-8">Live Procurement Lifecycle</h3>
				<div class="relative flex items-center justify-between gap-4">
					<div class="absolute top-1/2 left-0 w-full h-1 bg-zinc-200 -translate-y-1/2 z-0"></div>
					<div class="absolute top-1/2 left-0 w-[70%] h-1 bg-blue-600 -translate-y-1/2 z-0"></div>
					<div class="relative z-10 flex flex-col items-center">
						<div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-500/40">
							<span class="material-symbols-outlined text-lg" data-icon="shopping_cart">shopping_cart</span>
						</div>
						<p class="mt-3 text-xs font-bold text-zinc-900">PR (Pending)</p>
					</div>
					<div class="relative z-10 flex flex-col items-center">
						<div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-500/40">
							<span class="material-symbols-outlined text-lg" data-icon="verified">verified</span>
						</div>
						<p class="mt-3 text-xs font-bold text-zinc-900">Approval (Approved)</p>
					</div>
					<div class="relative z-10 flex flex-col items-center">
						<div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-500/40">
							<span class="material-symbols-outlined text-lg" data-icon="description">description</span>
						</div>
						<p class="mt-3 text-xs font-bold text-zinc-900">PO (Ordered)</p>
					</div>
					<div class="relative z-10 flex flex-col items-center">
						<div class="w-10 h-10 rounded-full bg-zinc-100 text-zinc-400 border-4 border-white flex items-center justify-center">
							<span class="material-symbols-outlined text-lg" data-icon="inventory_2">inventory_2</span>
						</div>
						<p class="mt-3 text-xs font-bold text-zinc-400">Goods Receipt</p>
					</div>
				</div>
			</div>

			<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
				<div class="lg:col-span-2 bg-surface-container-lowest p-8 rounded-2xl shadow-sm">
					<div class="flex justify-between items-center mb-10">
						<div>
							<h3 class="text-lg font-bold text-on-surface">Pengadaan Barang Trend</h3>
							<p class="text-xs text-on-surface-variant">Monthly requisition activity analytics</p>
						</div>
						<select class="bg-surface-container text-xs font-semibold border-none rounded-lg focus:ring-0">
							<option>Last 6 Months</option>
							<option>Yearly</option>
						</select>
					</div>
					<div class="relative h-64 w-full flex items-end justify-between px-4">
						<div class="absolute inset-0 flex flex-col justify-between py-2 text-[10px] text-zinc-400 font-medium">
							<span>100</span><span>75</span><span>50</span><span>25</span><span>0</span>
						</div>
						<div class="flex-1 flex flex-col items-center gap-2">
							<div class="w-2 rounded-full bg-blue-100 h-[40%] relative overflow-hidden">
								<div class="absolute bottom-0 w-full bg-blue-600 h-[60%] rounded-full"></div>
							</div>
							<span class="text-[10px] font-bold text-zinc-500">JAN</span>
						</div>
						<div class="flex-1 flex flex-col items-center gap-2">
							<div class="w-2 rounded-full bg-blue-100 h-[60%] relative overflow-hidden">
								<div class="absolute bottom-0 w-full bg-blue-600 h-[75%] rounded-full"></div>
							</div>
							<span class="text-[10px] font-bold text-zinc-500">FEB</span>
						</div>
						<div class="flex-1 flex flex-col items-center gap-2">
							<div class="w-2 rounded-full bg-blue-100 h-[80%] relative overflow-hidden">
								<div class="absolute bottom-0 w-full bg-blue-600 h-[40%] rounded-full"></div>
							</div>
							<span class="text-[10px] font-bold text-zinc-500">MAR</span>
						</div>
						<div class="flex-1 flex flex-col items-center gap-2">
							<div class="w-2 rounded-full bg-blue-100 h-[55%] relative overflow-hidden">
								<div class="absolute bottom-0 w-full bg-blue-600 h-[90%] rounded-full"></div>
							</div>
							<span class="text-[10px] font-bold text-zinc-500">APR</span>
						</div>
						<div class="flex-1 flex flex-col items-center gap-2">
							<div class="w-2 rounded-full bg-blue-100 h-[70%] relative overflow-hidden">
								<div class="absolute bottom-0 w-full bg-blue-600 h-[65%] rounded-full"></div>
							</div>
							<span class="text-[10px] font-bold text-zinc-500">MAY</span>
						</div>
						<div class="flex-1 flex flex-col items-center gap-2">
							<div class="w-2 rounded-full bg-blue-100 h-[90%] relative overflow-hidden">
								<div class="absolute bottom-0 w-full bg-blue-600 h-[85%] rounded-full"></div>
							</div>
							<span class="text-[10px] font-bold text-zinc-500">JUN</span>
						</div>
					</div>
				</div>
				<div class="bg-surface-container-lowest p-8 rounded-2xl shadow-sm">
					<h3 class="text-lg font-bold text-on-surface mb-6">Recent Activities</h3>
					<div class="space-y-6">
						<div class="flex gap-4">
							<div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0 text-blue-600">
								<span class="material-symbols-outlined text-lg" data-icon="add_shopping_cart">add_shopping_cart</span>
							</div>
							<div>
								<p class="text-[13px] font-bold text-zinc-900">New PR created by Finance</p>
								<p class="text-[11px] text-zinc-500 mt-0.5">2 minutes ago • ID: #PR-9921</p>
							</div>
						</div>
						<div class="flex gap-4">
							<div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center flex-shrink-0 text-emerald-600">
								<span class="material-symbols-outlined text-lg" data-icon="inventory">inventory</span>
							</div>
							<div>
								<p class="text-[13px] font-bold text-zinc-900">PO #1023 arrived</p>
								<p class="text-[11px] text-zinc-500 mt-0.5">1 hour ago • Warehouse A</p>
							</div>
						</div>
						<div class="flex gap-4">
							<div class="w-10 h-10 rounded-full bg-amber-50 flex items-center justify-center flex-shrink-0 text-amber-600">
								<span class="material-symbols-outlined text-lg" data-icon="edit_note">edit_note</span>
							</div>
							<div>
								<p class="text-[13px] font-bold text-zinc-900">Approval pending for #PR-9800</p>
								<p class="text-[11px] text-zinc-500 mt-0.5">3 hours ago • Awaiting CEO</p>
							</div>
						</div>
						<div class="flex gap-4">
							<div class="w-10 h-10 rounded-full bg-rose-50 flex items-center justify-center flex-shrink-0 text-rose-600">
								<span class="material-symbols-outlined text-lg" data-icon="report_problem">report_problem</span>
							</div>
							<div>
								<p class="text-[13px] font-bold text-zinc-900">Critical Stock: Raw Steel</p>
								<p class="text-[11px] text-zinc-500 mt-0.5">5 hours ago • Level: 12%</p>
							</div>
						</div>
						<button class="w-full py-3 text-[11px] font-black uppercase tracking-widest text-blue-600 hover:bg-blue-50 rounded-lg transition-colors mt-4">
							View All Activity
						</button>
					</div>
				</div>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-10">
				<div class="md:col-span-2 relative overflow-hidden rounded-2xl h-48 group">
					<img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
						src="https://lh3.googleusercontent.com/aida-public/AB6AXuC_LOFO-_hherVLaQRo9ERBxZAXnBKDejD2MJWxZHtRKZdbxOIr5gXD0lcvzKlAqBMJGIkAQKS8fZrP2NvULGCbm5Ndrss7XXJk4e6louTB4lnSAhBtJwd52quTbutohx25SdY6rUmfkCuWEeQBqc_oK70-fE6k2LjlitVASBxCl25JhBiEqvdjtY7EeqFutOoTepEGaPn1c8mrZ4UXlkedl1CM-qqTcacpoKaQl_SAMfXs1Npb2LQc-Nl2xuxGWm2OTImIS8w42Lm5"
						alt="Warehouse" />
					<div class="absolute inset-0 bg-gradient-to-t from-zinc-900/80 to-transparent"></div>
					<div class="absolute bottom-0 left-0 p-6">
						<p class="text-xs font-bold text-blue-400 mb-1">Warehouse Optimization</p>
						<h4 class="text-xl font-bold text-white">Zone B Capacity: 94%</h4>
					</div>
				</div>
				<div class="bg-blue-600 rounded-2xl p-6 flex flex-col justify-between text-white">
					<span class="material-symbols-outlined text-3xl" data-icon="support_agent">support_agent</span>
					<div>
						<p class="text-sm opacity-80">Concierge Help</p>
						<p class="font-bold">Chat with Logistics Expert</p>
					</div>
				</div>
				<div class="bg-zinc-900 rounded-2xl p-6 flex flex-col justify-between text-white">
					<div class="flex justify-between items-start">
						<span class="material-symbols-outlined text-blue-400" data-icon="monitoring">monitoring</span>
						<span class="text-[10px] font-bold text-zinc-400">REALTIME</span>
					</div>
					<div>
						<p class="text-2xl font-black">2.4s</p>
						<p class="text-[10px] text-zinc-500 uppercase font-bold tracking-widest">Avg. Processing Time</p>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>

</html>
