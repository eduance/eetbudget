<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Berekening - Eetbudget.nl</title>
    <style>
        body { background-color: #020617; font-family: system-ui, -apple-system, sans-serif; }

        /* De balk loopt nu in 6 seconden vol voor een vlot gevoel */
        @keyframes loading-bar {
            0% { width: 0%; }
            10% { width: 15%; }
            30% { width: 35%; }
            60% { width: 70%; }
            90% { width: 95%; }
            100% { width: 100%; }
        }
        .animate-load { animation: loading-bar 6s ease-in-out forwards; }
    </style>
</head>
<body class="bg-[#020617] text-white flex items-center justify-center min-h-screen p-8 text-center">
<div class="max-w-sm w-full">

    <div class="mb-10 text-6xl animate-bounce">🧠</div>

    <h1 class="text-3xl font-extrabold tracking-tight mb-6 text-white">Berekening gestart</h1>

    <div class="bg-slate-900 p-8 rounded-[2.5rem] border border-slate-700 shadow-2xl space-y-6 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-emerald-500/30 animate-pulse"></div>

        <p class="text-slate-200 text-lg leading-relaxed font-medium">
            Je profiel wordt geanalyseerd. We stellen nu jouw persoonlijke <span class="text-emerald-400 font-bold">Eetbudget</span> vast.
        </p>

        <div class="h-6">
            <p id="status-text" class="text-emerald-400 text-xs font-bold uppercase tracking-widest animate-pulse">
                Data valideren...
            </p>
        </div>
    </div>

    <div class="mt-12 h-5 w-full bg-slate-800 rounded-full overflow-hidden border-2 border-slate-700 shadow-inner">
        <div class="bg-emerald-500 h-full animate-load shadow-[0_0_20px_rgba(16,185,129,0.4)]"></div>
    </div>

    <p class="mt-6 text-xs font-bold uppercase tracking-[0.2em] text-slate-500">
        Configuratie wordt opgeslagen...
    </p>
</div>

<script>
    const statusText = document.getElementById('status-text');
    const steps = [
        "BMI profiel bepalen...",
        "Basismetabolisme berekenen...",
        "Activiteitsfactor wegen...",
        "Tekort-marge instellen...",
        "Budget kalibreren...",
        "Klaar voor gebruik!"
    ];

    let currentStep = 0;

    function updateStatus() {
        if (currentStep < steps.length) {
            statusText.innerText = steps[currentStep];
            currentStep++;
            // Snellere intervallen voor een 6-seconden flow
            setTimeout(updateStatus, 900 + Math.random() * 500);
        }
    }

    setTimeout(updateStatus, 800);

    setTimeout(() => {
        window.location.href = '/onboarding';
    }, 7000);
</script>

</body>
</html>
