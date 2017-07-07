<?php

/**
 * Asterisks
 * Password manager
 *
 * Copyright (C) 2017  Pavle Obradovic (pajaja)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

$app->get('[/]', function() use ($app){
    echo "OK";
});

/*
 * Records
 */

$app->group('/records', function () use ($app) {
    /* Get all records */
    $app->get('[/]', 'RecordController:get_records');
    /* Get all private records for user */
    $app->get('/user/{user_id:[0-9]+}[/]', 'RecordController:get_user_records');
    /* Get all shared records (by group) */
    $app->get('/group/{group_id:[0-9]+}[/]', 'RecordController:get_group_records');
    /* Get, update or delete record by ID */
    $app->get('/id/{record_id:[0-9]+}[/]', 'RecordController:get_record');
    /* Create or update record */
    #$app->post('[/new]', 'RecordController:post_record');
});

/*
 * Groups
 */

$app->group('/groups', function () use ($app) {
    /* Get all groups */
    $app->get('[/]', 'GroupController:get_groups');
    /* Get, update or delete group by ID */
    $app->get('/id/{group_id:[0-9]+}[/]', 'GroupController:get_group');
});

/*
 * Folders
 */
$app->group('/folders', function () use ($app) {
    /* Get all groups */
    $app->get('[/]', 'FolderController:get_folders');
    /* Get, update or delete group by ID */
    $app->get('/id/{folder_id:[0-9]+}[/]', 'FolderController:get_folder');
});

/*
 * Users
 */
$app->group('/users', function () use ($app) {
    /* Get all groups */
    $app->get('[/]', 'UserController:get_users');
    /* Get, update or delete group by ID */
    $app->get('/id/{user_id:[0-9]+}[/]', 'UserController:get_user');
});