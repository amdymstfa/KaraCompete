<div x-data="tournamentBracketComponent()" x-show="activeTab === 'brackets'" class="mt-8 pt-6 border-t border-gray-200"> {{-- Ajout marge et bordure pour séparation --}}

    <div class="relative bg-white p-6 rounded-lg shadow-md overflow-x-auto">

        <canvas x-ref="canvas" class="absolute inset-0 w-full h-full pointer-events-none z-0"></canvas>

        <div class="flex justify-around relative z-10 space-x-6 min-w-[900px]"> 

            {{-- Round 1 --}}
            <div class="flex flex-col space-y-4 round-1 py-4">
                {{-- Match 1 --}}
                <div class="bracket-item border border-gray-300 rounded p-2 bg-white w-44 text-center shadow-sm">
                    <div class="text-sm text-gray-700">Participant A</div>
                </div>
                <div class="bracket-item border border-gray-300 rounded p-2 bg-white w-44 text-center shadow-sm">
                    <div class="text-sm text-gray-700">Participant B</div>
                </div>
                {{-- Match 2 --}}
                <div class="bracket-item border border-gray-300 rounded p-2 bg-white w-44 text-center shadow-sm mt-8"> {{-- Ajout espace entre matchs --}}
                    <div class="text-sm text-gray-700">Participant C</div>
                </div>
                <div class="bracket-item border border-gray-300 rounded p-2 bg-white w-44 text-center shadow-sm">
                    <div class="text-sm text-gray-700">Participant D</div>
                </div>
                 {{-- Match 3 --}}
                <div class="bracket-item border border-gray-300 rounded p-2 bg-white w-44 text-center shadow-sm mt-8">
                    <div class="text-sm text-gray-700">Participant E</div>
                </div>
                <div class="bracket-item border border-gray-300 rounded p-2 bg-white w-44 text-center shadow-sm">
                    <div class="text-sm text-gray-700">Participant F</div>
                </div>
                 {{-- Match 4 --}}
                 <div class="bracket-item border border-gray-300 rounded p-2 bg-white w-44 text-center shadow-sm mt-8">
                    <div class="text-sm text-gray-700">Participant G</div>
                </div>
                <div class="bracket-item border border-gray-300 rounded p-2 bg-white w-44 text-center shadow-sm">
                    <div class="text-sm text-gray-700">Participant H</div>
                </div>
            </div>

            {{-- Round 2 (Quarter Finals) --}}
            <div class="flex flex-col justify-around round-2 py-4">
                <div class="bracket-item border border-gray-300 rounded p-2 bg-white w-44 text-center shadow-sm">
                    <div class="text-sm text-gray-700">Winner A/B</div>
                </div>
                 <div class="bracket-item border border-gray-300 rounded p-2 bg-white w-44 text-center shadow-sm">
                    <div class="text-sm text-gray-700">Winner C/D</div>
                </div>
                 <div class="bracket-item border border-gray-300 rounded p-2 bg-white w-44 text-center shadow-sm">
                    <div class="text-sm text-gray-700">Winner E/F</div>
                </div>
                 <div class="bracket-item border border-gray-300 rounded p-2 bg-white w-44 text-center shadow-sm">
                    <div class="text-sm text-gray-700">Winner G/H</div>
                </div>
            </div>

            {{-- Round 3 (Semi Finals) --}}
            <div class="flex flex-col justify-around round-3 py-4">
                 <div class="bracket-item border border-gray-300 rounded p-2 bg-white w-44 text-center shadow-sm">
                    <div class="text-sm text-gray-700">Winner QF1/QF2</div>
                </div>
                 <div class="bracket-item border border-gray-300 rounded p-2 bg-white w-44 text-center shadow-sm">
                    <div class="text-sm text-gray-700">Winner QF3/QF4</div>
                </div>
            </div>

            {{-- Round 4 (Final) --}}
            <div class="flex flex-col justify-center items-center round-4 py-4">
                <div class="bracket-item border-2 border-green-500 rounded p-3 bg-white w-44 text-center shadow-lg">
                    <div class="text-sm font-semibold text-gray-800">Final Winner</div>
                </div>
                <div class="mt-4 text-center">
                    <span class="text-yellow-500 text-3xl">🏆</span>
                    <p class="text-xs font-semibold text-gray-700 mt-1">Champion</p>
                </div>
            </div>

        </div> 
    </div> 
</div>

