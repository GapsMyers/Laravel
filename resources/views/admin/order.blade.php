<!DOCTYPE html>
<html class="light" lang="en">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<title>Purchase Request Management | InvenTrack</title>

	<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;800;900&amp;display=swap"
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

	<link href="{{ asset('css/admin-order.css') }}" rel="stylesheet">
</head>

<body class="bg-background text-on-surface flex min-h-screen">
	@include('admin.partials.dashboard-sidebar')

	<header
		class="fixed top-0 right-0 left-0 md:left-64 h-16 z-40 bg-white/80 dark:bg-zinc-900/80 backdrop-blur-xl flex items-center justify-between px-4 md:px-8 w-full shadow-sm shadow-zinc-200/50 dark:shadow-none">
		<div class="flex items-center gap-6 w-full md:w-auto">
			<div class="relative w-full md:w-auto">
				<span
					class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400 text-lg">search</span>
				<input
					class="bg-zinc-100/50 dark:bg-zinc-800/50 border-none rounded-lg pl-10 pr-4 py-2 text-sm w-full md:w-80 focus:ring-1 focus:ring-blue-600 transition-all outline-none"
					placeholder="Search orders, vendors..." type="text" />
			</div>
		</div>
		<div class="hidden sm:flex items-center gap-4">
			<button
				class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition-all active:scale-95 duration-200">
				<span class="material-symbols-outlined text-zinc-600 dark:text-zinc-400">notifications</span>
			</button>
			<div class="h-8 w-px bg-zinc-200 dark:bg-zinc-800 mx-2"></div>
			<div class="flex items-center gap-3 cursor-pointer group">
				<div class="text-right">
					<p class="text-[13px] font-semibold text-zinc-900 dark:text-zinc-100 leading-none">Alex Sterling</p>
					<p class="text-[11px] text-zinc-500 leading-none mt-1">Procurement Manager</p>
				</div>
				<img alt="User Avatar" class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm"
					src="https://lh3.googleusercontent.com/aida-public/AB6AXuC1-qUn9kV-lHNhSX19a3avmVK9ODztQUvygw3J77Sf-4uNykPje0TgyeUSEIgWlYCzFm2nxdCL55n0aZnUNImHrBm3xlHCZusrX0jAnVPJZqezxywYkBIdvSis6hwHeCUQrPGiZaXFPGjsxF4N-fCe_KBtjj8ytdkWQjO4pdAY-IQlJR-K5xSYJHZVG0vYtOrlAlDYJRn3Ptf4mwboHCwmC_xXpf4gzr8Md0bsNH-1OvL9Dui17vmDNqa-lsV5OIvsnzGwudWD4UH8" />
			</div>
		</div>
	</header>

	<main class="ml-0 md:ml-64 mt-16 p-4 md:p-8 flex-1 flex flex-col gap-8 max-w-[1600px] w-full">
		<section class="flex flex-col md:flex-row md:justify-between md:items-end gap-4">
			<div>
				<span class="text-[11px] font-bold text-blue-600 tracking-widest uppercase mb-2 block">Management
					Cluster</span>
				<h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-on-surface">Purchase Requests</h2>
				<p class="text-on-surface-variant mt-2 max-w-lg">Monitor, track, and manage all active procurement
					cycles across regional manufacturing hubs.</p>
			</div>
		</section>

		<section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
			<div class="bg-surface-container-low p-6 rounded-xl flex flex-col justify-between">
				<p class="uppercase tracking-wider text-on-surface-variant font-bold text-[10px]">Total Active PRs</p>
				<div class="mt-4 flex items-end justify-between">
					<span class="text-3xl font-black text-on-surface">{{ $stats['total'] }}</span>
					<span class="text-xs text-blue-600 bg-blue-100 px-2 py-0.5 rounded-full font-bold">+0%</span>
				</div>
			</div>
			<div class="bg-surface-container-low p-6 rounded-xl flex flex-col justify-between">
				<p class="uppercase tracking-wider text-on-surface-variant font-bold text-[10px]">Pending Approval</p>
				<div class="mt-4 flex items-end justify-between">
					<span class="text-3xl font-black text-on-surface">{{ $stats['pending'] }}</span>
					<span class="material-symbols-outlined text-orange-500">pending_actions</span>
				</div>
			</div>
			<div class="bg-surface-container-low p-6 rounded-xl flex flex-col justify-between">
				<p class="uppercase tracking-wider text-on-surface-variant font-bold text-[10px]">Approved / In Process</p>
				<div class="mt-4 flex items-end justify-between">
					<span class="text-3xl font-black text-on-surface">{{ $stats['approved'] }}</span>
					<span class="material-symbols-outlined text-green-600">local_shipping</span>
				</div>
			</div>
			<div class="bg-surface-container-low p-6 rounded-xl flex flex-col justify-between">
				<p class="uppercase tracking-wider text-on-surface-variant font-bold text-[10px]">Fully Received</p>
				<div class="mt-4 flex items-end justify-between">
					<span class="text-3xl font-black text-blue-600">{{ $stats['received'] }}</span>
					<span class="material-symbols-outlined text-blue-600">task_alt</span>
				</div>
			</div>
		</section>

		<section class="flex flex-col xl:flex-row gap-8">
			<div class="flex-1 bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden min-h-[600px]">
				<div class="px-6 md:px-8 py-6 flex items-center justify-between border-b border-zinc-100/50">
					<h3 class="font-bold text-lg text-on-surface">Active Orders</h3>
					<div class="flex gap-2">
						<button class="p-2 hover:bg-zinc-100 rounded-lg transition-colors"><span
								class="material-symbols-outlined text-zinc-500">filter_list</span></button>
						<button class="p-2 hover:bg-zinc-100 rounded-lg transition-colors"><span
								class="material-symbols-outlined text-zinc-500">sort</span></button>
					</div>
				</div>
				<div class="overflow-x-auto">
					<table class="min-w-[760px] w-full text-left border-collapse">
						<thead>
							<tr class="bg-surface-container-low/50">
								<th class="px-8 py-4 text-[11px] font-black uppercase tracking-widest text-on-surface-variant">PO
									Number</th>
								<th class="px-8 py-4 text-[11px] font-black uppercase tracking-widest text-on-surface-variant">
									Vendor</th>
								<th class="px-8 py-4 text-[11px] font-black uppercase tracking-widest text-on-surface-variant">Date
								</th>
								<th class="px-8 py-4 text-[11px] font-black uppercase tracking-widest text-on-surface-variant">
									Status</th>
								<th class="px-8 py-4 text-[11px] font-black uppercase tracking-widest text-on-surface-variant">
									Total</th>
							</tr>
						</thead>
						<tbody class="divide-y divide-zinc-50">
							@foreach ($requests as $request)
								<tr onclick="window.location='{{ route('order', ['request' => $request->id]) }}'"
									class="hover:bg-surface-container-high transition-colors cursor-pointer group {{ optional($selectedRequest)->id === $request->id ? 'border-l-2 border-primary bg-surface-container-low/40' : 'bg-zinc-50/30' }}">
									<td class="px-8 py-5 font-bold text-primary text-sm">{{ $request->pr_number }}</td>
									<td class="px-8 py-5 text-sm font-medium text-on-surface">{{ $request->department }}</td>
									<td class="px-8 py-5 text-sm text-on-surface-variant">
										{{ $request->requested_at?->format('M d, Y') ?? '-' }}</td>
									<td class="px-8 py-5">
										@php
											$statusColors = [
											    'pending' => 'bg-orange-100/60 text-orange-700',
											    'approved' => 'bg-blue-100/60 text-blue-700',
											    'partial' => 'bg-cyan-100/60 text-cyan-700',
											    'received' => 'bg-green-100/60 text-green-700',
											    'rejected' => 'bg-red-100/60 text-red-700',
											];
											$color = $statusColors[$request->status] ?? 'bg-zinc-100/60 text-zinc-700';
										@endphp
										<span
											class="px-3 py-1 {{ $color }} text-[11px] font-bold rounded-full uppercase tracking-tighter">
											{{ $request->status }}
										</span>
									</td>
									<td class="px-8 py-5 text-sm font-bold text-on-surface">
										{{ $request->items->sum('qty_requested') }} items</td>
								</tr>
							@endforeach

							@if ($requests->isEmpty())
								<tr>
									<td class="px-8 py-10 text-center text-on-surface-variant text-sm" colspan="5">
										No purchase requests found.
									</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>

			<div class="w-full xl:w-[400px] flex flex-col gap-6">
				<div class="bg-surface-container-lowest p-8 rounded-xl shadow-sm border border-zinc-100/50">
					@if ($selectedRequest)
						<div class="flex items-center gap-4 mb-6">
							<div class="w-14 h-14 bg-zinc-100 rounded-lg flex items-center justify-center">
								<span class="material-symbols-outlined text-3xl text-zinc-400">factory</span>
							</div>
							<div>
								<h4 class="font-black text-lg text-on-surface leading-tight">{{ $selectedRequest->department }}
								</h4>
								<p class="text-xs text-on-surface-variant font-medium">Primary Partner Hub</p>
							</div>
						</div>
						<div class="space-y-4 pt-4 border-t border-zinc-100">
							<div class="flex justify-between items-center">
								<span
									class="text-[11px] font-bold uppercase text-on-surface-variant tracking-tighter">Requester</span>
								<span class="text-sm font-medium text-on-surface">{{ $selectedRequest->requester_name }}</span>
							</div>
							<div class="flex justify-between items-center">
								<span class="text-[11px] font-bold uppercase text-on-surface-variant tracking-tighter">Status</span>
								<span class="text-sm font-bold text-primary uppercase">{{ $selectedRequest->status }}</span>
							</div>
							<div class="flex justify-between items-center">
								<span
									class="text-[11px] font-bold uppercase text-on-surface-variant tracking-tighter">Items</span>
								<span class="text-sm font-medium text-on-surface">{{ $selectedRequest->items->count() }}
									Categories</span>
							</div>
						</div>
					@else
						<div class="text-center py-10 text-on-surface-variant text-sm">
							Select a request to see details.
						</div>
					@endif
				</div>

				@if ($selectedRequest)
					<div class="bg-surface-container-lowest p-8 rounded-xl shadow-sm flex-1 relative overflow-hidden">
						<div
							class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -translate-y-1/2 translate-x-1/2">
						</div>
						<h4 class="font-black text-lg text-on-surface mb-8">Request Progress</h4>
						<div class="relative pl-8 space-y-12">
							<div class="absolute left-[7px] top-1 bottom-1 w-0.5 bg-zinc-200">
								<div class="absolute top-0 left-0 w-full bg-gradient-to-b from-primary to-primary-container"
									style="height: {{ $selectedRequest->status === 'received' ? '100%' : ($selectedRequest->status === 'approved' || $selectedRequest->status === 'partial' ? '66%' : '33%') }}">
								</div>
							</div>

							<div class="relative">
								<div
									class="absolute -left-[31px] w-4 h-4 rounded-full border-4 border-white bg-primary shadow-sm ring-4 ring-primary/10">
								</div>
								<div>
									<p class="text-xs font-bold text-primary uppercase">Requested</p>
									<p class="text-xs text-on-surface-variant mt-0.5">
										{{ $selectedRequest->requested_at?->format('M d, Y') ?? 'N/A' }}</p>
								</div>
							</div>

							<div class="relative">
								<div
									class="absolute -left-[31px] w-4 h-4 rounded-full border-4 border-white {{ in_array($selectedRequest->status, ['approved', 'partial', 'received']) ? 'bg-primary ring-4 ring-primary/10' : 'bg-zinc-200' }} shadow-sm">
								</div>
								<div>
									<p
										class="text-xs font-bold {{ in_array($selectedRequest->status, ['approved', 'partial', 'received']) ? 'text-primary' : 'text-on-surface-variant' }} uppercase">
										Approved</p>
									<p class="text-xs text-on-surface-variant mt-0.5">
										{{ $selectedRequest->approved_at?->format('M d, Y') ?? 'Awaiting...' }}</p>
								</div>
							</div>

							<div class="relative">
								<div
									class="absolute -left-[31px] w-4 h-4 rounded-full border-4 border-white {{ $selectedRequest->status === 'received' ? 'bg-primary ring-4 ring-primary/10' : ($selectedRequest->status === 'partial' ? 'bg-primary animate-pulse' : 'bg-zinc-200') }} shadow-sm">
								</div>
								<div>
									<p
										class="text-xs font-bold {{ in_array($selectedRequest->status, ['partial', 'received']) ? 'text-primary' : 'text-on-surface-variant' }} uppercase">
										Received</p>
									<p class="text-xs text-on-surface-variant mt-0.5">
										{{ $selectedRequest->received_at?->format('M d, Y') ?? 'Pending...' }}</p>
								</div>
							</div>
						</div>

						<a href="{{ route('goods-receipt', ['request' => $selectedRequest->id]) }}"
							class="w-full mt-10 py-3 border border-outline-variant/30 rounded-lg text-sm font-bold text-primary hover:bg-zinc-50 transition-colors flex items-center justify-center gap-2">
							<span class="material-symbols-outlined text-lg">receipt_long</span>
							Manage Receipt
						</a>
					</div>
				@endif
			</div>
		</section>
	</main>

	<button
		class="fixed bottom-6 right-6 md:bottom-8 md:right-8 w-14 h-14 bg-primary text-white rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-50">
		<span class="material-symbols-outlined text-2xl" data-weight="fill">chat_bubble</span>
	</button>
</body>

</html>
