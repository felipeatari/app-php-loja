<?php

use App\Components\Api;

Api::get('/api', function(){
  return 'Welcome to API!';
});