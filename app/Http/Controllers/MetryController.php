<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Facades\Metry;
use App\Models\Test;


class MetryController extends BaseController
{
	public function probe()
	{
        echo '<p>Start probe apple</p>';
        Metry::start('apple');
        usleep(2000);
        $model = new Test;
        $model->test();
        Metry::stop('apple');
        echo '<p>End Probe apple</p>';
	}
}
