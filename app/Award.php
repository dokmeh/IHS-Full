<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Award extends Model {
		protected $fillable = [
			'name',
			'description',
			'date',
			'project_id',
		];

		public function project()
		{
			return $this->belongsTo(Project::class);
		}

		public function photo()
		{
			return $this->hasOne(Photo::class,'award_id','id');
		}
	}
