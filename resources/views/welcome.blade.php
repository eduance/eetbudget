<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Welkom - Eetbudget.nl</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #020617; font-family: system-ui, -apple-system, sans-serif; }
    </style>
</head>
<body class="bg-[#020617] text-white antialiased">

<div class="max-w-md mx-auto p-8 space-y-12 py-12">

    <header class="text-center">
        <div class="inline-block bg-emerald-500/20 p-5 rounded-3xl mb-6 border border-emerald-500/30 shadow-lg">
            <span class="text-5xl">💳</span>
        </div>
        <h1 class="text-4xl font-extrabold tracking-tight text-white">Eetbudget<span class="text-emerald-400">.nl</span></h1>
        <p class="text-slate-300 mt-4 text-xl leading-snug font-medium">Je voeding beheren zoals je bankrekening.</p>
    </header>

    <section class="space-y-4">
        <h2 class="text-xs font-bold uppercase tracking-[0.2em] text-emerald-400 ml-2">Hoe het werkt</h2>
        <div class="bg-slate-900 p-8 rounded-[2.5rem] border border-slate-700 shadow-2xl space-y-6">
            <p class="text-slate-100 text-lg leading-relaxed">Afvallen is een simpele rekensom. Zie het als een <strong>wekelijks budget</strong> dat je mag uitgeven.</p>
            <p class="text-slate-300 text-base leading-relaxed">Elke maaltijd is een "betaling". Blijf binnen je budget en je valt gegarandeerd af.</p>
            <div class="bg-emerald-500/10 p-4 rounded-2xl border border-emerald-500/20">
                <p class="text-sm text-emerald-300 leading-relaxed text-center font-semibold">"Geen calorieën tellen, maar gewoon je saldo bewaken."</p>
            </div>
        </div>
    </section>

    <section class="space-y-6">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-white">Direct starten?</h2>
            <p class="text-slate-400 text-sm mt-2">Vul je persoonlijke toegangscode in.</p>
        </div>

        <form action="{{ route('access') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="token" placeholder="BIJV. HENK" required
                   class="w-full bg-slate-800 border-2 border-slate-600 rounded-3xl p-6 text-2xl font-bold text-center focus:border-emerald-400 focus:ring-4 focus:ring-emerald-500/20 outline-none transition-all placeholder:text-slate-600 uppercase tracking-widest text-white">

            <button type="submit"
                    class="w-full bg-emerald-500 hover:bg-emerald-400 text-slate-950 p-6 rounded-3xl text-xl font-bold transition-all shadow-lg active:scale-[0.98]">
                Open mijn rekening
            </button>
        </form>
        <p class="text-xs text-center text-slate-500 font-medium tracking-wide leading-relaxed">Geen wachtwoorden nodig.<br>Onthoud je code om later weer in te loggen.</p>
    </section>
</div>
</body>
</html>
