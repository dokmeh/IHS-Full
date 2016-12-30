<?php

	use App\Project;
	use App\Photo;
	use App\Award;

	return [
		'entities' => [
			'projects' => Project::class,
			'photos'   => Photo::class,
			'awards'   => Award::class,
			//			'projects' => ['entity' => '\App\Project', 'relation' => 'photos'],
		],
	];
