<?php

function level($a)
{
    if (is_numeric($a)) {
        switch ($a) {
            case 1:
                return ('location: xbcga.php');
                break;
            case 2:
                return ('location: opntb.php');
                break;
            case 3:
                return ('location: nvgtc.php');
                break;
            case 4:
                return ('location: mctbd.php');
                break;
            case 5:
                return ('location: last.php');
                break;
                
                
        }
    }
}