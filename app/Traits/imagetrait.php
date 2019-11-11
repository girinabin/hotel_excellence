<?php
namespace App\Traits;

trait imagetrait
{
	public function addimage($image)
	{
		if(isset($image))
		{
			$file = $image;
			$fileName = time().$file->getClientOriginalName();
			$destination_path = public_path('uploads/room');
			$file->move($destination_path,$fileName);
			return $fileName; 
		}
	}
}
?>