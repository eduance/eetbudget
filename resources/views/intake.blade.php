<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Profiel Instellen - Eetbudget.nl</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #020617; font-family: system-ui, -apple-system, sans-serif; }
        /* Voorkomt dat getallen in de input raar verspringen op mobiel */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
    </style>
</head>
<body class="bg-[#020617] text-white antialiased flex flex-col min-h-screen">

<div class="flex-grow flex items-center justify-center p-6">
    <div class="max-w-md w-full py-10">

        <header class="text-center mb-10">
            <div class="inline-block bg-slate-800 p-5 rounded-3xl mb-4 border border-slate-600 shadow-xl">
                <span class="text-4xl">📊</span>
            </div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Profiel instellen</h1>
            <p class="text-slate-400 mt-2 text-lg">Jouw gegevens voor de berekening.</p>
        </header>

        <form action="{{ route('intake.store') }}" method="POST" class="space-y-8">
            @csrf

            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 ml-4 mb-3 tracking-widest">Huidig gewicht (kg)</label>
                <input type="number" name="start_weight" placeholder="92.5" step="0.1" required
                       class="w-full bg-slate-800 border-2 border-slate-600 rounded-[2rem] p-6 text-4xl font-bold text-center focus:border-emerald-400 focus:bg-slate-700 outline-none transition-all text-emerald-400 placeholder:text-slate-600">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 ml-4 mb-3 tracking-widest">Lengte (cm)</label>
                <input type="number" name="height" placeholder="180" required
                       class="w-full bg-slate-800 border-2 border-slate-600 rounded-[2rem] p-6 text-4xl font-bold text-center focus:border-emerald-400 focus:bg-slate-700 outline-none transition-all text-emerald-400 placeholder:text-slate-600">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 ml-4 mb-3 tracking-widest">Streefgewicht (kg)</label>
                <input type="number" name="target_weight" placeholder="85.0" step="0.1" required
                       class="w-full bg-slate-800 border-2 border-slate-600 rounded-[2rem] p-6 text-4xl font-bold text-center focus:border-emerald-400 focus:bg-slate-700 outline-none transition-all text-emerald-400 placeholder:text-slate-600">
            </div>

            <button type="submit" class="w-full bg-emerald-500 text-slate-950 p-6 rounded-[2rem] text-xl font-extrabold uppercase tracking-widest shadow-xl active:scale-95 transition-all border-b-8 border-emerald-700">
                Bereken Budget
            </button>
        </form>

    </div>
</div>

</body>
</html>
