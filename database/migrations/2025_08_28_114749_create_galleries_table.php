<?php

use App\Enums\PageType;
use App\Enums\State;
use App\Enums\TournamentType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('type', array_column(PageType::cases(), 'value'));
            $table->enum('state', array_column(State::cases(), 'value'));
            $table->string('title');
            $table->string('description', 510);
            $table->string('imageSrc')->nullable();
            $table->date('date');
            $table->enum('galleryType', array_values(TournamentType::getAllGalleryTypes()));
            $table->text('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
