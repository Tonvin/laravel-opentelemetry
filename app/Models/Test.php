<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Facades\Metry;

class Test extends Model
{
    function test() {

        echo '<p>Start Probe cherry</p>';
        Metry::start('cherry');
        usleep(1000);
        Metry::stop('cherry');
        echo '<p>End Probe cherry</p>';

        echo '<p>start Probe pear</p>';
        Metry::start('pear');
        usleep(1000);
        Metry::stop('pear');
        echo '<p>End Probe pear</p>';
    }
}
