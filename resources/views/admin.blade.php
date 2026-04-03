<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>God Mode - Eetbudget</title>
    <style>
        body { background-color: #020617; font-family: system-ui, -apple-system, sans-serif; }
    </style>
</head>
<body class="bg-[#020617] text-slate-200 p-6 md:p-12">

<header class="max-w-6xl mx-auto mb-12 flex justify-between items-end">
    <div>
        <p class="text-emerald-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">Beheer</p>
        <h1 class="text-4xl font-extrabold text-white tracking-tight">Concierge Dashboard</h1>
    </div>
    <div class="text-right hidden md:block">
        <span class="bg-slate-800 text-slate-400 px-4 py-2 rounded-full text-xs font-bold border border-slate-700">Admin Mode Active</span>
    </div>
</header>

<div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10">

    <section class="space-y-6">
        <h2 class="text-lg font-bold text-amber-400 flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
            Wachtend op activatie
        </h2>

        <div class="space-y-4">
            @forelse($pendingUsers as $user)
                <div class="bg-slate-900 p-6 rounded-[2rem] border-2 border-slate-700 shadow-xl">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h3 class="font-extrabold text-2xl text-white">{{ $user->name }}</h3>
                            <p class="text-sm text-slate-500 font-medium">Code: <span class="text-slate-300">{{ strtoupper($user->token) }}</span></p>
                        </div>
                        <div class="bg-slate-800 p-3 rounded-2xl text-right border border-slate-700">
                            <p class="text-[10px] uppercase font-bold text-slate-500">Doel</p>
                            <p class="text-sm font-bold text-emerald-400">{{ $user->start_weight }} → {{ $user->target_weight }}kg</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.activate', $user) }}" method="POST" class="flex gap-3">
                        @csrf
                        <div class="flex-grow relative">
                            <input type="number" name="budget" value="35"
                                   class="w-full bg-slate-950 border-2 border-slate-700 rounded-2xl p-4 text-xl font-bold text-white focus:border-emerald-500 outline-none transition-all">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-bold text-slate-600">PT</span>
                        </div>
                        <button type="submit" class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 px-8 rounded-2xl font-bold transition-all shadow-lg shadow-emerald-500/10 active:scale-95">
                            Activeer
                        </button>
                    </form>
                </div>
            @empty
                <p class="text-slate-600 italic p-8 text-center bg-slate-900/50 rounded-3xl border border-dashed border-slate-800">Geen nieuwe aanvragen.</p>
            @endforelse
        </div>
    </section>

    <section class="space-y-6">
        <h2 class="text-lg font-bold text-emerald-500 flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            Actieve rekeningen
        </h2>

        <div class="bg-slate-900 rounded-[2.5rem] border border-slate-800 overflow-hidden shadow-2xl">
            @forelse($activeUsers as $user)
                <div class="p-5 border-b border-slate-800 flex justify-between items-center hover:bg-slate-800/30 transition-colors">
                    <div>
                        <p class="font-bold text-white">{{ $user->name }}</p>
                        <p class="text-[10px] text-slate-500 uppercase tracking-wider">Laatste gewicht: {{ $user->last_weight ?? '?' }} kg</p>
                    </div>
                    <div class="text-right">
                        <span class="text-xl font-extrabold text-emerald-400">{{ $user->weekly_budget }}</span>
                        <span class="text-[10px] font-bold text-slate-600 uppercase ml-1">pt</span>
                    </div>
                </div>
            @empty
                <p class="p-10 text-center text-slate-600">Nog geen actieve gebruikers.</p>
            @endforelse
        </div>
    </section>
</div>

</body>
</html>
