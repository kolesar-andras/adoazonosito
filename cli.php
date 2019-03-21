#!/usr/bin/env php
<?php

namespace KolesárAndrás\Adóazonosító;

require_once('vendor/autoload.php');

echo Adóazonosító::helyes($argv[1]) ? 'helyes' : 'téves', PHP_EOL;
echo Adóazonosító::születésnap($argv[1])->format('Y.m.d'), PHP_EOL;
