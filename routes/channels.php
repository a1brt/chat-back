<?php

use Illuminate\Support\Facades\Broadcast;


Broadcast::channel('my-channel', function () {

    return true;
});
