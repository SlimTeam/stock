<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| CUSTOM CONSTANTS
|--------------------------------------------------------------------------
|
| These are constants defined specially for this application.
|
*/

/*
|--------------------------------------------------------------------------
| Access levels
|--------------------------------------------------------------------------
*/
define('ACCESS_LVL_GUEST', 1);
define('ACCESS_LVL_OBSERVATION', 2);
define('ACCESS_LVL_FORMATION', 4);
define('ACCESS_LVL_MSP', 8);
define('ACCESS_LVL_ADMIN', 16);

/*
|--------------------------------------------------------------------------
| Inventory number
|--------------------------------------------------------------------------
*/
define('INVENTORY_PREFIX', 'ORP');		 // first part of inventory number (Orif site prefix)
define('INVENTORY_NUMBER_CHARS', 4); // number of chars in the ID part (to add leading zeros)

/*
|--------------------------------------------------------------------------
| ID of the "functional" item condition
|--------------------------------------------------------------------------
*/
define('FUNCTIONAL_ITEM_CONDITION_ID', 10);

/*
 |-------------------------------------------------------------------------
 | Number of items show by page
 |-------------------------------------------------------------------------
 */
define('ITEMS_PER_PAGE',25);
