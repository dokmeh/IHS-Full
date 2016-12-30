<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class About extends Model {
		protected $fillable = [
			'header',
			'header_fa',
			'description',
			'description_fa',
		];

		public function photos()
		{
			return $this->morphMany(Photo::class, 'photoable');
		}

	}
