<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * A migration original criou profile.description (obrigatória), mas o model
     * Profile e o UserController usam "address". Em vez de editar a migration
     * antiga (já aplicada/compartilhada), esta renomeia a coluna e a torna opcional.
     */
    public function up(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->renameColumn('description', 'address');
        });

        Schema::table('profile', function (Blueprint $table) {
            $table->string('address')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * Só devolve o nome antigo; a coluna continua nullable para não falhar
     * caso já existam perfis sem endereço.
     */
    public function down(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->renameColumn('address', 'description');
        });
    }
};
