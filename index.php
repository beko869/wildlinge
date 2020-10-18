<?php

require_once 'code/code_wildlings.php';
require_once 'page_config.php';

//get action from POST
if( isset( $_POST[ 'action' ] ) )
{
    $action = $_POST[ 'action' ];
}
else
{
    $action = '';
}

//get page from GET or POST
if( isset( $_GET[ 'page' ] ) ) 
{
    $page = $_GET[ 'page' ];
}
elseif( isset( $_POST[ 'page' ] ) )
{
    $page = $_POST[ 'page' ];
}
else
{
    $page = 'home';
}

include $_PAGE_CONFIG_ARRAY[ $page ];




