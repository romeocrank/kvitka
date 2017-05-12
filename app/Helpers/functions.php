<?php 

function getDataSize($cont)
{
	switch (true) {
        case ( (-1<$cont)&&($cont<=4) ):
            $datasize = [2,3,1,1];
            break;
        case ( (4<$cont)&&($cont<=5) ):
            $datasize = [2, 3, 1, 1, 4];
            break;
        case ( (5<$cont)&&($cont<=6) ):
            $datasize = [ 2,1,1,3,1,2];
            break;
        case ( (6<$cont)&&($cont<=9) ):
            $datasize = [ 1,1,2,2,1,1,1,1,1];
            break;
        case ( (9<$cont)&&($cont<=10) ):
            $datasize = [ 2,3,1,1,2,1,1,3,1,2];
            break;
        case ( (10<$cont)&&($cont<=13) ):
            $datasize = [ 1,1,2,2,1,1,1,1,1,2,3,1,1];
            break;
        case ( (13<$cont)&&($cont<=14) ):
            $datasize = [ 2,3,1,1,2,1,1,3,1,2,2,3,1,1];
            break;
        case ( (14<$cont)&&($cont<=15) ):
            $datasize = [ 1,1,2,2,1,1,1,1,1,2,1,1,3,1,2];
            break;
        case ( (15<$cont)&&($cont<=18) ):
            $datasize = [ 1,1,2,2,1,1,1,1,1,1,1,2,2,1,1,1,1,1];
            break;
        default:
             $datasize = [0, 2,3,1,1];
            break;
    }

    return $datasize; 
}