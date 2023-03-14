<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->string('d_codigo', 10);
            $table->string('d_asenta', 150);
            $table->string('d_tipo_asenta', 100);
            $table->string('D_mnpio', 150);
            $table->string('d_estado', 150);
            $table->string('d_ciudad', 150);
            $table->string('d_CP', 10);
            $table->string('c_estado', 10);
            $table->string('c_oficina', 10);
            $table->string('c_CP', 10)->nullable();
            $table->string('c_tipo_asenta', 10);
            $table->string('c_mnpio', 10);
            $table->string('id_asenta_cpcons', 10);
            $table->string('d_zona', 100);
            $table->string('c_cve_ciudad', 10);

            $table->index('d_codigo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_codes');
    }
};
