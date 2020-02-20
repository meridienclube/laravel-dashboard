<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title')->default('New Dashboard');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::create('dashboard_widget', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dashboard_id');
            $table->unsignedBigInteger('widget_id');
            $table->json('options')->nullable();
            $table->integer('order')->default(1);
            $table->timestamps();

            $table->foreign('dashboard_id')
                ->references('id')
                ->on('dashboards')
                ->onDelete('cascade');

            $table->foreign('widget_id')
                ->references('id')
                ->on('widgets')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashboard_widget');
        Schema::dropIfExists('dashboards');
    }
}
