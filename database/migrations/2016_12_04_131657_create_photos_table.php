<?php

	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class CreatePhotosTable extends Migration {
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('photos', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('project_id')->unsigned()->nullable();
				$table->integer('award_id')->unsigned()->nullable();
				$table->string('image');
				$table->foreign('project_id')->references('id')->on('projects')->onDelete('CASCADE')->onUpdate('CASCADE');
				$table->foreign('award_id')->references('id')->on('awards')->onDelete('CASCADE')->onUpdate('CASCADE');
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
			Schema::dropIfExists('photos');
		}
	}
