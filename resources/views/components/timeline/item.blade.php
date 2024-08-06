<div class="relative flex items-center justify-between md:justify-start md:odd:flex-row-reverse group
            " style="width:50%;margin-left:48%;margin-top:4%">
    <div class="group-even:translate-x-10 group-odd:-translate-x-10 italic font-extralight text-cyan-700 flex" style="width:10%;margin-right:5%">{{ $duration ?? "" }}</div>
    <div class="w-full md:w-1/2 bg-white p-4 border border-slate-200 shadow" style="border-radius: 12px">
        <div class="flex items-center justify-between space-x-2 mb-1">
            <div class="flex items-center gap-3">
                <div class="font-bold text-xl text-slate-900" style="max-width: 80%">{{ $title }}</div>
                <div class="flex items-center gap-1 opacity-65">
                    <div class="w-3 h-3 rounded-full bg-slate-300 group-[.aprobada]:bg-emerald-600 group-[.rechazada]:bg-red-400 group-[.enviada]:bg-indigo-400">
                    </div>
                    <div class="min-w-[10em]">{{ $estado }}</div>
                </div>
            </div>
            <time class="font-thin text-sm text-cyan-900 opacity-65">{{ $date }}</time>
        </div>
        {{ $slot }}
    </div>
</div>
