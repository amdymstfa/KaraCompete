<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // 1. Ajouter la nouvelle colonne pour l'ID du club
            // Assurez-vous que la table 'clubs' existe déjà quand cette migration s'exécute !
            $table->foreignId('club_id')
                ->nullable()
                ->after('status') // Ou après une autre colonne pertinente
                ->constrained('clubs') // Lie à la table 'clubs'
                ->nullOnDelete(); // Met NULL si le club est supprimé

            // 2. Supprimer l'ancienne colonne 'club' (texte) - ATTENTION si données existantes
            // Il est souvent préférable de faire la suppression dans une migration séparée
            // après s'être assuré que les données ont été migrées vers club_id si nécessaire.
            // Pour l'instant, on peut juste ajouter club_id et gérer la suppression plus tard.
            // $table->dropColumn('club');
        });
    }

    public function down(): void // Pour annuler les changements
    {
        Schema::table('users', function (Blueprint $table) {
            // Important: Supprimer la contrainte avant la colonne
            $table->dropForeign(['club_id']);
            $table->dropColumn('club_id');

            // Si vous aviez supprimé la colonne 'club', il faudrait la recréer ici
            // $table->string('club')->nullable()->after('status');
        });
    }
};