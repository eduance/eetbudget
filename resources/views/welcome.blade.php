<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Welkom - Eetbudget.nl</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #0f172a; }
        .text-glow { text-shadow: 0 0 15px rgba(16, 185, 129, 0.4); }
    </style>
</head>
<body class="bg-[#0f172a] text-white font-sans antialiased">

<div class="max-w-md mx-auto p-6 space-y-12 py-16">

    <header class="text-center">
        <div class="inline-block bg-emerald-500/10 p-5 rounded-full mb-6 border border-emerald-500/20 shadow-xl">
            <span class="text-5xl">🔋</span>
        </div>
        <h1 class="text-4xl font-black uppercase tracking-tighter italic leading-none">
            Eetbudget<span class="text-emerald-400 text-glow">.nl</span>
        </h1>
        <p class="text-slate-400 mt-4 text-lg font-medium leading-tight">
            De enige app die werkt als een bankrekening voor je lichaam.
        </p>
    </header>

    <section class="space-y-4">
        <h2 class="text-xl font-black uppercase italic tracking-widest text-emerald-400">De Logica</h2>
        <div class="bg-[#1e293b] p-6 rounded-[3rem] border border-slate-700 shadow-xl space-y-4">
            <p class="text-slate-300 leading-relaxed">
                Je lichaam is een motor. Alles wat je eet is <strong>brandstof</strong>.
            </p>

            <p class="text-slate-300 leading-relaxed">
                Als je meer tankt dan je verbruikt, slaat de motor het overschot op als <strong>vet</strong>.
                Wij rekenen die brandstof om naar simpele <strong>Punten</strong>.
            </p>
            <div class="bg-[#0f172a] p-4 rounded-2xl border border-slate-800">
                <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 text-center text-balance">Het geheim van afvallen:</p>
                <p class="text-center text-emerald-400 font-black italic">Blijf binnen je budget, dan moet je lichaam je "reserve-tank" (vet) aanspreken.</p>
            </div>
        </div>
    </section>

    <section class="space-y-4">
        <h2 class="text-xl font-black uppercase italic tracking-widest text-indigo-400 text-right">Het Systeem</h2>
        <div class="grid grid-cols-1 gap-4">
            <div class="bg-[#1e293b] p-6 rounded-[2rem] border border-slate-700 shadow-xl">
                <h3 class="font-black uppercase text-sm text-indigo-400 mb-2">1. Wekelijks Budget</h3>
                <p class="text-slate-300 text-sm italic">"Je salaris"</p>
                <p class="text-slate-400 text-xs mt-2 leading-relaxed text-balance">Je krijgt elke maandag 35 punten. Dit is precies genoeg om langzaam maar zeker vet te verbranden.</p>
            </div>

            <div class="bg-[#1e293b] p-6 rounded-[2rem] border border-slate-700 shadow-xl">
                <h3 class="font-black uppercase text-sm text-indigo-400 mb-2">2. Direct Pinnen</h3>
                <p class="text-slate-300 text-sm italic text-balance">"Na elke maaltijd tik je de punten af."</p>
                <div class="flex gap-2 mt-4">
                    <span class="bg-emerald-900/40 text-emerald-400 px-3 py-1 rounded-lg text-[10px] font-black border border-emerald-500/20">-1 PT</span>
                    <span class="bg-amber-900/40 text-amber-400 px-3 py-1 rounded-lg text-[10px] font-black border border-amber-500/20">-2 PT</span>
                    <span class="bg-red-900/40 text-red-400 px-3 py-1 rounded-lg text-[10px] font-black border border-red-500/20">-4 PT</span>
                </div>
            </div>
        </div>
    </section>

    <section class="space-y-6 pt-6">
        <div class="text-center">
            <h2 class="text-2xl font-black uppercase italic tracking-tight">Klaar om te starten?</h2>
            <p class="text-slate-500 text-xs font-bold uppercase tracking-widest mt-1">Voer je persoonlijke code in</p>
        </div>

        <form action="{{ route('access') }}" method="POST" class="space-y-4">
            @csrf
            <div class="relative">
                <input type="text" name="token" placeholder="Bijv. PAP of JAN" required
                       class="w-full bg-[#1e293b] border-2 border-slate-700 rounded-[2.5rem] p-6 text-2xl font-black text-center focus:border-emerald-500 outline-none transition-all placeholder:opacity-20 uppercase tracking-widest">
            </div>

            <button type="submit"
                    class="w-full bg-emerald-600 hover:bg-emerald-500 text-white p-6 rounded-[2.5rem] text-xl font-black uppercase tracking-[0.2em] shadow-2xl shadow-emerald-900/40 active:scale-95 transition-all border-b-4 border-emerald-800">
                GA NAAR MIJN BUDGET
            </button>
        </form>

        <p class="text-[10px] text-center text-slate-600 font-bold uppercase tracking-[0.2em]">
            Geen wachtwoorden nodig. Onthoud je code.
        </p>
    </section>

</div>

</body>
</html>
