<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Rutorika\Sortable\SortableTrait;

	class Project extends Model {
		use SortableTrait;
		//		use MorphToSortedManyTrait;

		protected static $sortableField = 'sort';

		protected $fillable = [
			'title',
			'title_fa',
			'location',
			'location_fa',
			'client',
			'client_fa',
			'description',
			'description_fa',
			'design_at',
			'visible',
			'completed_at',
			'site_area',
			'floor_area',
			'sort',
			'category_id',
			'status_id',
		];

		public function photos()
		{
			return $this->morphMany(Photo::class, 'photoable');
		}

		public function thumbnail()
		{
			return $this->morphOne(Thumbnail::class, 'thumbnailable');
		}

		public function category()
		{
			return $this->belongsTo(Category::class);
		}

		public function status()
		{
			return $this->belongsTo(Status::class);
		}

		public function awards()
		{
			return $this->hasMany(Award::class);
		}

		public function publications()
		{
			return $this->hasMany(Publication::class);
		}

	}
