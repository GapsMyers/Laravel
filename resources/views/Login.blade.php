<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login | InvenTrack Manufacturing ERP</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
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
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .bg-mesh {
            background-color: #f9f9f8;
            background-image:
                radial-gradient(at 0% 0%, rgba(37, 99, 235, 0.03) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(37, 99, 235, 0.03) 0px, transparent 50%);
        }
    </style>
</head>

<body class="bg-surface text-on-surface selection:bg-primary/20">
    <!-- Login Container -->
    <div class="min-h-screen flex items-center justify-center p-6 bg-mesh relative overflow-hidden">
        <!-- Subtle Decorative Background Elements -->
        <div class="absolute top-[-10%] right-[-5%] w-[40%] h-[40%] opacity-10 pointer-events-none">
            <img class="w-full h-full object-contain filter grayscale"
                data-alt="abstract architectural blueprint lines with geometric precision and clean white background reflecting engineering expertise"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBatAO0Od5176xM8TFssGT9SbNWeF5h7o6e1DvbeJnkCaeLNnTfFUKP8TsEHSdeXVdyqu97X2rffGgANkUwTdoG70FTjXzlWDkbANv2BlEc1ebpw2nzbk45sXimMMmfEFPtC2TKZ_SuBRtTN-j3BXgtawFQMyqhbRtXS62ud9OJ1vEtZVxVfHKaGaJkYkahrlBRCIDlJjsh7LM13AbOX8aIZR_19ygMDKAFQsROGRWMSss5NhcsFB7vjcJ9lC5bpflWjTx0EnoNNNBi" />
        </div>
        <!-- The Precision Atelier Login Card -->
        <div class="w-full max-w-[440px] relative z-10">
            <!-- Branding Header -->
            <div class="mb-10 text-center">
                <div
                    class="inline-flex items-center justify-center p-3 mb-6 bg-surface-container-lowest shadow-[0px_40px_60px_-15px_rgba(0,0,0,0.05)] rounded-xl">
                    <span class="material-symbols-outlined text-primary text-4xl" data-icon="warehouse">warehouse</span>
                </div>
                <h1 class="text-3xl font-black tracking-tighter text-on-surface mb-2">InvenTrack</h1>
                <p class="text-on-surface-variant font-medium text-sm tracking-wide uppercase opacity-70">Manufacturing
                    ERP</p>
            </div>
            <!-- Login Surface -->
            <div
                class="bg-surface-container-lowest/80 backdrop-blur-2xl p-10 rounded-xl shadow-[0px_40px_60px_-15px_rgba(26,28,28,0.04)] border border-outline-variant/10">
                <form class="space-y-6" method="POST" action="{{ route('login.store') }}">
                    @csrf
                    @if ($errors->any())
                        <div class="rounded-lg border border-error/15 bg-error-container/40 px-4 py-3 text-xs text-on-error-container">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label
                            class="block text-[11px] font-bold tracking-[0.05rem] text-on-surface-variant uppercase ml-1">Email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span
                                    class="material-symbols-outlined text-on-surface-variant text-sm group-focus-within:text-primary transition-colors"
                                    data-icon="person">person</span>
                            </div>
                            <input
                                class="w-full pl-11 pr-4 py-3.5 bg-surface-container-high border-none rounded-lg text-sm font-medium focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all placeholder:text-on-surface-variant/40"
                                placeholder="Enter your email" type="email" name="email" value="{{ old('email') }}"
                                autocomplete="email" required />
                        </div>
                        @error('email')
                            <p class="text-[11px] text-error font-semibold ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Password Field -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center px-1">
                            <label
                                class="block text-[11px] font-bold tracking-[0.05rem] text-on-surface-variant uppercase">Password</label>
                            <a class="text-[11px] font-bold text-primary hover:text-primary-container transition-colors uppercase tracking-wider"
                                href="#">Forgot?</a>
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span
                                    class="material-symbols-outlined text-on-surface-variant text-sm group-focus-within:text-primary transition-colors"
                                    data-icon="lock">lock</span>
                            </div>
                            <input id="password"
                                class="w-full pl-11 pr-12 py-3.5 bg-surface-container-high border-none rounded-lg text-sm font-medium focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all placeholder:text-on-surface-variant/40"
                                placeholder="********" type="password" name="password" autocomplete="current-password"
                                required />
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" onclick="togglePassword()" class="text-on-surface-variant hover:text-primary focus:outline-none transition-colors p-1 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[20px]" id="togglePasswordIcon">visibility_off</span>
                                </button>
                            </div>
                        </div>
                        @error('password')
                            <p class="text-[11px] text-error font-semibold ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Options Row -->
                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center space-x-3 cursor-pointer group">
                            <div class="relative flex items-center">
                                <input
                                    class="peer h-5 w-5 bg-surface-container-high border-none rounded focus:ring-0 text-primary transition-all"
                                    type="checkbox" name="remember" value="1" @checked(old('remember')) />
                                <div
                                    class="absolute inset-0 border-2 border-transparent peer-checked:border-primary/20 rounded-md transition-all">
                                </div>
                            </div>
                            <span
                                class="text-sm font-medium text-on-surface-variant group-hover:text-on-surface transition-colors">Keep
                                me logged in</span>
                        </label>
                    </div>
                    <!-- Submit Action -->
                    <div class="pt-4">
                        <button
                            class="w-full py-4 bg-gradient-to-br from-primary to-primary-container text-on-primary font-bold rounded-lg shadow-[0_8px_20px_-4px_rgba(0,74,198,0.3)] hover:shadow-[0_12px_24px_-4px_rgba(0,74,198,0.4)] active:scale-[0.98] transition-all duration-200 tracking-tight"
                            type="submit">
                            Sign In to Dashboard
                        </button>
                    </div>
                </form>
                <!-- Footer Support Link -->
                <div class="mt-8 text-center">
                    <p class="text-[11px] text-on-surface-variant font-medium tracking-wide">
                        Authorized Personnel Only.
                        <a class="text-primary hover:underline ml-1" href="#">Need help?</a>
                    </p>
                </div>
            </div>
            <!-- Contextual Branding Image (Editorial Style) -->
            <div class="mt-12 flex items-center gap-6 opacity-40">
                <div class="h-[1px] flex-1 bg-gradient-to-r from-transparent via-outline-variant to-transparent"></div>
                <div class="flex gap-4">
                    <span class="material-symbols-outlined text-sm" data-icon="settings">settings</span>
                    <span class="material-symbols-outlined text-sm" data-icon="verified">verified</span>
                    <span class="material-symbols-outlined text-sm"
                        data-icon="precision_manufacturing">precision_manufacturing</span>
                </div>
                <div class="h-[1px] flex-1 bg-gradient-to-r from-transparent via-outline-variant to-transparent"></div>
            </div>
        </div>
        <!-- Decorative Lower Right Card -->
        <div class="hidden lg:block absolute bottom-12 right-12 max-w-[280px]">
            <div class="p-6 bg-surface-container-low rounded-xl border border-outline-variant/5">
                <div class="flex items-start gap-4">
                    <div class="h-10 w-10 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined" data-icon="info">info</span>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-widest text-on-surface mb-1">System Status</h4>
                        <p class="text-[12px] text-on-surface-variant leading-relaxed">All manufacturing nodes and
                            inventory pipelines are operational in the Chicago region.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const icon = document.getElementById('togglePasswordIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.textContent = 'visibility';
            } else {
                passwordInput.type = 'password';
                icon.textContent = 'visibility_off';
            }
        }
    </script>
</body>

</html>
