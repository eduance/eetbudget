<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Start - Eetbudget.nl</title>
    <style>
        body { background-color: #020617; font-family: ui-sans-serif, system-ui, sans-serif; }
        .balance-glow { text-shadow: 0 0 30px rgba(16, 185, 129, 0.4); }
        .step-hidden { display: none; }
        .fade-in { animation: fadeIn 0.4s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-[#020617] text-slate-100 p-4 md:p-12 flex flex-col items-center min-h-screen pb-20">

<div class="max-w-md w-full py-6">

    <div class="flex gap-2 mb-8" id="progress-bar">
        <div class="h-1.5 w-1/4 bg-emerald-500 rounded-full transition-all duration-500" id="prog-1"></div>
        <div class="h-1.5 w-1/4 bg-slate-800 rounded-full transition-all duration-500" id="prog-2"></div>
        <div class="h-1.5 w-1/4 bg-slate-800 rounded-full transition-all duration-500" id="prog-3"></div>
        <div class="h-1.5 w-1/4 bg-slate-800 rounded-full transition-all duration-500" id="prog-4"></div>
    </div>

    <div id="step-1" class="space-y-8 fade-in">
        <header class="space-y-3">
            <h1 class="text-4xl font-black text-white tracking-tight">Welkom.</h1>
            <p class="text-emerald-400 text-lg font-bold">Laten we het simpel houden.</p>
        </header>

        <div class="bg-slate-900 p-8 rounded-[2.5rem] border border-slate-800 shadow-xl space-y-6">
            <p class="text-slate-300 text-[17px] leading-relaxed">
                Geen verboden producten. Geen ingewikkelde diëten. Dit systeem werkt exact als een bankrekening.
            </p>
            <p class="text-slate-300 text-[17px] leading-relaxed">
                Je krijgt elke dag een "salaris" aan punten. Geef je ze uit aan bier en bitterballen? Prima, maar dan is je saldo sneller op. Eet je mager vlees en veel groente? Dan kun je vaker eten.
            </p>
            <p class="text-slate-300 text-[17px] leading-relaxed font-bold text-white">
                Zolang je niet "rood" staat aan het eind van de week, zal je lichaam vet verbranden. Wij doen de wiskunde, jij hoeft alleen maar af te tikken.
            </p>
        </div>

        <button onclick="nextStep(2)" class="w-full bg-emerald-500 text-slate-950 p-6 rounded-3xl text-xl font-black uppercase tracking-widest shadow-xl active:scale-95 transition-all">
            Laat mijn budget zien →
        </button>
    </div>

    <div id="step-2" class="step-hidden space-y-8 fade-in">
        <header class="space-y-3">
            <h1 class="text-4xl font-black text-white tracking-tight">Jouw Saldo.</h1>
            <p class="text-slate-300 text-lg leading-relaxed font-medium">
                We hebben je metabolisme berekend op basis van je huidige gewicht.
            </p>
        </header>

        <div class="bg-emerald-500/10 p-10 rounded-[3rem] border-2 border-emerald-500/30 shadow-2xl text-center">
            <p class="text-[11px] font-black uppercase text-emerald-500 tracking-[0.2em] mb-4">Je dagelijkse leefgeld</p>
            <div class="flex items-center justify-center gap-2">
                <span class="text-8xl font-black text-emerald-400 balance-glow tabular-nums">{{ $daily_points ?? '20' }}</span>
                <span class="text-2xl font-bold text-emerald-600 uppercase">pt</span>
            </div>
            <p class="text-sm text-emerald-100/60 mt-6 italic">1 punt staat grofweg gelijk aan 100 kcal.</p>
        </div>

        <button onclick="nextStep(3)" class="w-full bg-white text-slate-950 p-6 rounded-3xl text-xl font-black uppercase tracking-widest shadow-xl active:scale-95 transition-all">
            Start de training →
        </button>
    </div>

    <div id="step-3" class="step-hidden space-y-8 fade-in">
        <header class="space-y-2">
            <h1 class="text-3xl font-black text-white tracking-tight italic">Ogen open...</h1>
            <p class="text-slate-400 text-sm">Mensen verwarren "gezond" vaak met "weinig calorieën". Test je kennis met deze 6 voorbeelden.</p>
        </header>

        <section class="bg-slate-900 p-6 rounded-[2.5rem] border-2 border-indigo-500/30 shadow-2xl space-y-6">

            <div class="bg-slate-950 rounded-3xl border border-slate-800 p-8 text-center flex flex-col items-center justify-center min-h-[220px]">
                <p class="text-[10px] font-black text-indigo-400 uppercase tracking-widest mb-4" id="quiz-counter">Vraag 1 van 6</p>
                <div id="quiz-icon" class="text-7xl mb-4 drop-shadow-xl">🥗</div>
                <p id="quiz-title" class="text-xl text-white font-bold leading-snug">
                    AH Maaltijdsalade Geitenkaas
                </p>
            </div>

            <div class="grid grid-cols-2 gap-3" id="quiz-buttons">
                <button onclick="checkAnswer(0)" class="bg-slate-800 hover:bg-slate-700 p-4 rounded-2xl shadow-xl active:scale-95 transition-all flex flex-col items-center justify-center border-b-4 border-slate-900 h-24">
                    <span class="text-slate-300 font-black uppercase text-[10px] tracking-widest mb-1">Gratis</span>
                    <span class="text-2xl font-black text-white">0</span>
                </button>
                <button onclick="checkAnswer(1)" class="bg-emerald-600 hover:bg-emerald-500 p-4 rounded-2xl shadow-xl active:scale-95 transition-all flex flex-col items-center justify-center border-b-4 border-emerald-800 h-24">
                    <span class="text-emerald-100 font-black uppercase text-[10px] tracking-widest mb-1">Snack</span>
                    <span class="text-2xl font-black text-white">-1</span>
                </button>
                <button onclick="checkAnswer(2)" class="bg-indigo-600 hover:bg-indigo-500 p-4 rounded-2xl shadow-xl active:scale-95 transition-all flex flex-col items-center justify-center border-b-4 border-indigo-800 h-24">
                    <span class="text-indigo-100 font-black uppercase text-[10px] tracking-widest mb-1">Maaltijd</span>
                    <span class="text-2xl font-black text-white">-2</span>
                </button>
                <button onclick="checkAnswer(4)" class="bg-rose-700 hover:bg-rose-600 p-4 rounded-2xl shadow-xl active:scale-95 transition-all flex flex-col items-center justify-center border-b-4 border-rose-900 h-24">
                    <span class="text-rose-100 font-black uppercase text-[10px] tracking-widest mb-1">Flink</span>
                    <span class="text-2xl font-black text-white">-4</span>
                </button>
            </div>

            <div id="quiz-feedback" class="hidden space-y-4 fade-in">
                <div id="feedback-box" class="p-5 rounded-2xl border-l-4">
                    <p id="feedback-text" class="text-[15px] font-medium leading-relaxed text-slate-200"></p>
                </div>
                <button onclick="nextQuestion()" id="next-btn" class="w-full bg-indigo-500 text-white p-5 rounded-2xl font-black uppercase tracking-widest active:scale-95 transition-all shadow-xl">
                    Volgende →
                </button>
            </div>
        </section>
    </div>

    <div id="step-4" class="step-hidden space-y-8 fade-in">
        <header class="space-y-3">
            <h1 class="text-4xl font-black text-white tracking-tight">Klaar voor de start.</h1>
            <p class="text-slate-300 text-lg leading-relaxed font-medium">Neem deze twee regels mee en je kan niet falen.</p>
        </header>

        <div class="space-y-4">
            <div class="bg-slate-900 p-6 rounded-3xl border border-slate-800 flex items-start gap-5">
                <span class="text-3xl mt-1">⚖️</span>
                <div>
                    <strong class="text-emerald-400 block text-lg font-bold mb-1">De Wekelijkse Update</strong>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Als je lichter wordt, heeft je lichaam minder energie nodig. Vul elke week je gewicht in onderaan het dashboard. Het systeem kalibreert dan automatisch je budget voor de nieuwe week.
                    </p>
                </div>
            </div>
            <div class="bg-slate-900 p-6 rounded-3xl border border-slate-800 flex items-start gap-5">
                <span class="text-3xl mt-1">💧</span>
                <div>
                    <strong class="text-indigo-400 block text-lg font-bold mb-1">Echt 100% Gratis</strong>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Water, Zwarte Koffie, Thee en Zero/Light frisdranken kosten 0 punten. Gebruik dit in je voordeel.
                    </p>
                </div>
            </div>
        </div>

        <div class="pt-4">
            <a href="{{ route('dashboard') }}" class="flex items-center justify-between w-full bg-emerald-500 text-slate-950 p-6 rounded-[2rem] text-xl font-black uppercase tracking-widest text-center shadow-2xl active:scale-95 transition-all">
                <span>Open Dashboard</span>
                <span class="text-3xl">→</span>
            </a>
        </div>
    </div>

</div>

<script>
    function nextStep(step) {
        // Hide all steps
        for(let i=1; i<=4; i++) {
            document.getElementById('step-'+i).classList.add('step-hidden');
        }
        // Show target step
        document.getElementById('step-'+step).classList.remove('step-hidden');

        // Update progress bar
        for(let i=1; i<=4; i++) {
            let bar = document.getElementById('prog-'+i);
            if(i <= step) {
                bar.classList.replace('bg-slate-800', 'bg-emerald-500');
                if(i === 3) bar.classList.replace('bg-emerald-500', 'bg-indigo-500'); // Special color for quiz
            }
        }

        window.scrollTo(0,0);
        if(step === 3) loadQuestion();
    }

    // De "Train je Pa" Quiz Database
    const quizData = [
        {
            icon: "🥗", title: "AH Salade met Geitenkaas & Noten", correct: 4,
            expl: "Gezond? Absoluut. Calorie-arm? Zeker niet! Door de kaas, noten en dressing tik je zo de 750 kcal aan. Dit is echt een flinke maaltijd (-4)."
        },
        {
            icon: "🥜", title: "Een handje gemengde noten", correct: 2,
            expl: "Trap er niet in. Noten bestaan voor een groot deel uit vet. Een handje is al snel 200 kcal. Tik dit af als Normaal (-2)."
        },
        {
            icon: "🥤", title: "Cola Zero of Zwarte Koffie", correct: 0,
            expl: "Perfect! Hier zit 0 kcal in. Je mag dit onbeperkt drinken zonder punten af te schrijven."
        },
        {
            icon: "🥪", title: "Broodje Gezond van de bakker", correct: 4,
            expl: "Nog zo'n valkuil. Door de mayonaise, kaas en het grote broodje is dit geen 'Normale' lunch, maar tikt het vaak de 600 kcal aan. Flink afrekenen (-4)."
        },
        {
            icon: "🧀", title: "Blokjes kaas & worst op een verjaardag", correct: 1,
            expl: "Ongemerkt 'grazen' is de grootste vijand. Een paar stukjes kaas of worst is al snel 150 kcal. Tik dit halverwege de avond af als een Snack (-1)."
        },
        {
            icon: "🍊", title: "Groot glas verse Jus d'Orange", correct: 1,
            expl: "Het is vers, maar het zijn wel de vloeibare suikers van 4 sinaasappels zonder de vezels. Reken dit af als Licht (-1)."
        }
    ];

    let currentQ = 0;

    function loadQuestion() {
        document.getElementById('quiz-buttons').classList.remove('hidden');
        document.getElementById('quiz-feedback').classList.add('hidden');

        document.getElementById('quiz-counter').innerText = `Vraag ${currentQ + 1} van ${quizData.length}`;
        document.getElementById('quiz-title').innerText = quizData[currentQ].title;
        document.getElementById('quiz-icon').innerText = quizData[currentQ].icon;
    }

    function checkAnswer(guess) {
        const question = quizData[currentQ];
        const feedbackBox = document.getElementById('feedback-box');
        const feedbackText = document.getElementById('feedback-text');

        document.getElementById('quiz-buttons').classList.add('hidden');
        document.getElementById('quiz-feedback').classList.remove('hidden');

        if (guess === question.correct) {
            feedbackBox.className = "p-6 rounded-2xl border-l-4 border-emerald-500 bg-emerald-500/10";
            feedbackText.innerHTML = `<span class="text-emerald-400 font-black uppercase tracking-widest block mb-2">Scherp!</span> ${question.expl}`;
        } else {
            feedbackBox.className = "p-6 rounded-2xl border-l-4 border-rose-500 bg-rose-500/10";
            feedbackText.innerHTML = `<span class="text-rose-400 font-black uppercase tracking-widest block mb-2">Valkuil!</span> ${question.expl}`;
        }

        if (currentQ === quizData.length - 1) {
            document.getElementById('next-btn').innerText = "Ik ben er klaar voor →";
            document.getElementById('next-btn').classList.replace('bg-indigo-500', 'bg-emerald-500');
        }
    }

    function nextQuestion() {
        currentQ++;
        if (currentQ < quizData.length) {
            loadQuestion();
        } else {
            nextStep(4);
        }
    }
</script>

</body>
</html>
