// resources/js/admin-panel.js

// Exporte la fonction pour qu'elle puisse être importée ailleurs
export function adminPanel() {
    return {
        activeTab: 'users',
        mobileMenuOpen: false,
        loadingUsers: false,
        fetchError: null,
        stats: { /* ... */ },
        users: [],
        arbitors: [ /* ... */ ],
        jurys: [ /* ... */ ],
        competitions: [ /* ... */ ],
        fighter1: { /* ... */ },
        fighter2: { /* ... */ },
        matches: [ /* ... */ ],

         // --- State et méthodes pour le Modal (à ajouter plus tard) ---
         isEditModalOpen: false,
         editingUser: {},
         isSubmittingEdit: false,
         editFormError: null,

        // --- Méthodes ---
        init() {
            this.fetchUsers();
            const urlParams = new URLSearchParams(window.location.search);
            const tabFromUrl = urlParams.get('tab');
            this.activeTab = tabFromUrl || 'users';
        },

        fetchUsers() {
            this.loadingUsers = true;
            this.fetchError = null;
            fetch('/api/users')
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                    return response.json();
                })
                .then(data => {
                    this.users = data.data || data;
                    console.log('Users loaded:', this.users.length);
                })
                .catch(error => {
                    console.error("Error fetching users:", error);
                    this.fetchError = error.message || 'Could not load users.';
                    this.users = [];
                })
                .finally(() => {
                    this.loadingUsers = false;
                });
        },

        setActiveTab(tab) {
            this.activeTab = tab;
            this.mobileMenuOpen = false;
            const url = new URL(window.location);
            url.searchParams.set('tab', tab);
            window.history.pushState({}, '', url);
        },

        // --- Actions ---
        viewUser(userId) {
            console.log("View user clicked:", userId);
            alert("Viewing user ID: " + userId);
        },

        // --- Actions pour le Modal (à implémenter) ---
         openEditModal(user) {
             if (!user) return;
             this.editingUser = JSON.parse(JSON.stringify(user));
             this.editingUser.role = this.editingUser.role || '';
             this.editingUser.status = this.editingUser.status || '';
             this.isEditModalOpen = true;
             this.editFormError = null;
             console.log('Opening edit modal for user:', this.editingUser.id);
         },

         closeEditModal() {
             this.isEditModalOpen = false;
         },

         submitEditForm() {
            console.log('Attempting to submit edit form for user:', this.editingUser?.id);
            if (!this.editingUser || !this.editingUser.id) {
                 this.editFormError = 'No user selected for editing.';
                 return;
            }

            this.isSubmittingEdit = true; // Démarre l'état de soumission
            this.editFormError = null;    // Reset l'erreur
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            // *** VÉRIFIE ET ADAPTE L'URL API ET LA MÉTHODE (PUT/PATCH) ***
            fetch(`/api/users/${this.editingUser.id}`, {
                method: 'PUT', // Ou 'PATCH'
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                // Envoie les données modifiées. Adapte si ton API attend une structure différente.
                body: JSON.stringify({
                    role: this.editingUser.role,
                    status: this.editingUser.status
                    // Ajoute d'autres champs ici si tu les as rendus modifiables dans le modal
                })
            })
            .then(response => {
                if (!response.ok) {
                    // Tente de lire l'erreur du backend
                    return response.json().then(err => {
                        throw new Error(err.message || `Server error: ${response.status}`);
                    }).catch(() => { // Si le corps de l'erreur n'est pas JSON
                        throw new Error(`HTTP error ${response.status}`);
                    });
                }
                return response.json(); // Attend la réponse JSON du user mis à jour
            })
            .then(updatedUserData => {
                // Met à jour l'utilisateur dans le tableau local
                const updatedUser = updatedUserData.data || updatedUserData; // Adapte selon ta réponse API
                const index = this.users.findIndex(u => u.id === updatedUser.id);
                if (index !== -1) {
                     this.users.splice(index, 1, updatedUser);
                    console.log('User updated successfully in local list');
                } else {
                     console.warn('Updated user not found in list after save.');
                     // Optionnel: rafraîchir toute la liste : this.fetchUsers();
                }
                this.closeEditModal(); // Ferme le modal en cas de succès
            })
            .catch(error => {
                console.error("Error updating user:", error);
                this.editFormError = error.message; // Affiche l'erreur dans le modal
            })
            .finally(() => {
                this.isSubmittingEdit = false; // Fin de l'état de soumission
            });
        },
         // Fin Actions Modal ---
 // --- NOUVEAU : Actions pour le Modal de Progression ---
 openProgressModal(user) {
    if (!user) return;
    console.log('Opening progress modal for user:', user.id);
    // Copie l'utilisateur pour afficher les infos de base immédiatement
    this.progressUser = JSON.parse(JSON.stringify(user));
    this.isProgressModalOpen = true;
    this.progressData = null; // Reset les anciennes données
    this.progressError = null;  // Reset l'erreur
    this.fetchUserProgress(user.id); // Lance le fetch des détails
},

