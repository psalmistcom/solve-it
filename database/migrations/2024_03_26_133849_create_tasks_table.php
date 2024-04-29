<?php

use App\Enum\Priority;
use App\Enum\Status;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->longText('image_path')->nullable();
            $table->enum('status', [
                Status::COMPLETED->value,
                Status::IN_PROGRESS->value,
                Status::PENDING->value,
            ])->default(Status::PENDING->value);
            $table->enum('priority', [
                Priority::LOW->value,
                Priority::MEDIUM->value,
                Priority::HIGH->value,
            ])->default(Priority::LOW->value);
            $table->string('due_date')->nullable();
            $table->foreignId('assigned_user_id')->constrained('users');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->foreignId('project_id')->constrained('projects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
