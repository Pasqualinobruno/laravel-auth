<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //il nome della colonna da aggiungere alla tabella principale dove faccioamo la relazione "Aggiungi sempre null pk ci saranno sicuramente degli elementi gia creati nel database"
            $table->unsignedBigInteger('type_id')->nullable()->after('id');

            //nome nuova colonna 
            $table->foreign('type_id')
                //riferito al campo
                ->references('id')
                //di quale tabella
                ->on('types')
                //da null in caso di cancelazzione del campo
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //droppiamo prima il foreing key la chiave esterna
            $table->dropForeign('projects_type_id_foreign');

            //droppiamo la colonna
            $table->dropColumn('type_id');
        });
    }
};
