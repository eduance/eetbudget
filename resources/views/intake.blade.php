<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Configuratie - Eetbudget.nl</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <style>
        body { overscroll-behavior: none; }
        input[type="number"] { font-size: 1.5rem !important; }
    </style>
</head>
<body class="bg-[#0f172a] text-white font-sans antialiased flex flex-col min-h-screen">

<div class="flex-grow flex items-center justify-center p-6">
    <div class="max-w-md w-full">

        <header class="text-center mb-10">
            <div class="inline-block bg-slate-800 p-4 rounded-full mb-4 shadow-inner border border-slate-700">
                <span class="text-4xl text-emerald-500 font-bold text-shadow-glow">📊</span>
            </div>
            <h1 class="text-3xl font-black uppercase tracking-tight italic leading-none text-white">Profiel instellen</h1>
            <p class="text-slate-400 mt-3 font-medium">Basisgegevens voor je persoonlijke budget.</p>
        </header>

        <form action="{{ route('intake.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-[10px] uppercase font-black text-slate-500 ml-4 mb-2 tracking-[0.2em]">Huidig gewicht (kg)</label>
                <input type="number" name="start_weight" placeholder="00.0" step="0.1" required
                       class="w-full bg-[#1e293b] border-2 border-slate-700 rounded-[2rem] p-6 text-3xl font-black text-center focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all placeholder:opacity-10 text-emerald-400">
            </div>

            <div>
                <label class="block text-[10px] uppercase font-black text-slate-500 ml-4 mb-2 tracking-[0.2em]">Lengte (cm)</label>
                <input type="number" name="height" placeholder="180" required
                       class="w-full bg-[#1e293b] border-2 border-slate-700 rounded-[2rem] p-6 text-3xl font-black text-center focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all placeholder:opacity-10 text-emerald-400">
            </div>

            <div>
                <label class="block text-[10px] uppercase font-black text-slate-500 ml-4 mb-2 tracking-[0.2em]">Streefgewicht (kg)</label>
                <input type="number" name="target_weight" placeholder="00.0" step="0.1" required
                       class="w-full bg-[#1e293b] border-2 border-slate-700 rounded-[2rem] p-6 text-3xl font-black text-center focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all placeholder:opacity-10 text-emerald-400">
            </div>

            <button type="submit"
                    class="w-full bg-[#10b981] hover:bg-[#059669] text-white p-6 rounded-[2rem] text-xl font-black uppercase tracking-widest shadow-xl shadow-emerald-900/40 active:scale-95 transition-all mt-4 border-b-4 border-emerald-800">
                Bereken Budget
            </button>
        </form>

    </div>
</div>

</body>
</html>
