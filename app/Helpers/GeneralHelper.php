<?php
    function getFileName(): string
    {
        if (app() ->getLocale() === 'ar'){
            return 'css-rtl';
        }else{
            return 'css';
        }
    }
