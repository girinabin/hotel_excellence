<!-- php artisan -->
php artisan make:controller Project/PageController


<!-- Page Controller -->
function index($page = ''){

	return $this->staticView($page);

}

function staticView($page){

	$finalData = [];

	switch ($page) {

		case '':
		case 'home':
		$finalData = json_decode(file_get_contents(url('public/mockup/home.json')),true);
		break;

		default:
		return view('pages.construct');
		break;

	}

	return view('home.home',$finalData);

}



@extends('home-master')

<!-- page title -->
@section('page-title')	
	
@endsection


<!-- website content -->
@section('content')
	
@endsection