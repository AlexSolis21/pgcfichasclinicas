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
        Schema::create('expedients', function (Blueprint $table) {
            $table->id();
            $table->string('control')->nullable();
            $table->string('enfermedad_actual')->nullable();
            $table->string('presion_arterial')->nullable();
            $table->string('frecuencia_cardiaca')->nullable();
            $table->string('frecuencia_respiratoria')->nullable();
            $table->string('saturacion')->nullable();
            $table->string('temperatura')->nullable();
            $table->string('peso')->nullable();
            $table->string('estatura')->nullable();
            $table->string('piel')->nullable();
            $table->string('cabeza')->nullable();
            $table->string('ojos')->nullable();
            $table->string('nariz')->nullable();
            $table->string('boca')->nullable();
            $table->string('cuello')->nullable();
            $table->string('torax')->nullable();
            $table->string('pulmones')->nullable();
            $table->string('corazon')->nullable();
            $table->string('abdomen')->nullable();
            $table->string('genitourinario')->nullable();
            $table->string('miembros')->nullable();
            $table->string('neurologico')->nullable();
            $table->string('alergias')->nullable();
            $table->string('traumatismos')->nullable();
            $table->string('cirugias')->nullable();
            $table->string('comorbilidad')->nullable();
            $table->string('hospitalizacion')->nullable();
            $table->string('transfusiones')->nullable();
            $table->string('farmacos')->nullable();
            $table->string('ginecologico_obstetrico')->nullable();
            $table->string('grupo_sanguineo')->nullable();
            $table->string('tabaquismo')->nullable();
            $table->string('alcoholismo')->nullable();
            $table->string('drogas')->nullable();
            $table->string('alimentacion')->nullable();
            $table->string('ejercicio')->nullable();
            $table->string('inmunizaciones')->nullable();
            $table->string('habitos')->nullable();
            $table->string('padres')->nullable();
            $table->string('hermanos')->nullable();
            $table->string('otros_familiares')->nullable();
            $table->string('diagnostico')->nullable();
            $table->string('descripcion_diagnostico')->nullable();
            $table->string('tratamiento')->nullable();
            $table->string('evolucion')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('prueba_laboratorio')->nullable();
            $table->string('foto')->nullable();
            $table->date('fecha_consulta');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');
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
        Schema::dropIfExists('expedients');
    }
};
