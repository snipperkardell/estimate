<?php
/**
 * API ROUTES
 */
Route::prefix('tree')->group(function () {
    Route::get('area', 'AreaController@comboArea');
    Route::get('type', 'ConceptController@conceptComboType');
    Route::get('users', 'UserController@userCombo');
});
