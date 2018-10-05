<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/oops', 'HomeController@oops')->name('oops');

Route::get('agent/dashboard', 'ClientPortalController@index')->middleware('isAgent')->name('agent');
Route::get('/admin', 'AdminController@admin')->middleware('isAdmin')->name('admin');


/* ROUTES ADMIN */
Route::get('admin/dashboard/paused_projects', 'AdminController@pausedProjects')->name('admin/paused_projects');
Route::get('admin/dashboard/completed_projects', 'AdminController@completeProjects')->name('admin/completed_projects');
Route::get('admin/dashboard/upcoming_projects', 'AdminController@upcomingProjects')->name('admin/upcoming_projects');
Route::get('admin/dashboard/open_projects', 'AdminController@openProjects')->name('admin/open_projects');
Route::get('admin/projectDetails/{id}', 'AdminController@projectDetails')->name('admin/projectDetails');

/* ROUTES ROLES */
Route::get('admin/register/agent', 'RolesController@registerRole')->name('admin/registerRole');
Route::post('admin/agent/register', 'RolesController@registerAgent')->name('registerAgent');

/* RESOURCES for routing */
Route::resource('project', 'ProjectController');
Route::resource('client', 'ClientController');
Route::resource('employee', 'EmployeeController');
Route::resource('team', 'TeamController');
Route::resource('task', 'TaskController');
Route::resource('projectuser', 'ProjectUserController');
Route::resource('taskuser', 'TaskUserController');
Route::resource('teammember', 'TeamMemberController');
Route::resource('designation', 'DesignationController');
Route::resource('recruiter', 'RecruiterController');
Route::resource('agent', 'AgentController');
Route::resource('milestone', 'MilestoneController');
Route::resource('clientportal', 'ClientPortalController');
Route::resource('businesstype', 'BusinessTypeController');
Route::resource('status', 'StatusController');
Route::resource('area', 'AreaController');

/* ROUTES PROJECTS */
Route::get('admin/project/view' , 'ProjectController@views')->name('project/view');
Route::get('admin/project/resume/{id}' , 'ProjectController@resume')->name('project/resume');
Route::get('admin/project/pause/{id}' , 'ProjectController@pause')->name('project/pause');
Route::get('admin/project/complete/{id}' , 'ProjectController@complete')->name('project/complete');

/* ROUTES CLIENTS */
Route::get('admin/client/view' , 'ClientController@views')->name('client/view');

/* ROUTES EMPLOYEES */
Route::get('admin/empoyee/view' , 'EmployeeController@views')->name('employee/view');
Route::get('empoyee/details/{id}' , 'EmployeeController@details')->name('employee/details');

/* ROUTES Teams */
Route::get('admin/team/view' , 'TeamController@view')->name('team/view');
Route::get('team/details/{id}' , 'TeamController@details')->name('team/details');

/* ROUTES Tasks */
Route::get('admin/task/create/{id}' , 'TaskController@createTask')->name('create/task');
Route::get('admin/task/view' , 'TaskController@view')->name('task/view');
Route::get('task/details/{id}' , 'TaskController@details')->name('task/details');
Route::get('task/pause/{id}' , 'TaskController@pause')->name('task/pause');
Route::get('task/resume/{id}' , 'TaskController@resume')->name('task/resume');
Route::get('task/complete/{id}' , 'TaskController@complete')->name('task/complete');

/* ROUTES AssignProject */
Route::get('admin/assignproject/view' , 'ProjectUserController@view')->name('projectuser/view');
Route::get('admin/assignproject/{id}' , 'ProjectUserController@create')->name('assign/team');

/* ROUTES AssignTasks */
Route::get('admin/assigntasks/view' , 'TaskUserController@view')->name('taskuser/view');
Route::get('admin/assigntask/{id}' , 'TaskUserController@create')->name('assign_task');

/* ROUTES Team Members */
Route::get('admin/teammembers/view' , 'TeamMemberController@view')->name('teammember/view');

/* ROUTES Designation */
Route::get('admin/designation/view' , 'DesignationController@view')->name('designation/view');

/* ROUTES Recruiter */
Route::get('admin/recruiter/view' , 'RecruiterController@view')->name('recruiter/view');

/* ROUTES Agent */
Route::get('admin/agents/list' , 'AgentController@view')->name('agent/view');

/* ROUTES Milestone */
Route::get('milestone/add/{id}' , 'MilestoneController@createMilestone')->name('create/milestone');
Route::get('milestone/edit/{id}' , 'MilestoneController@editMilestone')->name('milestone/edit');
Route::get('milestone/release/{id}' , 'MilestoneController@releaseMilestone')->name('milestone/release');

/* ROUTES ClientPortal */
Route::get('client_portal' , 'ClientPortalController@index')->name('client_portal');
Route::get('/client_portal/edit' , 'ClientPortalController@edit')->name('edit/client_portal');
Route::post('/client_portal/update' , 'ClientPortalController@update')->name('clientportalUpdate');
Route::post('client_portal/saveClient' , 'ClientPortalController@store')->name('clientportal');
Route::get('/client_portal/getClientDetails' , 'ClientPortalController@getClientDetails');
Route::get('/client_portal/admin/preferences/deleteClient' , 'ClientPortalController@destroy');

/* ROUTES BUSINESS TYPE */
Route::get('client_portal/admin/preferences/businesstype' , 'BusinessTypeController@index')->name('businesstype/view');
Route::get('client_portal/admin/preferences/add_businesstype' , 'BusinessTypeController@create')->name('add_business_type');
Route::get('client_portal/admin/preferences/edit_businesstype/{id}' , 'BusinessTypeController@edit')->name('edit_business_type');
Route::get('client_portal/admin/preferences/change_bt_status/{id}' , 'BusinessTypeController@changeStatus')->name('change_bt_status');
Route::get('/client_portal/admin/preferences/delete_businesstype' , 'BusinessTypeController@delete');

/* ROUTES AREA TYPE */
Route::get('/client_portal/admin/preferences/areas' , 'AreaController@index')->name('area/view');
Route::get('client_portal/admin/preferences/add_area' , 'AreaController@create')->name('area/create');
Route::get('client_portal/admin/preferences/edit_area/{id}' , 'AreaController@edit')->name('area/edit');
Route::get('client_portal/admin/preferences/change_status/{id}' , 'AreaController@changeStatus')->name('change_area_status');
Route::get('/client_portal/admin/preferences/delete_area' , 'AreaController@delete');

/* ROUTES STATUS */
Route::get('/client_portal/admin/preferences/status' , 'StatusController@index')->name('status/view');
Route::get('client_portal/admin/preferences/add_status' , 'StatusController@create')->name('status/create');
Route::get('client_portal/admin/preferences/edit_status/{id}' , 'StatusController@edit')->name('status/edit');
Route::get('client_portal/admin/preferences/change_statuses_status/{id}' , 'StatusController@changeStatus')->name('change_status_status');
Route::get('/client_portal/admin/preferences/delete_status' , 'StatusController@delete');

/* ROUTES DELETE REQUESTS */
Route::post('/client_portal/preferences/client/delete_request' , 'DeleteRequestController@deleteRequest');
Route::get('client_portal/admin/preferences/delete_requests/client' , 'DeleteRequestController@deleteClientRequest')->name('client_delete_requests');
Route::get('/client_portal/admin/preferences/approve_request/client' , 'DeleteRequestController@approveRequest');
Route::get('/client_portal/admin/preferences/decline_request/client' , 'DeleteRequestController@declineRequest');


/* ROUTE Logout */
Route::get('client/details/{id}', 'AdminController@client_details')->name('client/details');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
