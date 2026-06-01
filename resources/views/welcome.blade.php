<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-secondary-fixed": "#0d1c2e",
                        "secondary": "#515f74",
                        "primary-fixed-dim": "#b4c5ff",
                        "surface-container-low": "#f4f4f3",
                        "on-tertiary-fixed-variant": "#653e00",
                        "error": "#ba1a1a",
                        "on-error-container": "#93000a",
                        "on-background": "#1a1c1c",
                        "on-primary-fixed-variant": "#003ea8",
                        "on-primary-container": "#eeefff",
                        "surface-tint": "#0053db",
                        "outline": "#737686",
                        "on-primary-fixed": "#00174b",
                        "error-container": "#ffdad6",
                        "surface-variant": "#e2e2e2",
                        "on-surface": "#1a1c1c",
                        "tertiary-fixed-dim": "#ffb95f",
                        "surface-dim": "#dadad9",
                        "on-secondary": "#ffffff",
                        "background": "#f9f9f8",
                        "surface-bright": "#f9f9f8",
                        "primary": "#004ac6",
                        "surface-container-highest": "#e2e2e2",
                        "on-error": "#ffffff",
                        "tertiary-fixed": "#ffddb8",
                        "on-secondary-container": "#57657a",
                        "secondary-container": "#d5e3fc",
                        "tertiary-container": "#996100",
                        "on-surface-variant": "#434655",
                        "primary-container": "#2563eb",
                        "inverse-on-surface": "#f1f1f0",
                        "surface": "#f9f9f8",
                        "inverse-primary": "#b4c5ff",
                        "primary-fixed": "#dbe1ff",
                        "inverse-surface": "#2f3130",
                        "surface-container-high": "#e8e8e7",
                        "outline-variant": "#c3c6d7",
                        "surface-container-lowest": "#ffffff",
                        "secondary-fixed": "#d5e3fc",
                        "secondary-fixed-dim": "#b9c7df",
                        "on-primary": "#ffffff",
                        "on-tertiary": "#ffffff",
                        "tertiary": "#784b00",
                        "on-tertiary-container": "#ffeedd",
                        "surface-container": "#eeeeed",
                        "on-secondary-fixed-variant": "#3a485b",
                        "on-tertiary-fixed": "#2a1700"
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
    <style>
        html {
            scroll-behavior: smooth;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        .primary-gradient {
            background: linear-gradient(135deg, #004ac6 0%, #2563eb 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-background text-on-surface dark:bg-gray-900 dark:text-gray-100 transition-colors duration-300">
    <!-- TopNavBar -->
    <nav
        class="fixed top-0 w-full z-50 bg-[#f9f9f8]/80 dark:bg-gray-900/80 backdrop-blur-xl shadow-[0_40px_60px_-15px_rgba(26,28,28,0.04)] dark:shadow-none border-b border-transparent dark:border-gray-800 transition-colors duration-300">
        <div
            class="flex items-center justify-between px-8 py-4 max-w-7xl mx-auto w-full font-['Inter'] antialiased text-sm font-medium tracking-tight">
            <div class="text-xl font-bold tracking-tighter text-[#1a1c1c] dark:text-white">InvenTrack</div>
            <div class="hidden md:flex items-center gap-8 nav-menu">
                <a class="nav-link text-blue-600 dark:text-blue-400 font-semibold transition-colors" href="#product">Product</a>
                <a class="nav-link text-[#434655] dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors" href="#case-study">Case Studies</a>
                <a class="nav-link text-[#434655] dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors" href="#features">Features</a>
            </div>
            <div class="hidden md:flex items-center gap-4">
                <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2 transition-all">
                    <span id="theme-toggle-dark-icon" class="hidden material-symbols-outlined">dark_mode</span>
                    <span id="theme-toggle-light-icon" class="hidden material-symbols-outlined">light_mode</span>
                </button>
                <a class="text-[#434655] dark:text-gray-300 hover:opacity-80 transition-all active:scale-95" href="{{ route('login') }}">Login</a>
                <button
                    class="primary-gradient text-white px-5 py-2 rounded-lg font-semibold shadow-lg shadow-blue-600/20 active:scale-95 transition-all">Get
                    Started</button>
            </div>
            <div class="md:hidden flex items-center gap-2">
                <button id="theme-toggle-mobile" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2 transition-all">
                    <span id="theme-toggle-dark-icon-mobile" class="hidden material-symbols-outlined">dark_mode</span>
                    <span id="theme-toggle-light-icon-mobile" class="hidden material-symbols-outlined">light_mode</span>
                </button>
                <button id="mobile-menu-button" aria-controls="mobile-menu" aria-expanded="false"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-outline-variant/40 dark:border-gray-700 text-[#1a1c1c] dark:text-white hover:bg-surface-container-low dark:hover:bg-gray-800 transition-all active:scale-95"
                    type="button">
                    <span id="mobile-menu-icon" class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden px-8 pb-5">
            <div class="rounded-xl border border-outline-variant/20 dark:border-gray-700 bg-white/90 dark:bg-gray-800/90 backdrop-blur p-4">
                <div class="flex flex-col gap-3 text-sm font-medium nav-menu-mobile">
                    <a class="nav-link text-blue-600 dark:text-blue-400 font-semibold transition-colors" href="#product">Product</a>
                    <a class="nav-link text-[#434655] dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors" href="#case-study">Case Studies</a>
                    <a class="nav-link text-[#434655] dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors" href="#features">Features</a>
                </div>
                <div class="mt-4 pt-4 border-t border-outline-variant/20 dark:border-gray-700 flex flex-col gap-3">
                    <a class="text-left text-[#434655] dark:text-gray-300 hover:opacity-80 transition-all active:scale-95" href="{{ route('login') }}">Login</a>
                    <button class="primary-gradient text-white px-5 py-2 rounded-lg font-semibold shadow-lg shadow-blue-600/20 active:scale-95 transition-all"
                        type="button">Get Started</button>
                </div>
            </div>
        </div>
        <div class="h-[1px] w-full bg-gradient-to-r from-transparent via-[#c3c6d7]/15 dark:via-gray-700/50 to-transparent"></div>
    </nav>
    <!-- Hero Section -->
    <section id="product" class="relative pt-32 pb-20 overflow-hidden">
        <div class="max-w-5xl mx-auto px-8">
            <div class="z-10">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-secondary-container dark:bg-blue-900 text-on-secondary-container dark:text-blue-100 text-[10px] font-bold uppercase tracking-wider mb-6">Manufacturing
                    Solutions 2024</span>
                <h1 class="text-5xl lg:text-6xl font-extrabold tracking-tighter leading-[1.1] mb-6 text-on-surface dark:text-white">
                    Digitalisasi Pengadaan Barang untuk <span class="text-primary dark:text-blue-400">Industri Manufaktur Elektronik</span>
                </h1>
                <p class="text-lg text-on-surface-variant dark:text-gray-300 mb-10 max-w-xl leading-relaxed">
                    Optimalkan proses pengadaan bahan baku di PT Maju Jaya Manufacturing dengan sistem yang terintegrasi
                    dan real-time. Hilangkan hambatan operasional dan tingkatkan efisiensi produksi.
                </p>
                <div class="flex flex-wrap gap-4">
                    <button
                        class="primary-gradient text-white px-8 py-4 rounded-lg font-bold text-base shadow-xl shadow-blue-600/20 hover:opacity-90 transition-all active:scale-95" href="#case-study"> Mulai
                        Sekarang</button>
                    <button
                        class="px-8 py-4 rounded-lg font-bold text-base border border-outline-variant/30 dark:border-gray-700 hover:bg-surface-container-low dark:hover:bg-gray-800 transition-all active:scale-95">Lihat
                        Demo</button>
                </div>
            </div>
        </div>
    </section>
    <!-- Case Study: PT Maju Jaya -->
    <section id="case-study" class="py-24 bg-surface-container-low dark:bg-gray-800/50 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-8">
            <div class="mb-16">
                <h2 class="text-xs font-bold uppercase tracking-[0.2em] text-primary dark:text-blue-400 mb-3">Case Study</h2>
                <h3 class="text-3xl font-bold tracking-tight text-on-surface dark:text-white">PT Maju Jaya Manufacturing</h3>
                <p class="mt-4 text-on-surface-variant dark:text-gray-300 max-w-2xl">Produsen terkemuka PCB dan komponen kabel elektronik
                    yang menghadapi tantangan kompleks dalam manajemen rantai pasok.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Problem Card 1 -->
                <div class="bg-surface-container-lowest dark:bg-gray-900 p-8 rounded-xl shadow-sm border border-outline-variant/10 dark:border-gray-700">
                    <div class="w-12 h-12 rounded-lg bg-error/10 dark:bg-red-500/10 flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-error dark:text-red-400" data-icon="chat">chat</span>
                    </div>
                    <h4 class="font-bold mb-2 dark:text-white">Manual Procurement</h4>
                    <p class="text-sm text-on-surface-variant dark:text-gray-400 leading-relaxed">Pengadaan masih mengandalkan chat dan
                        email yang tidak terdokumentasi dengan rapi.</p>
                </div>
                <!-- Problem Card 2 -->
                <div class="bg-surface-container-lowest dark:bg-gray-900 p-8 rounded-xl shadow-sm border border-outline-variant/10 dark:border-gray-700">
                    <div class="w-12 h-12 rounded-lg bg-error/10 dark:bg-red-500/10 flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-error dark:text-red-400" data-icon="query_stats">query_stats</span>
                    </div>
                    <h4 class="font-bold mb-2 dark:text-white">No Tracking Status</h4>
                    <p class="text-sm text-on-surface-variant dark:text-gray-400 leading-relaxed">Sulit memantau posisi barang dan status
                        persetujuan secara real-time.</p>
                </div>
                <!-- Problem Card 3 -->
                <div class="bg-surface-container-lowest dark:bg-gray-900 p-8 rounded-xl shadow-sm border border-outline-variant/10 dark:border-gray-700">
                    <div class="w-12 h-12 rounded-lg bg-error/10 dark:bg-red-500/10 flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-error dark:text-red-400" data-icon="warning">warning</span>
                    </div>
                    <h4 class="font-bold mb-2 dark:text-white">Delivery Discrepancies</h4>
                    <p class="text-sm text-on-surface-variant dark:text-gray-400 leading-relaxed">Ketidaksesuaian jumlah barang antara
                        pesanan dengan yang diterima di gudang.</p>
                </div>
                <!-- Problem Card 4 -->
                <div class="bg-surface-container-lowest dark:bg-gray-900 p-8 rounded-xl shadow-sm border border-outline-variant/10 dark:border-gray-700">
                    <div class="w-12 h-12 rounded-lg bg-error/10 dark:bg-red-500/10 flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-error dark:text-red-400" data-icon="inventory_2">inventory_2</span>
                    </div>
                    <h4 class="font-bold mb-2 dark:text-white">Inaccurate Stock</h4>
                    <p class="text-sm text-on-surface-variant dark:text-gray-400 leading-relaxed">Data stok fisik sering tidak sinkron
                        dengan catatan manual admin.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Solution Section & Stepper -->
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-8">
            <div class="text-center mb-20">
                <h2 class="text-4xl font-extrabold tracking-tight mb-4 dark:text-white">Solusi InvenTrack</h2>
                <p class="text-on-surface-variant dark:text-gray-300 max-w-2xl mx-auto">Alur kerja digital yang dirancang khusus untuk
                    menyederhanakan siklus pengadaan dari awal hingga akhir.</p>
            </div>
            <!-- Horizontal Stepper -->
            <div class="relative flex flex-col md:flex-row justify-between items-start md:items-center gap-8 md:gap-0">
                <!-- Background Line -->
                <div class="absolute top-1/2 left-0 w-full h-[2px] bg-surface-container-highest dark:bg-gray-700 hidden md:block"></div>
                <!-- Steps -->
                <div class="relative z-10 flex flex-col items-center group w-full md:w-auto">
                    <div
                        class="w-14 h-14 rounded-full bg-primary text-white flex items-center justify-center shadow-lg mb-4 ring-8 ring-background dark:ring-gray-900">
                        <span class="material-symbols-outlined" data-icon="post_add">post_add</span>
                    </div>
                    <span class="text-xs font-bold tracking-wider uppercase text-primary dark:text-blue-400">Step 01</span>
                    <span class="font-medium mt-1 dark:text-gray-200">Purchase Request</span>
                </div>
                <div class="relative z-10 flex flex-col items-center group w-full md:w-auto">
                    <div
                        class="w-14 h-14 rounded-full bg-surface-container-highest dark:bg-gray-800 text-on-surface-variant dark:text-gray-400 flex items-center justify-center mb-4 ring-8 ring-background dark:ring-gray-900 group-hover:bg-primary/20 dark:group-hover:bg-primary/40 transition-all">
                        <span class="material-symbols-outlined" data-icon="fact_check">fact_check</span>
                    </div>
                    <span class="text-xs font-bold tracking-wider uppercase text-on-surface-variant dark:text-gray-400">Step 02</span>
                    <span class="font-medium mt-1 dark:text-gray-200">Approval</span>
                </div>
                <div class="relative z-10 flex flex-col items-center group w-full md:w-auto">
                    <div
                        class="w-14 h-14 rounded-full bg-surface-container-highest dark:bg-gray-800 text-on-surface-variant dark:text-gray-400 flex items-center justify-center mb-4 ring-8 ring-background dark:ring-gray-900 group-hover:bg-primary/20 dark:group-hover:bg-primary/40 transition-all">
                        <span class="material-symbols-outlined" data-icon="shopping_cart">shopping_cart</span>
                    </div>
                    <span class="text-xs font-bold tracking-wider uppercase text-on-surface-variant dark:text-gray-400">Step 03</span>
                    <span class="font-medium mt-1 dark:text-gray-200">Purchase Order</span>
                </div>
                <div class="relative z-10 flex flex-col items-center group w-full md:w-auto">
                    <div
                        class="w-14 h-14 rounded-full bg-surface-container-highest dark:bg-gray-800 text-on-surface-variant dark:text-gray-400 flex items-center justify-center mb-4 ring-8 ring-background dark:ring-gray-900 group-hover:bg-primary/20 dark:group-hover:bg-primary/40 transition-all">
                        <span class="material-symbols-outlined" data-icon="local_shipping">local_shipping</span>
                    </div>
                    <span class="text-xs font-bold tracking-wider uppercase text-on-surface-variant dark:text-gray-400">Step 04</span>
                    <span class="font-medium mt-1 dark:text-gray-200">Goods Receipt</span>
                </div>
                <div class="relative z-10 flex flex-col items-center group w-full md:w-auto">
                    <div
                        class="w-14 h-14 rounded-full bg-surface-container-highest dark:bg-gray-800 text-on-surface-variant dark:text-gray-400 flex items-center justify-center mb-4 ring-8 ring-background dark:ring-gray-900 group-hover:bg-primary/20 dark:group-hover:bg-primary/40 transition-all">
                        <span class="material-symbols-outlined" data-icon="warehouse">warehouse</span>
                    </div>
                    <span class="text-xs font-bold tracking-wider uppercase text-on-surface-variant dark:text-gray-400">Step 05</span>
                    <span class="font-medium mt-1 dark:text-gray-200">Inventory</span>
                </div>
            </div>
        </div>
    </section>
    <!-- Key Features: Bento Grid Style -->
    <section id="features" class="py-24 bg-surface-container-low dark:bg-gray-800/50 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-8">
            <h2 class="text-3xl font-bold mb-12 text-center md:text-left dark:text-white">Fitur Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Large Feature Card -->
                <div
                    class="md:col-span-2 bg-surface-container-lowest dark:bg-gray-900 p-10 rounded-2xl flex flex-col justify-between group hover:shadow-xl dark:border dark:border-gray-700 transition-all duration-500">
                    <div>
                        <div class="w-14 h-14 rounded-xl bg-primary/10 dark:bg-primary/20 flex items-center justify-center mb-8">
                            <span class="material-symbols-outlined text-primary dark:text-blue-400 text-3xl"
                                data-icon="monitor_heart">monitor_heart</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 dark:text-white">Real-time Stock Monitoring</h3>
                        <p class="text-on-surface-variant dark:text-gray-400 max-w-lg leading-relaxed">Pantau ketersediaan PCB, kabel, dan
                            komponen elektronik secara akurat di setiap detik. Sistem akan memberikan notifikasi
                            otomatis saat stok mencapai batas minimum.</p>
                    </div>
                    <div class="mt-8 pt-8 border-t border-outline-variant/10 dark:border-gray-700 flex justify-between items-center">
                        <span class="text-sm font-semibold text-primary dark:text-blue-400">Explore Feature</span>
                        <span class="material-symbols-outlined text-primary dark:text-blue-400"
                            data-icon="arrow_forward">arrow_forward</span>
                    </div>
                </div>
                <!-- Regular Feature Cards -->
                <div
                    class="bg-primary text-white p-8 rounded-2xl flex flex-col justify-between shadow-lg shadow-blue-600/20">
                    <div>
                        <span class="material-symbols-outlined text-4xl mb-6"
                            data-icon="verified_user">verified_user</span>
                        <h3 class="text-xl font-bold mb-3">Approval System</h3>
                        <p class="text-blue-100 text-sm">Hierarki persetujuan bertingkat untuk memastikan setiap
                            pembelian sesuai anggaran perusahaan.</p>
                    </div>
                </div>
                <div
                    class="bg-surface-container-lowest dark:bg-gray-900 p-8 rounded-2xl flex flex-col justify-between border border-outline-variant/10 dark:border-gray-700">
                    <div>
                        <span class="material-symbols-outlined text-3xl text-primary dark:text-blue-400 mb-6"
                            data-icon="receipt_long">receipt_long</span>
                        <h3 class="text-xl font-bold mb-3 dark:text-white">PR Management</h3>
                        <p class="text-on-surface-variant dark:text-gray-400 text-sm">Pembuatan permintaan barang dengan detail
                            spesifikasi teknis yang rapi.</p>
                    </div>
                </div>
                <div
                    class="bg-surface-container-lowest dark:bg-gray-900 p-8 rounded-2xl flex flex-col justify-between border border-outline-variant/10 dark:border-gray-700">
                    <div>
                        <span class="material-symbols-outlined text-3xl text-primary dark:text-blue-400 mb-6"
                            data-icon="track_changes">track_changes</span>
                        <h3 class="text-xl font-bold mb-3 dark:text-white">PO Tracking</h3>
                        <p class="text-on-surface-variant dark:text-gray-400 text-sm">Lacak status pengiriman dari vendor hingga tiba di
                            pintu gerbang pabrik.</p>
                    </div>
                </div>
                <div
                    class="bg-surface-container-lowest dark:bg-gray-900 p-8 rounded-2xl flex flex-col justify-between border border-outline-variant/10 dark:border-gray-700">
                    <div>
                        <span class="material-symbols-outlined text-3xl text-primary dark:text-blue-400 mb-6"
                            data-icon="history_edu">history_edu</span>
                        <h3 class="text-xl font-bold mb-3 dark:text-white">Audit Log</h3>
                        <p class="text-on-surface-variant dark:text-gray-400 text-sm">Rekam jejak digital lengkap untuk kebutuhan
                            transparansi dan audit operasional.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Benefits Section -->
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-8 grid lg:grid-cols-2 gap-20 items-center">
            <div class="order-2 lg:order-1 relative">
                <div class="aspect-square bg-surface-container-high dark:bg-gray-800 rounded-[40px] overflow-hidden">
                    <img alt="Electronics Manufacturing Factory" class="w-full h-full object-cover"
                        data-alt="Professional electronics manufacturing environment with high-tech machinery and workers in clean suits assembling circuit boards"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAwF3kxXFRGx4AJP-yARFfCFKdWIoJ-Zfln34t6DQOVOk7jKCajMe_mr1wG3uLuOT_YQl-MnOpqAmeuSjPeyuVY9BWRn3ybU69vPy3nND37IhaugizhvU87xIKAj3kYmCGNK6CGHGyhFAa_yL9nI3mlHQMq7-6cAdhqlObeoDgdbhk8MLZvLzP4WlCqEPFk-rVqmmr-Uyn4C3c_SXhgwIHj3WHlDiZWrMM8bc7NFx3IqCL9aTrCB2FBLLGwJx9seD43SKJqBMqsqqiB" />
                </div>
                <!-- Floating Benefit Badge -->
                <div
                    class="absolute -bottom-10 -right-10 glass-panel dark:bg-gray-800/80 p-6 rounded-2xl shadow-xl max-w-xs border border-white/40 dark:border-gray-600 hidden md:block">
                    <div class="flex items-center gap-4 mb-3">
                        <div class="bg-green-100 p-2 rounded-lg"><span
                                class="material-symbols-outlined text-green-600"
                                data-icon="trending_up">trending_up</span></div>
                        <span class="font-bold text-sm dark:text-white">35% Efisiensi Meningkat</span>
                    </div>
                    <p class="text-xs text-on-surface-variant dark:text-gray-300">Data rata-rata peningkatan efisiensi pengadaan pada
                        mitra industri kami.</p>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="text-xs font-bold uppercase tracking-[0.2em] text-primary dark:text-blue-400 mb-4">Keunggulan</h2>
                <h3 class="text-4xl font-extrabold tracking-tight mb-8 dark:text-white">Mengapa InvenTrack untuk PT Maju Jaya?</h3>
                <ul class="space-y-6">
                    <li class="flex gap-4">
                        <div class="mt-1"><span class="material-symbols-outlined text-primary dark:text-blue-400"
                                data-icon="check_circle" data-weight="fill">check_circle</span></div>
                        <div>
                            <h4 class="font-bold dark:text-white">Efficient Operations</h4>
                            <p class="text-on-surface-variant dark:text-gray-400 text-sm mt-1">Mengurangi waktu tunggu pengadaan hingga
                                40% dengan sistem otomatis.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <div class="mt-1"><span class="material-symbols-outlined text-primary dark:text-blue-400"
                                data-icon="check_circle" data-weight="fill">check_circle</span></div>
                        <div>
                            <h4 class="font-bold dark:text-white">Uninterrupted Production</h4>
                            <p class="text-on-surface-variant dark:text-gray-400 text-sm mt-1">Mencegah lini produksi berhenti akibat
                                kehabisan stok komponen kritikal.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <div class="mt-1"><span class="material-symbols-outlined text-primary dark:text-blue-400"
                                data-icon="check_circle" data-weight="fill">check_circle</span></div>
                        <div>
                            <h4 class="font-bold dark:text-white">Inter-divisional Transparency</h4>
                            <p class="text-on-surface-variant dark:text-gray-400 text-sm mt-1">Sinkronisasi data antara tim Gudang,
                                Procurement, dan Keuangan.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- System Preview Mockup -->
    <section class="py-24 bg-surface-container-high dark:bg-gray-800/80 overflow-hidden transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-8 text-center">
            <h2 class="text-3xl font-bold mb-16 dark:text-white">Pengalaman Pengguna yang Presisi</h2>
            <div class="relative mx-auto max-w-5xl">
                <div class="absolute -inset-10 bg-primary/5 dark:bg-primary/20 blur-3xl rounded-full"></div>
                <div
                    class="relative bg-surface dark:bg-gray-900 rounded-t-3xl shadow-2xl p-4 border-x border-t border-outline-variant/15 dark:border-gray-700">
                    <div class="bg-surface-container-lowest dark:bg-gray-950 rounded-t-2xl h-[600px] overflow-hidden flex flex-col">
                        <!-- Simulated App Header -->
                        <div class="h-14 border-b border-outline-variant/5 dark:border-gray-800 px-6 flex items-center justify-between">
                            <div class="flex gap-2">
                                <div class="w-3 h-3 rounded-full bg-error/20 dark:bg-red-500/50"></div>
                                <div class="w-3 h-3 rounded-full bg-tertiary-fixed-dim dark:bg-yellow-500/50"></div>
                                <div class="w-3 h-3 rounded-full bg-green-200 dark:bg-green-500/50"></div>
                            </div>
                            <div class="bg-surface-container-high dark:bg-gray-800 h-6 w-64 rounded-full"></div>
                            <div class="w-8 h-8 rounded-full bg-primary-fixed dark:bg-primary/30"></div>
                        </div>
                        <!-- Dashboard Content Placeholder -->
                        <div class="flex-1 p-8 grid grid-cols-12 gap-6 bg-surface-container-low/30 dark:bg-gray-900/50">
                            <div class="col-span-3 space-y-4">
                                <div class="h-32 bg-white dark:bg-gray-800 rounded-xl border border-outline-variant/10 dark:border-gray-700 p-4">
                                    <div class="h-4 w-12 bg-surface-container-highest dark:bg-gray-700 rounded mb-4"></div>
                                    <div class="h-8 w-24 bg-primary/10 dark:bg-primary/20 rounded"></div>
                                </div>
                                <div class="h-32 bg-white dark:bg-gray-800 rounded-xl border border-outline-variant/10 dark:border-gray-700 p-4">
                                    <div class="h-4 w-16 bg-surface-container-highest dark:bg-gray-700 rounded mb-4"></div>
                                    <div class="h-8 w-20 bg-secondary-container dark:bg-blue-900/40 rounded"></div>
                                </div>
                            </div>
                            <div class="col-span-9 bg-white dark:bg-gray-800 rounded-xl border border-outline-variant/10 dark:border-gray-700 p-6">
                                <div class="flex justify-between items-center mb-6">
                                    <div class="h-6 w-48 bg-surface-container-highest dark:bg-gray-700 rounded"></div>
                                    <div class="h-10 w-32 bg-primary dark:bg-blue-600 rounded-lg"></div>
                                </div>
                                <div class="space-y-4">
                                    <div class="h-10 bg-surface-container-low dark:bg-gray-700 rounded"></div>
                                    <div class="h-10 bg-white dark:bg-gray-800 border-b border-outline-variant/5 dark:border-gray-700 rounded"></div>
                                    <div class="h-10 bg-white dark:bg-gray-800 border-b border-outline-variant/5 dark:border-gray-700 rounded"></div>
                                    <div class="h-10 bg-white dark:bg-gray-800 border-b border-outline-variant/5 dark:border-gray-700 rounded"></div>
                                    <div class="h-10 bg-white dark:bg-gray-800 border-b border-outline-variant/5 dark:border-gray-700 rounded"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Section -->
    <section class="py-24">
        <div class="max-w-5xl mx-auto px-8">
            <div
                class="primary-gradient rounded-[32px] p-12 md:p-20 text-center text-white relative overflow-hidden shadow-2xl">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
                <div
                    class="absolute bottom-0 left-0 w-64 h-64 bg-primary-container/20 rounded-full -ml-32 -mb-32 blur-3xl">
                </div>
                <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-6 relative z-10">Mulai Digitalisasi
                    Proses Pengadaan Anda</h2>
                <p class="text-blue-100 text-lg mb-10 max-w-2xl mx-auto relative z-10">
                    Bergabunglah dengan PT Maju Jaya Manufacturing dalam merevolusi efisiensi industri manufaktur. Coba
                    gratis atau jadwalkan konsultasi.
                </p>
                <div class="flex flex-wrap justify-center gap-4 relative z-10">
                    <button
                        class="bg-white text-primary px-8 py-4 rounded-lg font-bold hover:bg-blue-50 transition-all active:scale-95">Coba
                        Sekarang</button>
                    <button
                        class="bg-white/10 text-white backdrop-blur-md px-8 py-4 rounded-lg font-bold border border-white/20 hover:bg-white/20 transition-all active:scale-95">Hubungi
                        Kami</button>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-[#f4f4f3] dark:bg-gray-950 w-full py-12 px-8 font-['Inter'] text-xs uppercase tracking-[0.05rem] text-[#434655] dark:text-gray-400 transition-colors duration-300">
        <div class="max-w-7xl mx-auto w-full border-t border-[#c3c6d7]/15 dark:border-gray-800 pt-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">
                <div class="col-span-2 md:col-span-1">
                    <div class="font-bold text-[#1a1c1c] dark:text-white text-lg normal-case mb-4 tracking-tighter">InvenTrack</div>
                    <p class="normal-case leading-relaxed text-[#434655] dark:text-gray-400">Enterprise Inventory &amp; Procurement
                        solutions tailored for the precision manufacturing industry.</p>
                </div>
                <div>
                    <h5 class="font-bold text-[#1a1c1c] dark:text-white mb-6">Product</h5>
                    <ul class="space-y-4">
                        <li><a class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors" href="#">Features</a></li>
                        <li><a class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors" href="#">Case Studies</a></li>
                        <li><a class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors" href="#">Integrations</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-bold text-[#1a1c1c] dark:text-white mb-6">Company</h5>
                    <ul class="space-y-4">
                        <li><a class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors" href="#">About Us</a></li>
                        <li><a class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors" href="#">Contact Support</a></li>
                        <li><a class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors" href="#">Pricing</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-bold text-[#1a1c1c] dark:text-white mb-6">Legal</h5>
                    <ul class="space-y-4">
                        <li><a class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors" href="#">Privacy Policy</a></li>
                        <li><a class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors" href="#">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 border-t border-outline-variant/10 dark:border-gray-800 text-center md:text-left">
                &copy; 2024 InvenTrack Manufacturing Systems. All rights reserved.
            </div>
        </div>
    </footer>
    <script>
        const topNav = document.querySelector('nav.fixed');
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuIcon = document.getElementById('mobile-menu-icon');
        const sectionLinks = document.querySelectorAll('a[href^="#"]');

        sectionLinks.forEach((link) => {
            link.addEventListener('click', (event) => {
                const targetId = link.getAttribute('href');

                if (!targetId || targetId === '#') {
                    return;
                }

                const targetElement = document.querySelector(targetId);

                if (!targetElement) {
                    return;
                }

                event.preventDefault();

                const navHeight = topNav ? topNav.offsetHeight : 0;
                const targetPosition = targetElement.getBoundingClientRect().top + window.scrollY - navHeight - 16;
                const behavior = window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth';

                window.scrollTo({
                    top: targetPosition,
                    behavior,
                });

                if (mobileMenu && mobileMenuButton && mobileMenuIcon && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    mobileMenuButton.setAttribute('aria-expanded', 'false');
                    mobileMenuIcon.textContent = 'menu';
                }
            });
        });

        if (mobileMenuButton && mobileMenu && mobileMenuIcon) {
            mobileMenuButton.addEventListener('click', () => {
                const isHidden = mobileMenu.classList.toggle('hidden');
                mobileMenuButton.setAttribute('aria-expanded', String(!isHidden));
                mobileMenuIcon.textContent = isHidden ? 'menu' : 'close';
            });

            window.addEventListener('resize', () => {
                if (window.innerWidth >= 768 && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    mobileMenuButton.setAttribute('aria-expanded', 'false');
                    mobileMenuIcon.textContent = 'menu';
                }
            });
        }

        // --- Active Nav Link logic ---
        const navLinks = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('section[id]');
        
        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const navHeight = topNav ? topNav.offsetHeight : 0;
                if (window.pageYOffset >= sectionTop - navHeight - 100) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('text-blue-600', 'dark:text-blue-400', 'font-semibold');
                link.classList.add('text-[#434655]', 'dark:text-gray-300');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.remove('text-[#434655]', 'dark:text-gray-300');
                    link.classList.add('text-blue-600', 'dark:text-blue-400', 'font-semibold');
                }
            });
        });

        // --- Dark/Light Mode logic ---
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleBtnMobile = document.getElementById('theme-toggle-mobile');
        
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');
        const darkIconMobile = document.getElementById('theme-toggle-dark-icon-mobile');
        const lightIconMobile = document.getElementById('theme-toggle-light-icon-mobile');

        // Initial icon setup
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            lightIcon.classList.remove('hidden');
            if (lightIconMobile) lightIconMobile.classList.remove('hidden');
        } else {
            darkIcon.classList.remove('hidden');
            if (darkIconMobile) darkIconMobile.classList.remove('hidden');
        }

        function toggleTheme() {
            // toggle icons inside button
            darkIcon.classList.toggle('hidden');
            lightIcon.classList.toggle('hidden');
            if (darkIconMobile) darkIconMobile.classList.toggle('hidden');
            if (lightIconMobile) lightIconMobile.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        }

        themeToggleBtn.addEventListener('click', toggleTheme);
        if (themeToggleBtnMobile) themeToggleBtnMobile.addEventListener('click', toggleTheme);

    </script>
</body>

</html>
