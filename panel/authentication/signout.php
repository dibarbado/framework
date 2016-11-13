<?php

unset($_SESSION[__MODULE__]);
header('location: '.Utils::link('home'));
