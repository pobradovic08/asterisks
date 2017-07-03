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

/*
 * Records
 */

$app->get('[/]', function() use ($app){
   echo "OK";
});

$app->group('/records', function () use ($app) {
    /* Get all records */
    $app->get('[/]', 'RecordController:get_records');
    /* Get, update or delete record by ID */
    $app->get('/id/{record_id:[0-9]+}[/]', 'RecordController:get_record');
    /* Create or update record */
    #$app->post('[/new]', 'RecordController:post_record');
});