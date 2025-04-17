{{-- resources/views/admin/_admin-dashboard-stats.blade.php --}}

{{-- Container principal du tableau de bord avec le composant Alpine --}}
<div x-data="dashboardStats" x-cloak class="space-y-8" x-show="activeTab === 'GlobalsStats'">

    {{-- Section 1: Indicateurs Clés (KPIs) --}}
    <section>
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Vue d'Ensemble</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            {{-- Carte KPI --}}
            <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition-shadow duration-200">
                <h3 class="text-sm font-medium text-gray-500 truncate">Utilisateurs Total</h3>
                <p class="mt-1 text-3xl font-semibold text-gray-900" x-text="formatNumber(generalStats.totalUsers)"></p>
            </div>
             {{-- Carte KPI --}}
            <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition-shadow duration-200">
                <h3 class="text-sm font-medium text-gray-500 truncate">Compétitions Total</h3>
                <p class="mt-1 text-3xl font-semibold text-gray-900" x-text="formatNumber(generalStats.totalCompetitions)"></p>
            </div>
             {{-- Carte KPI --}}
            <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition-shadow duration-200">
                <h3 class="text-sm font-medium text-gray-500 truncate">Participants Total</h3>
                <p class="mt-1 text-3xl font-semibold text-gray-900" x-text="formatNumber(generalStats.totalParticipants)"></p>
            </div>
             {{-- Carte KPI --}}
            <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition-shadow duration-200">
                <h3 class="text-sm font-medium text-gray-500 truncate">Compétitions Actives</h3>
                <p class="mt-1 text-3xl font-semibold text-green-600" x-text="generalStats.activeCompetitions"></p>
            </div>
        </div>
    </section>

    {{-- Section 2: Graphiques d'Activité Générale --}}
    <section>
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Activité Récente</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Graphique Création Compétitions --}}
            <div class="bg-white p-5 rounded-lg shadow">
                <h3 class="text-lg font-medium text-gray-700 mb-3">Compétitions Créées (6 derniers mois)</h3>
                <div class="h-64"> {{-- Hauteur fixe pour le conteneur du canvas --}}
                    <canvas x-ref="competitionChartCanvas"></canvas>
                </div>
            </div>
            {{-- Graphique Inscriptions Participants --}}
            <div class="bg-white p-5 rounded-lg shadow">
                <h3 class="text-lg font-medium text-gray-700 mb-3">Nouvelles Inscriptions Participants (6 derniers mois)</h3>
                 <div class="h-64">
                    <canvas x-ref="participantChartCanvas"></canvas>
                 </div>
            </div>
        </div>
    </section>

     {{-- Section 3: Répartition des Utilisateurs --}}
    <section>
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Utilisateurs</h2>
        <div class="bg-white p-5 rounded-lg shadow">
             <h3 class="text-lg font-medium text-gray-700 mb-3">Répartition par Rôle</h3>
             <div class="max-w-xs mx-auto"> {{-- Limiter la taille du camembert --}}
                <canvas x-ref="roleChartCanvas"></canvas>
             </div>
        </div>
    </section>

    {{-- Section 4: Sélection et Statistiques par Compétition (Simulation) --}}
    <section x-data="{ selectedCompetitionId: null }">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Statistiques par Compétition</h2>

        {{-- Sélecteur de Compétition (Simulation) --}}
        <div class="mb-6">
            <label for="competitionSelect" class="block text-sm font-medium text-gray-700 mb-1">Choisir une compétition :</label>
            <select id="competitionSelect"
                    @change="selectedCompetitionId = $event.target.value; loadCompetitionSpecificStats(selectedCompetitionId)"
                    class="block w-full max-w-xs border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">-- Sélectionner --</option>
                <template x-for="competition in competitions" :key="competition.id">
                    <option :value="competition.id" x-text="competition.name"></option>
                </template>
            </select>
        </div>

        {{-- Affichage des stats spécifiques si une compétition est sélectionnée --}}
        <div x-show="selectedCompetitionId" x-transition class="space-y-6">
            <h3 class="text-lg font-medium text-gray-900" x-text="`Détails pour : ${getSelectedCompetitionName()}`"></h3>

            {{-- KPIs Spécifiques --}}
             <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="bg-white p-5 rounded-lg shadow">
                    <h4 class="text-sm font-medium text-gray-500 truncate">Participants Inscrits</h4>
                    <p class="mt-1 text-3xl font-semibold text-gray-900" x-text="formatNumber(selectedCompetitionStats.participants)"></p>
                </div>
                <div class="bg-white p-5 rounded-lg shadow">
                    <h4 class="text-sm font-medium text-gray-500 truncate">Catégories</h4>
                    <p class="mt-1 text-3xl font-semibold text-gray-900" x-text="selectedCompetitionStats.categories"></p>
                </div>
                 <div class="bg-white p-5 rounded-lg shadow">
                    <h4 class="text-sm font-medium text-gray-500 truncate">Combats Générés</h4>
                    <p class="mt-1 text-3xl font-semibold text-gray-900" x-text="selectedCompetitionStats.fightsTotal"></p>
                </div>
                 <div class="bg-white p-5 rounded-lg shadow">
                    <h4 class="text-sm font-medium text-gray-500 truncate">Combats Terminés (%)</h4>
                    <p class="mt-1 text-3xl font-semibold text-blue-600" x-text="`${selectedCompetitionStats.fightsCompletedPercent}%`"></p>
                </div>
            </div>

            {{-- Graphiques Spécifiques --}}
             <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                 {{-- Répartition Catégories --}}
                 <div class="bg-white p-5 rounded-lg shadow lg:col-span-2">
                     <h4 class="text-lg font-medium text-gray-700 mb-3">Participants par Catégorie (Top 5)</h4>
                     <div class="h-72">
                        <canvas x-ref="categoryChartCanvas"></canvas>
                     </div>
                 </div>
                  {{-- Répartition Sexe --}}
                 <div class="bg-white p-5 rounded-lg shadow">
                     <h4 class="text-lg font-medium text-gray-700 mb-3">Répartition par Sexe</h4>
                     <div class="h-72 flex items-center justify-center">
                         <div class="max-w-[200px]">
                            <canvas x-ref="genderChartCanvas"></canvas>
                         </div>
                     </div>
                 </div>
             </div>
        </div>
         <div x-show="!selectedCompetitionId" class="text-gray-500 italic">
            Veuillez sélectionner une compétition pour voir les détails.
        </div>
    </section>

