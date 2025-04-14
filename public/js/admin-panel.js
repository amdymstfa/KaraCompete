function adminPanel() {
    return {
      activeTab: 'users',
      mobileMenuOpen: false,
      stats: {
        totalUsers: 1254,
        activeUsers: 876,
        totalCompetitions: 54
      },
      users: [
        { id: 1, name: 'John Doe', email: 'john@example.com', role: 'Admin', status: 'Active' },
        { id: 2, name: 'Jane Smith', email: 'jane@example.com', role: 'User', status: 'Active' },
        { id: 3, name: 'Robert Johnson', email: 'robert@example.com', role: 'User', status: 'Inactive' }
      ],
      arbitors: [
        { id: 1, name: 'Alice Brown', email: 'alice@example.com', specialty: 'Boxing', status: 'Active' },
        { id: 2, name: 'Michael Wilson', email: 'michael@example.com', specialty: 'Karate', status: 'Active' },
        { id: 3, name: 'Sarah Davis', email: 'sarah@example.com', specialty: 'Taekwondo', status: 'Inactive' }
      ],
      jurys: [
        { id: 1, name: 'Thomas Clark', email: 'thomas@example.com', role: 'Head Judge', status: 'Active' },
        { id: 2, name: 'Emily White', email: 'emily@example.com', role: 'Judge', status: 'Active' },
        { id: 3, name: 'David Miller', email: 'david@example.com', role: 'Technical Expert', status: 'Inactive' }
      ],
      competitions: [
        { id: 1, name: 'Summer Championships', date: '2025-05-15', status: 'Upcoming', participants: '120' },
        { id: 2, name: 'Regional Tournament', date: '2025-06-30', status: 'Registration', participants: '45' },
        { id: 3, name: 'National Finals', date: '2025-08-10', status: 'Planning', participants: '0' }
      ],
      
      // Méthode pour changer d'onglet
      setActiveTab(tab) {
        this.activeTab = tab;
        // Fermer le menu mobile quand on change d'onglet
        this.mobileMenuOpen = false;
      }
    }
  }