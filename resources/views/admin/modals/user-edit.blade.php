{{-- resources/views/admin/modals/user-progress.blade.php --}}
{{-- VERSION AVEC DONNÉES STATIQUES POUR VISUALISATION --}}

<div
    x-show="isProgressModalOpen" {{-- Gardé pour le contrôle d'ouverture/fermeture --}}
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-30 overflow-y-auto flex items-center justify-center"
    style="display: none;"
    x-cloak {{-- Ajouté pour éviter le flash de contenu avant qu'Alpine ne prenne le contrôle --}}
>
    <!-- Overlay -->
    <div x-show="isProgressModalOpen"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="closeProgressModal()"
         class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm"></div>

    <!-- Modal Panel -->
    <div
        x-show="isProgressModalOpen" {{-- Gardé pour le contrôle d'ouverture/fermeture --}}
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl w-full max-w-2xl mx-4 my-8 overflow-hidden transform text-white"
        @click.outside="closeProgressModal()"
    >
        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-700">
            <h3 class="text-xl font-semibold text-yellow-400">
                User Progress: <span>Static User Name</span> {{-- Donnée Statique --}}
            </h3>
            <button @click="closeProgressModal()" class="text-gray-400 hover:text-white">
                <span class="sr-only">Close</span>
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6 space-y-6 max-h-[70vh] overflow-y-auto">

            {{-- Indicateurs de chargement et d'erreur sont retirés pour l'aperçu statique --}}
            {{-- <div x-show="loadingProgress">...</div> --}}
            {{-- <div x-show="progressError">...</div> --}}

            <!-- Contenu de la progression (toujours visible dans cette version statique) -->
            <div class="space-y-6">

                <!-- Section Informations Utilisateur (Statique) -->
                <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-sm rounded-lg p-4 text-gray-100 border border-white border-opacity-20">
                     <div class="flex justify-between items-start mb-3">
                        <div>
                            <span class="font-semibold block text-lg">Static User Name</span> {{-- Donnée Statique --}}
                            <span class="text-sm text-gray-300">static.user@example.com</span> {{-- Donnée Statique --}}
                        </div>
                         {{-- Badge Rôle Statique (Ex: Athlete) --}}
                         <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full capitalize bg-teal-900 text-teal-200">
                            athlete
                        </span>
                    </div>
                     <div class="flex items-center justify-between text-xs text-gray-300">
                        <span>Club: <span class="font-medium text-gray-100">Static Club FC</span></span> {{-- Donnée Statique --}}
                         {{-- Badge Statut Statique (Ex: Active) --}}
                         <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full capitalize bg-green-900 text-green-200">
                            active
                        </span>
                    </div>
                </div>

                 <!-- Section Indicateurs Clés (Statique) -->
                 <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-yellow-500 rounded-lg shadow p-4 border border-yellow-600">
                        <h4 class="text-sm font-medium text-yellow-900 mb-1">Competitions Participated</h4>
                        <div class="flex justify-between items-baseline">
                            <span class="text-2xl font-bold text-gray-900">7</span> {{-- Donnée Statique --}}
                        </div>
                    </div>
                     <div class="bg-white rounded-lg shadow p-4 border border-gray-200 text-gray-900">
                        <h4 class="text-sm font-medium text-gray-500 mb-1">Matches Won</h4>
                         <div class="flex justify-between items-baseline">
                            <span class="text-2xl font-bold">23</span> {{-- Donnée Statique --}}
                        </div>
                    </div>
                     <div class="bg-orange-500 rounded-lg shadow p-4 text-white border border-orange-600">
                        <h4 class="text-sm font-medium text-orange-100 mb-1">Current Rank/Level</h4>
                         <div class="flex justify-between items-baseline">
                            <span class="text-2xl font-bold">Gold</span> {{-- Donnée Statique --}}
                        </div>
                    </div>
                </div>

                <!-- Section Détails de la Progression (Liste Statique) -->
                <div>
                    <h4 class="text-lg font-semibold text-gray-300 mb-3">Recent Activity / Details</h4>
                     {{-- Retiré x-show pour état vide/liste --}}
                     <ul class="space-y-3">
                         {{-- Remplacé <template x-for="..."> par des <li> statiques --}}
                         <li class="bg-gray-700 bg-opacity-50 rounded-md p-3 flex justify-between items-center text-sm border border-gray-600">
                            <div>
                                 <span class="font-medium text-gray-100">Participated in Annual Championship</span> {{-- Statique --}}
                                 <span class="block text-xs text-gray-400">October 26, 2023</span> {{-- Statique --}}
                            </div>
                             {{-- Badge Type Statique (Ex: Event) --}}
                             <span class="text-xs font-semibold px-2 py-0.5 rounded bg-gray-500 text-gray-900">
                                event
                            </span>
                         </li>
                         <li class="bg-gray-700 bg-opacity-50 rounded-md p-3 flex justify-between items-center text-sm border border-gray-600">
                             <div>
                                 <span class="font-medium text-gray-100">Won qualification match</span> {{-- Statique --}}
                                 <span class="block text-xs text-gray-400">October 15, 2023</span> {{-- Statique --}}
                            </div>
                             {{-- Badge Type Statique (Ex: Win) --}}
                             <span class="text-xs font-semibold px-2 py-0.5 rounded bg-green-500 text-green-900">
                                win
                            </span>
                         </li>
                          <li class="bg-gray-700 bg-opacity-50 rounded-md p-3 flex justify-between items-center text-sm border border-gray-600">
                            <div>
                                 <span class="font-medium text-gray-100">Completed advanced training module</span> {{-- Statique --}}
                                 <span class="block text-xs text-gray-400">September 30, 2023</span> {{-- Statique --}}
                            </div>
                             {{-- Badge Type Statique (Ex: Training) --}}
                             <span class="text-xs font-semibold px-2 py-0.5 rounded bg-blue-500 text-blue-900">
                                training
                            </span>
                         </li>
                     </ul>
                </div>

            </div>

        </div>

         <!-- Footer (Optionnel) -->
         <div class="px-6 py-3 bg-gray-800 bg-opacity-50 border-t border-gray-700 text-right">
            <button @click="closeProgressModal()" class="px-4 py-2 bg-gray-600 hover:bg-gray-500 text-white rounded-md text-sm font-medium">
                Close
            </button>
        </div>
    </div>
</div>