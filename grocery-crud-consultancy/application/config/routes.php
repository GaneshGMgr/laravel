<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

|	https://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There are three reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router which controller/method to use if those

| provided in the URL cannot be matched to a valid route.

|

|	$route['translate_uri_dashes'] = FALSE;

|

| This is not exactly a route, but allows you to automatically route

| controller and method names that contain dashes. '-' isn't a valid

| class or method name character, so it requires translation.

| When you set this option to TRUE, it will replace ALL dashes in the

| controller and method URI segments.

|

| Examples:	my-controller/index	-> my_controller/index

|		my-controller/my-method	-> my_controller/my_method

*/

$route['default_controller'] = 'Login';
$route['about'] = 'Home/about';
$route['team'] = 'Home/team';

$route['emicalculator'] = 'Home/emiCalculator';
$route['emiprocess'] = 'Home/emiProcess';

$route['fdcalculator'] = 'Home/fdCalculator';
$route['fdprocess'] = 'Home/fdprocess';

$route['savingtype'] = 'Home/savingType';

$route['service'] = 'Home/service';

$route['news'] = 'Home/news';

$route['branches'] = 'Home/branches';

$route['uttam/(:any)'] = 'Home/serviceSingle/$1';
$route['news_finance/(:any)'] = 'Home/newsSingle/$1';
$route['gallery'] = 'Home/Gallery';


$route['publication/(:any)'] = 'Home/publication/$1';
$route['publication-desc/(:any)'] = 'Home/publicationDesc/$1';
$route['news'] = 'Home/news';
$route['news-desc/(:any)'] = 'Home/newsDesc/$1';
$route['notice'] = 'Home/notice';
$route['notice-desc/(:any)'] = 'Home/noticeDesc/$1';
$route['gallery/(:any)/(:any)'] = 'Home/gallery/$1/$1';


$route['about-us'] = 'Home/about';


$route['preparation/(:any)'] = 'Home/preparation/$1';
$route['study/(:any)'] = 'Home/abroadStudy/$1';
$route['service/(:any)'] = 'Home/service/$1';
$route['contact'] = 'Home/contact';



$route['training/(:any)'] = 'Home/training/$1';
$route['news/(:any)/(:any)'] = 'Home/news/$1/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

