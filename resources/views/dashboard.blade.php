<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Eetbudget.nl</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #0f172a; -webkit-user-select: none; user-select: none; }
        .text-shadow-glow { text-shadow: 0 0 20px rgba(16, 185, 129, 0.4); }
    </style>
</head>
<body class="bg-[#0f172a] text-white font-sans antialiased flex flex-col min-h-screen">

<header class="pt-14 pb-10 px-6 text-center bg-[#1e293b] shadow-2xl rounded-b-[3.5rem] border-b border-slate-700">
    <h1 class="text-slate-500 uppercase tracking-[0.3em] text-[10px] font-black opacity-80">Huidig Saldo</h1>
    <div class="mt-2 flex justify-center items-baseline gap-2">
            <span class="text-9xl font-black tabular-nums tracking-tighter text-emerald-400 text-shadow-glow">
                {{ $balance }}
            </span>
        <span class="text-2xl font-black text-slate-600 uppercase tracking-widest italic">pt</span>
    </div>
    <p class="mt-4 text-slate-400 text-[10px] font-black uppercase tracking-[0.2em]">
        Nieuw budget op <span class="text-white">{{ $reset_day }}</span>
    </p>
</header>

<main class="flex-grow p-6 space-y-5 max-w-md mx-auto w-full">
    <form action="{{ route('entries.store') }}" method="POST" class="space-y-4">
        @csrf

        <button type="submit" name="points" value="1"
                class="w-full h-28 bg-emerald-600 rounded-[2rem] flex items-center justify-between px-8 shadow-xl active:scale-95 transition-all border-b-4 border-emerald-800">
            <div class="text-left">
                <span class="block text-3xl font-black italic uppercase leading-none text-white">Licht</span>
                <span class="text-emerald-100 text-[10px] font-black uppercase tracking-widest opacity-60 italic text-white">Klein / Snack</span>
            </div>
            <span class="text-4xl font-black bg-emerald-800/40 w-16 h-16 flex items-center justify-center rounded-2xl shadow-inner">-1</span>
        </button>

        <button type="submit" name="points" value="2"
                class="w-full h-28 bg-indigo-600 rounded-[2rem] flex items-center justify-between px-8 shadow-xl active:scale-95 transition-all border-b-4 border-indigo-800">
            <div class="text-left">
                <span class="block text-3xl font-black italic uppercase leading-none text-white">Normaal</span>
                <span class="text-indigo-100 text-[10px] font-black uppercase tracking-widest opacity-60 italic text-white">Standaard Maaltijd</span>
            </div>
            <span class="text-4xl font-black bg-indigo-800/40 w-16 h-16 flex items-center justify-center rounded-2xl shadow-inner">-2</span>
        </button>

        <button type="submit" name="points" value="4"
                class="w-full h-32 bg-slate-600 rounded-[2rem] flex items-center justify-between px-8 shadow-xl active:scale-95 transition-all border-b-4 border-slate-800 text-white">
            <div class="text-left">
                <span class="block text-3xl font-black italic uppercase leading-none">Flink</span>
                <span class="text-slate-300 text-[10px] font-black uppercase tracking-widest opacity-80 italic">Grote maaltijd / Extra</span>
            </div>
            <span class="text-4xl font-black bg-slate-800/40 w-16 h-16 flex items-center justify-center rounded-2xl shadow-inner">-4</span>
        </button>
    </form>
</main>

<footer class="p-8 bg-[#1e293b]/90 backdrop-blur-2xl border-t border-slate-700/50 mt-auto">
    <form action="{{ route('weights.store') }}" method="POST" class="max-w-md mx-auto flex items-center gap-4">
        @csrf
        <div class="flex-grow">
            <label class="text-[9px] uppercase font-black text-slate-500 ml-2 mb-2 block tracking-[0.2em]">Huidig Gewicht (KG)</label>
            <input type="number" name="weight" step="0.1" placeholder="{{ $last_weight ?? '00.0' }}"
                   class="w-full bg-[#0f172a] border-2 border-slate-700 rounded-2xl p-4 text-2xl font-black text-emerald-400 focus:border-emerald-500 outline-none transition-all placeholder:opacity-10 text-center">
        </div>
        <button type="submit" class="mt-6 bg-slate-700 px-8 h-16 rounded-2xl font-black uppercase text-[10px] tracking-widest active:scale-95 transition-all text-white">OK</button>
    </form>
</footer>
</body>
</html>
