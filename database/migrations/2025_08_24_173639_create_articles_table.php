<?php

use App\Enums\State;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('status', array_column(State::cases(), 'value'))->default(State::draft->value);
            $table->string('title');
            $table->string('description', 510);
            $table->string('imageSrc')->default('/resources/images/fallback.png');
            $table->date('date')->default(Carbon::now());
            $table->text('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
