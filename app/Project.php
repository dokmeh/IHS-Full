<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Rutorika\Sortable\SortableTrait;

	class Project extends Model {
		use SortableTrait;
		protected $sortableField = 'sort';

		protected $fillable = [
			'title',
			'description',
			'address',
			'client',
			'design_at',
			'completed_at',
			'site_area',
			'floor_area',
			'sort',
			'category_id',
			'status_id',

		];

		public function category()
		{
			return $this->belongsTo(Category::class);
		}

		public function status()
		{
			return $this->belongsTo(Status::class);
		}

		public function photos()
		{
			return $this->hasMany(Photo::class);
		}

		public function thumbnail()
		{
			return $this->hasOne(Thumbnail::class);
		}

		public function awards()
		{
			return $this->hasMany(Award::class);
		}

	}
