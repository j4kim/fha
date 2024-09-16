<?php

namespace App\Models;

interface Breadcrumbable
{
    public function getTitle();
    public function getHref();
}
