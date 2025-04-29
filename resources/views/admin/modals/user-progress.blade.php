{{-- resources/views/admin/modals/user-progress.blade.php --}}
{{-- Nouvelle version avec thème Blanc / Vert Clair --}}

<div
    x-show="isProgressModalOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-30 overflow-y-auto flex items-center justify-center"
    style="display: none;"
    x-cloak {{-- Empêche le flash de contenu avant initialisation Alpine --}}
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
         class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div> {{-- Garde l'overlay sombre pour le contraste --}}

    <!-- Modal Panel -->
    <div
        x-show="isProgressModalOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="relative bg-white rounded-lg shadow-xl w-full max-w-3xl mx-4 my-8 overflow-hidden transform" {{-- Fond blanc, max-w ajusté --}}
        @click.outside="closeProgressModal()"
    >
        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200"> {{-- Bordure claire --}}
            <h3 class="text-lg font-medium leading-6 text-gray-900"> {{-- Texte sombre --}}
                User Progress: <span class="font-semibold" x-text="progressUser ? progressUser.fullname : 'Loading...'"></span>
            </h3>
            <button @click="closeProgressModal()" class="text-gray-400 hover:text-gray-600"> {{-- Bouton fermeture clair --}}
                <span class="sr-only">Close</span>
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6 space-y-6 max-h-[75vh] overflow-y-auto text-gray-700"> {{-- Texte par défaut plus sombre, max-h ajusté --}}

            <!-- Indicateur de chargement des détails -->
            <div x-show="loadingProgress" class="text-center py-10">
                <svg class="animate-spin h-8 w-8 text-emerald-500 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> {{-- Spinner vert --}}
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                <p class="mt-2 text-gray-500">Loading progress details...</p> {{-- Texte chargement --}}
            </div>

             <!-- Message d'erreur -->
            <div x-show="progressError" class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded relative" role="alert"> {{-- Style alerte clair --}}
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline" x-text="progressError"></span>
            </div>

            <!-- Contenu de la progression (si chargé et sans erreur) -->
            <div x-show="!loadingProgress && !progressError && progressUser" class="space-y-6">

                <!-- Section Informations Utilisateur -->
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200"> {{-- Fond très clair --}}
                     <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-2 mb-3">
                        <div>
                            <span class="font-semibold block text-lg text-gray-900" x-text="progressUser.fullname"></span>
                            <span class="text-sm text-gray-500" x-text="progressUser.email"></span>
                        </div>
                        <div class="flex items-center space-x-2 flex-shrink-0">
                             {{-- Badges avec couleurs claires --}}
                             <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-medium rounded-full capitalize"
                                  :class="{
                                      'bg-blue-100 text-blue-800': progressUser.role === 'admin',
                                      'bg-purple-100 text-purple-800': progressUser.role === 'referee',
                                      'bg-emerald-100 text-emerald-800': progressUser.role === 'athlete',
                                      'bg-gray-100 text-gray-800': !['admin', 'referee', 'athlete'].includes(progressUser.role)
                                  }"
                                  x-text="progressUser.role">
                            </span>
                             <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-medium rounded-full capitalize"
                                  :class="{
                                    'bg-green-100 text-green-800': progressUser.status === 'active',
                                    'bg-yellow-100 text-yellow-800': progressUser.status === 'pending',
                                    'bg-red-100 text-red-800': progressUser.status === 'suspended',
                                    'bg-gray-100 text-gray-800': !['active', 'pending', 'suspended'].includes(progressUser.status)
                                  }"
                                  x-text="progressUser.status">
                            </span>
                        </div>
                    </div>
                     <div class="text-sm text-gray-500">
                        <span>Club: <span class="font-medium text-gray-700" x-text="progressUser.club ? progressUser.club.name : 'N/A'"></span></span>
                    </div>
                </div>

                 <!-- Section Indicateurs Clés -->
                 <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    {{-- Carte Compétitions avec accent vert --}}
                    <div class="bg-emerald-50 rounded-lg shadow-sm p-4 border border-emerald-200">
                        <h4 class="text-sm font-medium text-emerald-700 mb-1">Competitions</h4>
                        <div class="flex justify-between items-baseline">
                            <span class="text-3xl font-bold text-emerald-900" x-text="progressData.competitions_count ?? '0'"></span>
                            {{-- <span class="text-xs font-semibold text-green-600">+2 this year</span> --}}
                        </div>
                    </div>
                    {{-- Carte Matches Gagnés (Blanc) --}}
                     <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-200">
                        <h4 class="text-sm font-medium text-gray-500 mb-1">Fights Won</h4>
                         <div class="flex justify-between items-baseline">
                            <span class="text-3xl font-bold text-gray-900" x-text="progressData.matches_won ?? '0'"></span>
                            {{-- <span class="text-xs font-semibold text-red-600">-1 last comp.</span> --}}
                        </div>
                    </div>
                    {{-- Carte Classement (Blanc) --}}
                     <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-200">
                        <h4 class="text-sm font-medium text-gray-500 mb-1">Current Rank</h4>
                         <div class="flex justify-between items-baseline">
                            <span class="text-3xl font-bold text-gray-900" x-text="progressData.rank ?? 'N/A'"></span>
                        </div>
                    </div>
                 </div>

                <!-- Section Détails de la Progression (Activités Récentes) -->
                <div>
                    <h4 class="text-base font-medium text-gray-800 mb-3">Recent Activity</h4>
                     <div x-show="!progressData || !progressData.activities || progressData.activities.length === 0" class="text-center text-gray-400 py-4 border border-dashed border-gray-300 rounded-md">
                         No recent activity recorded.
                     </div>
                     <ul x-show="progressData && progressData.activities && progressData.activities.length > 0" class="space-y-2">
                         <template x-for="activity in progressData.activities" :key="activity.id">
                             {{-- Style de ligne plus clair avec hover --}}
                             <li class="bg-white rounded-md p-3 flex justify-between items-center text-sm border border-gray-200 hover:bg-gray-50 transition duration-150 ease-in-out">
                                <div>
                                     <span class="font-medium text-gray-800" x-text="activity.description"></span>
                                     {{-- Formatage date amélioré --}}
                                     <span class="block text-xs text-gray-500" x-text="new Date(activity.date).toLocaleDateString('fr-FR', { year: 'numeric', month: 'short', day: 'numeric' })"></span>
                                </div>
                                 {{-- Badges de type d'activité avec couleurs claires --}}
                                 <span class="text-xs font-medium px-2 py-0.5 rounded-full capitalize flex-shrink-0 ml-4"
                                      :class="{
                                        'bg-green-100 text-green-800': activity.type === 'win',
                                        'bg-red-100 text-red-800': activity.type === 'loss',
                                        'bg-yellow-100 text-yellow-800': activity.type === 'draw',
                                        'bg-blue-100 text-blue-800': activity.type === 'event',
                                        'bg-indigo-100 text-indigo-800': activity.type === 'training', // Exemple pour training
                                        'bg-gray-100 text-gray-800': !['win', 'loss', 'draw', 'event', 'training'].includes(activity.type)
                                      }"
                                      x-text="activity.type">
                                </span>
                             </li>
                         </template>
                     </ul>
                </div>
                 {{-- Section pour autres stats si besoin --}}
                 <div>
                     <h4 class="text-base font-medium text-gray-800 mb-3 mt-5">Overall Stats</h4>
                     <dl class="grid grid-cols-1 sm:grid-cols-3 gap-x-4 gap-y-2 text-sm">
                         <div class="bg-gray-50 p-2 rounded border border-gray-200">
                           <dt class="text-gray-500">Fights Played</dt>
                           <dd class="font-medium text-gray-900" x-text="progressData.matches_played ?? '0'"></dd>
                         </div>
                          <div class="bg-gray-50 p-2 rounded border border-gray-200">
                           <dt class="text-gray-500">Points Scored</dt>
                           <dd class="font-medium text-gray-900" x-text="progressData.points_scored ?? '0'"></dd>
                         </div>
                          {{-- Ajoute d'autres stats ici si retournées par l'API --}}
                          {{-- <div class="bg-gray-50 p-2 rounded border border-gray-200">
                           <dt class="text-gray-500">Points Conceded</dt>
                           <dd class="font-medium text-gray-900" x-text="progressData.points_conceded ?? '0'"></dd>
                         </div> --}}
                     </dl>
                </div>

            </div>

        </div>

         <!-- Footer -->
         <div class="px-6 py-3 bg-gray-50 border-t border-gray-200 text-right"> {{-- Footer clair --}}
            <button
                @click="closeProgressModal()"
                type="button"
                class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"> {{-- Bouton style secondaire --}}
                Close
            </button>
        </div>
    </div>
</div>