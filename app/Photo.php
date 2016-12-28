<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Photo extends Model {
		protected $fillable = [
			'image',
		    'project_id',
		    'award_id'
		];

		public function project()
		{
			return $this->belongsTo(Project::class);
		}

		public function award()
		{
			return $this->belongsTo(Award::class,'project_id');
		}
	}