</div>

{{-- Le Script Alpine.js --}}
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('dashboardStats', () => ({
        // --- État ---
        generalStats: { // Données Fictives Générales
            totalUsers: 0,
            totalCompetitions: 0,
            totalParticipants: 0,
            activeCompetitions: 0,
        },
        competitionActivityData: { labels: [], datasets: [{ data: [] }] }, // Pour Chart.js
        participantActivityData: { labels: [], datasets: [{ data: [] }] }, // Pour Chart.js
        userRoleData: { labels: [], datasets: [{ data: [] }] }, // Pour Chart.js
        competitions: [], // Liste des compétitions pour le sélecteur
        selectedCompetitionStats: { // Données Fictives Spécifiques (sera rempli)
            participants: 0,
            categories: 0,
            fightsTotal: 0,
            fightsCompletedPercent: 0,
            categoryData: { labels: [], datasets: [{ data: [] }] },
            genderData: { labels: [], datasets: [{ data: [] }] },
        },
        chartInstances: { // Pour stocker les instances de Chart.js et les détruire
            competitionChart: null,
            participantChart: null,
            roleChart: null,
            categoryChart: null,
            genderChart: null
        },
        isLoading: true, // Pour un éventuel indicateur de chargement

        // --- Initialisation ---
        init() {
            console.log('Initializing dashboard stats...');
            this.loadInitialData();

            // Initialiser les graphiques généraux après que le DOM soit prêt
            this.$nextTick(() => {
                this.initCompetitionChart();
                this.initParticipantChart();
                this.initRoleChart();
            });
        },

        // --- Chargement des Données (Simulation API) ---
        loadInitialData() {
            this.isLoading = true;
            // Simule un appel API pour les données générales
            setTimeout(() => {
                this.generalStats = {
                    totalUsers: 1250,
                    totalCompetitions: 45,
                    totalParticipants: 3870,
                    activeCompetitions: 3,
                };
                this.competitionActivityData = {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                    datasets: [{
                        label: 'Compétitions Créées',
                        data: [5, 8, 6, 10, 7, 9],
                        borderColor: 'rgb(79, 70, 229)', // Indigo
                        backgroundColor: 'rgba(79, 70, 229, 0.1)',
                        fill: true,
                        tension: 0.1
                    }]
                };
                 this.participantActivityData = {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                    datasets: [{
                        label: 'Nouveaux Participants',
                        data: [150, 210, 180, 350, 290, 410],
                        borderColor: 'rgb(5, 150, 105)', // Emerald
                        backgroundColor: 'rgba(5, 150, 105, 0.1)',
                        fill: true,
                        tension: 0.1
                    }]
                };
                 this.userRoleData = {
                    labels: ['Participants', 'Arbitres', 'Admins'],
                    datasets: [{
                        label: 'Répartition Utilisateurs',
                        data: [1100, 100, 50], // ~1250 total
                        backgroundColor: [
                            'rgb(59, 130, 246)', // Blue
                            'rgb(249, 115, 22)', // Orange
                            'rgb(139, 92, 246)'  // Violet
                        ],
                        hoverOffset: 4
                    }]
                };
                 this.competitions = [ // Données fictives pour le sélecteur
                    { id: 1, name: 'Coupe Régionale Kata 2024' },
                    { id: 2, name: 'Open National Kumite 2024' },
                    { id: 3, name: 'Championnat Jeunes Espoirs 2023' }
                ];

                this.isLoading = false;

                // Mettre à jour les graphiques après chargement des données
                 this.$nextTick(() => {
                    this.updateChart(this.chartInstances.competitionChart, this.competitionActivityData);
                    this.updateChart(this.chartInstances.participantChart, this.participantActivityData);
                    this.updateChart(this.chartInstances.roleChart, this.userRoleData);
                });

            }, 500); // Simule une latence réseau
        },

        loadCompetitionSpecificStats(competitionId) {
             if (!competitionId) {
                // Réinitialiser si aucune sélection
                this.selectedCompetitionStats = { participants: 0, categories: 0, fightsTotal: 0, fightsCompletedPercent: 0, categoryData: { labels: [], datasets: [{ data: [] }] }, genderData: { labels: [], datasets: [{ data: [] }] } };
                this.destroyChart(this.chartInstances.categoryChart); this.chartInstances.categoryChart = null;
                this.destroyChart(this.chartInstances.genderChart); this.chartInstances.genderChart = null;
                return;
             }
             console.log(`Loading stats for competition ID: ${competitionId}`);
             this.isLoading = true; // Pourrait avoir un indicateur spécifique
             // Simule un appel API basé sur l'ID
             setTimeout(() => {
                let stats = {};
                // Données fictives différentes pour chaque ID simulé
                if (competitionId == 1) {
                    stats = {
                        participants: 150, categories: 12, fightsTotal: 149, fightsCompletedPercent: 100,
                        categoryData: { labels: ['Cadet H -50kg', 'Junior F Kata', 'Senior H +80kg', 'Minime H Kumite', 'Benjamin F Kata'], datasets: [{ label: 'Participants', data: [25, 22, 18, 15, 12], backgroundColor: 'rgba(34, 197, 94, 0.6)' }] }, // Green
                        genderData: { labels: ['Hommes', 'Femmes'], datasets: [{ data: [90, 60], backgroundColor: ['rgb(59, 130, 246)', 'rgb(236, 72, 153)'] }] } // Blue, Pink
                    };
                } else if (competitionId == 2) {
                     stats = {
                        participants: 280, categories: 20, fightsTotal: 279, fightsCompletedPercent: 100,
                        categoryData: { labels: ['Senior H -75kg', 'Senior F -61kg', 'Senior H Kata', 'Veteran H Kumite', 'Senior F Kata'], datasets: [{ label: 'Participants', data: [45, 38, 35, 30, 28], backgroundColor: 'rgba(59, 130, 246, 0.6)' }] }, // Blue
                        genderData: { labels: ['Hommes', 'Femmes'], datasets: [{ data: [180, 100], backgroundColor: ['rgb(59, 130, 246)', 'rgb(236, 72, 153)'] }] }
                    };
                } else { // ID 3 ou autre
                     stats = {
                        participants: 95, categories: 8, fightsTotal: 94, fightsCompletedPercent: 100,
                        categoryData: { labels: ['Pupille H Kata', 'Benjamin F Kumite', 'Minime H -45kg', 'Pupille F Kata', 'Benjamin H Kata'], datasets: [{ label: 'Participants', data: [18, 16, 15, 12, 10], backgroundColor: 'rgba(249, 115, 22, 0.6)' }] }, // Orange
                        genderData: { labels: ['Hommes', 'Femmes'], datasets: [{ data: [55, 40], backgroundColor: ['rgb(59, 130, 246)', 'rgb(236, 72, 153)'] }] }
                    };
                }
                this.selectedCompetitionStats = stats;
                this.isLoading = false;

                 // Mettre à jour/Initialiser les graphiques spécifiques A APRÈS que le DOM soit prêt
                 this.$nextTick(() => {
                     this.initCategoryChart();
                     this.initGenderChart();
                 });
             }, 300);
        },

        // --- Initialisation/Mise à jour des Graphiques ---
        initCompetitionChart() {
            this.destroyChart(this.chartInstances.competitionChart); // Détruire l'ancien si existe
            if (this.$refs.competitionChartCanvas) {
                this.chartInstances.competitionChart = new Chart(this.$refs.competitionChartCanvas.getContext('2d'), {
                    type: 'line',
                    data: this.competitionActivityData,
                    options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true } } }
                });
            }
        },
        initParticipantChart() {
            this.destroyChart(this.chartInstances.participantChart);
             if (this.$refs.participantChartCanvas) {
                 this.chartInstances.participantChart = new Chart(this.$refs.participantChartCanvas.getContext('2d'), {
                    type: 'line',
                    data: this.participantActivityData,
                     options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true } } }
                });
             }
        },
         initRoleChart() {
             this.destroyChart(this.chartInstances.roleChart);
             if (this.$refs.roleChartCanvas) {
                 this.chartInstances.roleChart = new Chart(this.$refs.roleChartCanvas.getContext('2d'), {
                    type: 'pie',
                    data: this.userRoleData,
                     options: { responsive: true, maintainAspectRatio: true } // Maintient ratio pour camembert
                });
             }
        },
        initCategoryChart() {
            this.destroyChart(this.chartInstances.categoryChart);
             if (this.$refs.categoryChartCanvas && this.selectedCompetitionStats.categoryData.labels.length > 0) {
                 this.chartInstances.categoryChart = new Chart(this.$refs.categoryChartCanvas.getContext('2d'), {
                    type: 'bar',
                    data: this.selectedCompetitionStats.categoryData,
                    options: { responsive: true, maintainAspectRatio: false, indexAxis: 'y', scales: { x: { beginAtZero: true } }, plugins: { legend: { display: false } } } // Barres horizontales
                });
            }
        },
        initGenderChart() {
            this.destroyChart(this.chartInstances.genderChart);
             if (this.$refs.genderChartCanvas && this.selectedCompetitionStats.genderData.labels.length > 0) {
                 this.chartInstances.genderChart = new Chart(this.$refs.genderChartCanvas.getContext('2d'), {
                    type: 'doughnut', // Ou 'pie'
                    data: this.selectedCompetitionStats.genderData,
                     options: { responsive: true, maintainAspectRatio: true }
                });
             }
        },

        // --- Helpers ---
        updateChart(chartInstance, newData) {
            if (chartInstance) {
                chartInstance.data = newData;
                chartInstance.update();
            }
        },
        destroyChart(chartInstance) {
             if (chartInstance) {
                chartInstance.destroy();
            }
        },
        formatNumber(num) {
            // Simple formatteur, pourrait être plus complexe (ex: Intl.NumberFormat)
            return num >= 1000 ? (num / 1000).toFixed(1) + 'k' : num;
        },
        getSelectedCompetitionName() {
            const competition = this.competitions.find(c => c.id == this.selectedCompetitionId);
            return competition ? competition.name : 'Inconnue';
        }

    }))
})
</script>