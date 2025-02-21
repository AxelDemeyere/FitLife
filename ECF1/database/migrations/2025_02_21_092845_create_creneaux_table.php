<?php

use App\Models\Cours;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('creneaux', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_heure');
            $table->foreignIdFor(Cours::class, 'id_cours')->constrained('cours');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('creneaux');
    }
};
