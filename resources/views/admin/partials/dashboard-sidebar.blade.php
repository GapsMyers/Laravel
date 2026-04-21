<aside class="fixed left-0 top-0 hidden h-screen w-64 z-50 bg-zinc-50 dark:bg-zinc-950 md:flex flex-col py-8 shadow-sm">
    <div class="px-8 mb-10">
        <h1 class="text-xl font-black tracking-tight text-zinc-900 dark:text-zinc-50">InvenTrack</h1>
        <p class="text-[11px] font-bold uppercase tracking-widest text-zinc-400 mt-1">Manufacturing ERP</p>
    </div>

    <nav class="flex-1 space-y-1">
        <a class="group flex items-center px-8 py-3 {{ request()->routeIs('dashboard') ? 'border-l-[3px] border-blue-600 bg-zinc-200/50 dark:bg-zinc-800/40 text-blue-700 dark:text-blue-300 font-bold transition-all' : 'text-zinc-500 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-colors' }}"
            href="{{ route('dashboard') }}">
            <span class="material-symbols-outlined mr-4 transition-transform group-hover:translate-x-1 duration-300"
                data-icon="dashboard">dashboard</span>
            <span class="font-sans text-[13px] font-medium">Dashboard</span>
        </a>
        <a class="group flex items-center px-8 py-3 {{ request()->routeIs('request') ? 'border-l-[3px] border-blue-600 bg-zinc-200/50 dark:bg-zinc-800/40 text-blue-700 dark:text-blue-300 font-bold transition-all' : 'text-zinc-500 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-colors' }}"
            href="{{ route('request') }}">
            <span class="material-symbols-outlined mr-4 transition-transform group-hover:translate-x-1 duration-300"
                data-icon="shopping_cart">shopping_cart</span>
            <span class="font-sans text-[13px] font-medium">Purchase Request</span>
        </a>
        <a class="group flex items-center px-8 py-3 {{ request()->routeIs('approval') ? 'border-l-[3px] border-blue-600 bg-zinc-200/50 dark:bg-zinc-800/40 text-blue-700 dark:text-blue-300 font-bold transition-all' : 'text-zinc-500 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-colors' }}"
            href="{{ route('approval') }}">
            <span class="material-symbols-outlined mr-4 transition-transform group-hover:translate-x-1 duration-300"
                data-icon="verified">verified</span>
            <span class="font-sans text-[13px] font-medium">Approval</span>
        </a>
        <a class="group flex items-center px-8 py-3 {{ request()->routeIs('order') ? 'border-l-[3px] border-blue-600 bg-zinc-200/50 dark:bg-zinc-800/40 text-blue-700 dark:text-blue-300 font-bold transition-all' : 'text-zinc-500 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-colors' }}"
            href="{{ route('order') }}">
            <span class="material-symbols-outlined mr-4 transition-transform group-hover:translate-x-1 duration-300"
                data-icon="description">description</span>
            <span class="font-sans text-[13px] font-medium">Purchase Order</span>
        </a>
        <a class="group flex items-center px-8 py-3 text-zinc-500 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-colors"
            href="#">
            <span class="material-symbols-outlined mr-4 transition-transform group-hover:translate-x-1 duration-300"
                data-icon="inventory_2">inventory_2</span>
            <span class="font-sans text-[13px] font-medium">Goods Receipt</span>
        </a>
        <a class="group flex items-center px-8 py-3 {{ request()->routeIs('barangs.*') ? 'border-l-[3px] border-blue-600 bg-zinc-200/50 dark:bg-zinc-800/40 text-blue-700 dark:text-blue-300 font-bold transition-all' : 'text-zinc-500 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-colors' }}"
            href="{{ route('barangs.index') }}">
            <span class="material-symbols-outlined mr-4 transition-transform group-hover:translate-x-1 duration-300"
                data-icon="warehouse">warehouse</span>
            <span class="font-sans text-[13px] font-medium">Inventory</span>
        </a>
        <a class="group flex items-center px-8 py-3 text-zinc-500 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-colors"
            href="#">
            <span class="material-symbols-outlined mr-4 transition-transform group-hover:translate-x-1 duration-300"
                data-icon="history">history</span>
            <span class="font-sans text-[13px] font-medium">Audit Log</span>
        </a>
        <a class="group flex items-center px-8 py-3 {{ request()->routeIs('karyawan.*') ? 'border-l-[3px] border-blue-600 bg-zinc-200/50 dark:bg-zinc-800/40 text-blue-700 dark:text-blue-300 font-bold transition-all' : 'text-zinc-500 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-colors' }}"
            href="{{ route('karyawan.index') }}">
            <span class="material-symbols-outlined mr-4 transition-transform group-hover:translate-x-1 duration-300"
                data-icon="group">group</span>
            <span class="font-sans text-[13px] font-medium">Users</span>
        </a>
    </nav>

    <div class="mt-auto border-t border-zinc-100 dark:border-zinc-800 pt-6 space-y-1">
        <a class="group flex items-center px-8 py-3 text-zinc-500 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-colors"
            href="#">
            <span class="material-symbols-outlined mr-4 transition-transform group-hover:translate-x-1 duration-300"
                data-icon="settings">settings</span>
            <span class="font-sans text-[13px] font-medium">Settings</span>
        </a>
        <a class="group flex items-center px-8 py-3 text-zinc-500 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-colors"
            href="#">
            <span class="material-symbols-outlined mr-4 transition-transform group-hover:translate-x-1 duration-300"
                data-icon="help">help</span>
            <span class="font-sans text-[13px] font-medium">Support</span>
        </a>
    </div>
</aside>
