<!DOCTYPE html>
<html lang="nl">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>God Mode - Eetbudget</title>
</head>
<body class="bg-slate-900 text-white p-10">
<h1 class="text-3xl font-black mb-10 text-emerald-400 italic uppercase">Concierge Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-10">
    <section>
        <h2 class="text-xl font-bold mb-4 text-amber-500">⏳ Wachtend op Algoritme</h2>
        <div class="space-y-4">
            @foreach($pendingUsers as $user)
                <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <p class="font-black text-xl">{{ $user->name }}</p>
                            <p class="text-xs text-slate-400 italic">Token: {{ $user->token }}</p>
                        </div>
                        <div class="text-right text-sm">
                            <p>Huidig: {{ $user->start_weight }}kg</p>
                            <p>Doel: {{ $user->target_weight }}kg</p>
                        </div>
                    </div>
                    <form action="{{ route('admin.activate', $user) }}" method="POST" class="flex gap-2">
                        @csrf
                        <input type="number" name="budget" value="35" class="bg-slate-900 border border-slate-600 rounded-lg p-2 w-20 text-center font-bold">
                        <button class="flex-grow bg-emerald-600 font-bold p-2 rounded-lg hover:bg-emerald-500">ACTIVEER</button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>

    <section>
        <h2 class="text-xl font-bold mb-4 text-emerald-500">✅ Actieve Gebruikers</h2>
        <div class="space-y-2">
            @foreach($activeUsers as $user)
                <div class="bg-slate-800/50 p-4 rounded-xl border border-slate-700 flex justify-between items-center">
                    <span>{{ $user->name }}</span>
                    <span class="font-bold text-emerald-400">{{ $user->weekly_budget }} PT</span>
                </div>
            @endforeach
        </div>
    </section>
</div>
</body>
</html>