closeProgressModal() {
    this.isProgressModalOpen = false;
    this.progressUser = null;
    this.progressData = null;
    this.loadingProgress = false;
    this.progressError = null;
},

fetchUserProgress(userId) {
    if (!userId) return;
    this.loadingProgress = true;
    this.progressError = null;
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    // *** DÉFINIR CETTE ROUTE API DANS LARAVEL ***
    fetch(`/api/users/${userId}/progress`, {
         method: 'GET', // C'est une récupération de données
         headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken // Peut être nécessaire selon config session/api
        }
    })
    .then(response => {
        if (!response.ok) {
             return response.json().then(err => {
                throw new Error(err.message || `Server error: ${response.status}`);
            }).catch(() => {
                throw new Error(`HTTP error ${response.status}`);
            });
        }
        return response.json();
    })
    .then(data => {
        console.log('User progress data received:', data);
        // Stocke les données reçues. Adapte la structure si nécessaire.
        // Exemple de structure attendue par le HTML ci-dessus:
        // data = { competitions_count: 5, matches_won: 10, rank: 'Gold', activities: [{id: 1, description: '...', date: '...', type: '...'}, ...] }
        this.progressData = data.data || data; // Adapte selon ta réponse API
    })
    .catch(error => {
        console.error("Error fetching user progress:", error);
        this.progressError = error.message || 'Could not load progress details.';
        this.progressData = null; // Assure qu'aucune donnée partielle n'est affichée
    })
    .finally(() => {
        this.loadingProgress = false;
    });
},
// --- Fin Actions Modal Progression ---

        confirmDeleteUser(userId) {
            console.log("Delete user clicked:", userId);
            if (confirm("Are you sure you want to delete this user?")) {
                this.deleteUserAction(userId);
            }
        },

        // Dans resources/js/admin-panel.js, à l'intérieur de l'objet retourné par adminPanel()

deleteUserAction(userId) {
    console.log("Attempting to delete user:", userId);
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    // Démarre potentiellement un état de chargement si tu veux désactiver des boutons
    // this.isDeletingUser = userId; // Exemple: pour montrer un spinner sur la ligne?

    // *** VÉRIFIE ET ADAPTE L'URL API ***
    fetch(`/api/users/${userId}`, {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken
            // Ajoute d'autres headers si nécessaire (ex: Authorization Bearer Token)
        }
    })
    .then(response => {
        if (!response.ok) {
            // Essayer de lire un message d'erreur si le backend en envoie un
            return response.json().then(err => {
                throw new Error(err.message || `Server error: ${response.status}`);
            }).catch(() => {
                 // Si pas de JSON dans l'erreur, ou statut 204 sans contenu qui génère une erreur JSON.parse
                if(response.status === 204) { // 204 No Content est un succès pour DELETE
                   return null; // Continue comme un succès
                }
                throw new Error(`HTTP error ${response.status}`);
            });
        }
        // Si la réponse est OK (200) ou No Content (204)
        return response.status === 204 ? null : response.json();
    })
    .then(() => { // Pas besoin des données de réponse ici généralement
        // Supprime l'utilisateur du tableau local pour mettre à jour l'UI
        const initialLength = this.users.length;
        this.users = this.users.filter(u => u.id !== userId);
        if (this.users.length < initialLength) {
           console.log('User', userId, 'deleted successfully from local list');
           // Optionnel: Afficher une notification de succès (ex: avec une librairie de Toasts)
           // this.showNotification('User deleted successfully.');
        } else {
            console.warn('User', userId, 'not found in local list after successful delete call.');
        }
    })
    .catch(error => {
        console.error("Error deleting user:", error);
        // Afficher une erreur à l'utilisateur
        alert(`Error deleting user: ${error.message}`);
        // Optionnel: this.showNotification(`Error: ${error.message}`, 'error');
    })
    .finally(() => {
        // Arrête l'état de chargement si tu en as un
        // this.isDeletingUser = null;
    });
},
    }

    
}

// PAS besoin de document.addEventListener('alpine:init', ...) ici