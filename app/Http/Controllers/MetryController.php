<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Facades\Metry;
use App\Models\Test;


class FruitController extends BaseController
{
	public function index()
	{
        echo '<p>Start probe apple</p>';
        Metry::start('apple');
        Metry::addEvent('apple', 'Boot');
        usleep(2000);
        $model = new Test;
        $model->test();
        Metry::addEvent('apple', 'Finish');
        Metry::stop('apple');
        echo '<p>End Probe apple</p>';
	}
}
