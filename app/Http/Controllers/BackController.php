?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BackController extends Controller
{
    public function back()
    {
    	return Redirect::back();
    }
}
