<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Responsibles
    Route::delete('responsibles/destroy', 'ResponsibleController@massDestroy')->name('responsibles.massDestroy');
    Route::resource('responsibles', 'ResponsibleController');

    // News
    Route::delete('news/destroy', 'NewsController@massDestroy')->name('news.massDestroy');
    Route::post('news/media', 'NewsController@storeMedia')->name('news.storeMedia');
    Route::post('news/ckmedia', 'NewsController@storeCKEditorImages')->name('news.storeCKEditorImages');
    Route::resource('news', 'NewsController');

    // Group Responsibles
    Route::delete('group-responsibles/destroy', 'GroupResponsibleController@massDestroy')->name('group-responsibles.massDestroy');
    Route::resource('group-responsibles', 'GroupResponsibleController');

    // Groups
    Route::delete('groups/destroy', 'GroupController@massDestroy')->name('groups.massDestroy');
    Route::resource('groups', 'GroupController');

    // Participants
    Route::delete('participants/destroy', 'ParticipantController@massDestroy')->name('participants.massDestroy');
    Route::resource('participants', 'ParticipantController');

    // Workshops
    Route::delete('workshops/destroy', 'WorkshopsController@massDestroy')->name('workshops.massDestroy');
    Route::post('workshops/media', 'WorkshopsController@storeMedia')->name('workshops.storeMedia');
    Route::post('workshops/ckmedia', 'WorkshopsController@storeCKEditorImages')->name('workshops.storeCKEditorImages');
    Route::resource('workshops', 'WorkshopsController');

    // Workshop Responsibles
    Route::delete('workshop-responsibles/destroy', 'WorkshopResponsibleController@massDestroy')->name('workshop-responsibles.massDestroy');
    Route::resource('workshop-responsibles', 'WorkshopResponsibleController');

    // Group News
    Route::delete('group-news/destroy', 'GroupNewsController@massDestroy')->name('group-news.massDestroy');
    Route::post('group-news/media', 'GroupNewsController@storeMedia')->name('group-news.storeMedia');
    Route::post('group-news/ckmedia', 'GroupNewsController@storeCKEditorImages')->name('group-news.storeCKEditorImages');
    Route::resource('group-news', 'GroupNewsController');

    // Workshop News
    Route::delete('workshop-news/destroy', 'WorkshopNewsController@massDestroy')->name('workshop-news.massDestroy');
    Route::post('workshop-news/media', 'WorkshopNewsController@storeMedia')->name('workshop-news.storeMedia');
    Route::post('workshop-news/ckmedia', 'WorkshopNewsController@storeCKEditorImages')->name('workshop-news.storeCKEditorImages');
    Route::resource('workshop-news', 'WorkshopNewsController');

    // Responsible News
    Route::delete('responsible-news/destroy', 'ResponsibleNewsController@massDestroy')->name('responsible-news.massDestroy');
    Route::post('responsible-news/media', 'ResponsibleNewsController@storeMedia')->name('responsible-news.storeMedia');
    Route::post('responsible-news/ckmedia', 'ResponsibleNewsController@storeCKEditorImages')->name('responsible-news.storeCKEditorImages');
    Route::resource('responsible-news', 'ResponsibleNewsController');

    // Agendas
    Route::delete('agendas/destroy', 'AgendaController@massDestroy')->name('agendas.massDestroy');
    Route::post('agendas/media', 'AgendaController@storeMedia')->name('agendas.storeMedia');
    Route::post('agendas/ckmedia', 'AgendaController@storeCKEditorImages')->name('agendas.storeCKEditorImages');
    Route::resource('agendas', 'AgendaController');

    // Meetings
    Route::delete('meetings/destroy', 'MeetingController@massDestroy')->name('meetings.massDestroy');
    Route::resource('meetings', 'MeetingController');
    
    //Link
    Route::delete('links/destroy', 'LinksController@massDestroy')->name('links.massDestroy');
    Route::resource('links', 'LinksController');

    // Evaluations
    Route::resource('evaluations', 'EvaluationController');

    // Programe general
    Route::resource('programes-generales', 'PgorgameGeneralController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});

Route::group([
    'middleware' => 'participants',
    'prefix' => 'api/v1'
], function () {
    Route::get('test', function () {
        dd('test');
    });
});

Route::get('/test--test', function () {
    $user = App\Participant::findOrFail(1);
    dump($user);
});
