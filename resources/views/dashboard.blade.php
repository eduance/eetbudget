<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Dashboard - Eetbudget.nl</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #020617; font-family: ui-sans-serif, system-ui, -apple-system, sans-serif; }
        input::-webkit-outer-spin-button, input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
        .balance-glow { text-shadow: 0 0 30px rgba(16, 185, 129, 0.4); }
    </style>
</head>
<body class="bg-[#020617] text-white antialiased flex flex-col min-h-screen">

<header class="pt-14 pb-10 px-6 text-center bg-slate-900 shadow-2xl rounded-b-[3.5rem] border-b-2 border-slate-800">
    <h1 class="text-slate-500 uppercase tracking-[0.2em] text-[10px] font-bold">Vandaag over</h1>

    <div class="mt-4 flex justify-center items-baseline gap-2">
        <span class="text-9xl font-black tabular-nums tracking-tighter text-emerald-400 balance-glow">
            {{ $daily_balance }}
        </span>
        <span class="text-2xl font-bold text-slate-700 uppercase tracking-widest">pt</span>
    </div>

    <div class="mt-6 inline-flex items-center gap-3 bg-slate-950/50 px-5 py-2.5 rounded-2xl border border-slate-800">
        <div class="flex flex-col text-left border-r border-slate-800 pr-4">
            <span class="text-[9px] font-bold uppercase text-slate-500 tracking-widest leading-none mb-1">Week Saldo</span>
            <span class="text-sm font-bold text-indigo-400 leading-none">{{ $weekly_balance }} pt</span>
        </div>
        <div class="flex flex-col text-left">
            <span class="text-[9px] font-bold uppercase text-slate-500 tracking-widest leading-none mb-1">Volgende storting</span>
            <span class="text-xs font-bold text-slate-300 leading-none">{{ $reset_day }}</span>
        </div>
    </div>
</header>

<main class="flex-grow p-6 space-y-4 max-w-md mx-auto w-full">
    <form action="{{ route('entries.store') }}" method="POST" class="space-y-4">
        @csrf

        <button type="submit" name="points" value="1"
                class="w-full h-28 bg-emerald-600 hover:bg-emerald-500 rounded-[2.5rem] flex items-center justify-between px-8 shadow-xl active:scale-95 transition-all border-b-8 border-emerald-800">
            <div class="text-left">
                <span class="block text-2xl font-bold text-white tracking-tight">Licht</span>
                <span class="text-emerald-100/60 text-[10px] font-bold uppercase tracking-widest">Snack / Drinken</span>
            </div>
            <span class="text-4xl font-black bg-black/20 w-16 h-16 flex items-center justify-center rounded-2xl text-white shadow-inner">-1</span>
        </button>

        <button type="submit" name="points" value="2"
                class="w-full h-28 bg-indigo-600 hover:bg-indigo-500 rounded-[2.5rem] flex items-center justify-between px-8 shadow-xl active:scale-95 transition-all border-b-8 border-indigo-800">
            <div class="text-left">
                <span class="block text-2xl font-bold text-white tracking-tight">Normaal</span>
                <span class="text-indigo-100/60 text-[10px] font-bold uppercase tracking-widest">Standaard maaltijd</span>
            </div>
            <span class="text-4xl font-black bg-black/20 w-16 h-16 flex items-center justify-center rounded-2xl text-white shadow-inner">-2</span>
        </button>

        <button type="submit" name="points" value="4"
                class="w-full h-28 bg-slate-700 hover:bg-slate-600 rounded-[2.5rem] flex items-center justify-between px-8 shadow-xl active:scale-95 transition-all border-b-8 border-slate-900">
            <div class="text-left">
                <span class="block text-2xl font-bold text-white tracking-tight">Flink</span>
                <span class="text-slate-300/60 text-[10px] font-bold uppercase tracking-widest">Grote maaltijd / Extra</span>
            </div>
            <span class="text-4xl font-black bg-black/20 w-16 h-16 flex items-center justify-center rounded-2xl text-white shadow-inner">-4</span>
        </button>
    </form>
</main>

<footer class="p-8 bg-slate-900 border-t-2 border-slate-800 mt-auto shadow-[0_-10px_30px_rgba(0,0,0,0.4)]">
    <form action="{{ route('weights.store') }}" method="POST" class="max-w-md mx-auto flex items-end gap-3">
        @csrf
        <div class="flex-grow">
            <label class="text-[10px] font-bold uppercase text-slate-500 ml-2 mb-3 block tracking-[0.2em]">Data input: Gewicht (KG)</label>
            <input type="number" name="weight" step="0.1" placeholder="{{ $last_weight ?? '00.0' }}" required
                   class="w-full bg-slate-950 border-2 border-slate-700 rounded-3xl p-5 text-3xl font-bold text-emerald-400 focus:border-emerald-500 focus:bg-black outline-none transition-all text-center">
        </div>
        <button type="submit"
                class="bg-slate-800 hover:bg-slate-700 h-[78px] px-8 rounded-3xl font-bold uppercase text-xs tracking-widest active:scale-95 transition-all border-b-4 border-black text-slate-300">
            OK
        </button>
    </form>
</footer>

</body>
</html>
