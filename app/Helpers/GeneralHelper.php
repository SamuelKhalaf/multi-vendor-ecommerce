<?php

use Illuminate\Support\Facades\Route;

    define('PAGINATE_COUNT',5);

    function getFileName(): string
    {
        if (app() ->getLocale() === 'ar'){
            return 'css-rtl';
        }else{
            return 'css';
        }
    }

    function setActive($routeName, $paramName = null, $paramValue = null)
    {
        $isActive = request()->routeIs($routeName);

        if ($paramName && $paramValue) {
            return $isActive && request()->route($paramName) == $paramValue ? 'active' : '';
        }

        return $isActive ? 'active' : '';
    }

    function uploadImage($disk,$image)
    {
        $image->store('/',$disk);
        return $image->hashname();
    }
