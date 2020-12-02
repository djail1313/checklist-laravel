<?php

return array (
    'meta' =>
        array (
            'count' => 3,
            'total' => 3,
        ),
    'data' =>
        array (
            0 =>
                array (
                    'type' => 'checklists',
                    'attributes' =>
                        array (
                            'object_domain' => 'deals',
                            'object_id' => 1,
                            'description' => 'my checklist',
                            'is_completed' => false,
                            'due' => '2019-02-16T03:07:10+00:00',
                            'urgency' => 0,
                            'completed_at' => NULL,
                            'updated_by' => NULL,
                            'created_by' => 556396,
                            'created_at' => '2019-02-16T00:07:10+00:00',
                            'updated_at' => '2019-02-16T00:07:10+00:00',
                        ),
                    'links' =>
                        array (
                            'self' => 'http://localhost:8000/api/v1/checklists/509',
                        ),
                    'relationships' =>
                        array (
                            'items' =>
                                array (
                                    'links' =>
                                        array (
                                            'self' => 'http://localhost:8000/api/v1/checklists/509/relationships/items',
                                            'related' => 'http://localhost:8000/api/v1/checklists/509/items',
                                        ),
                                    'data' =>
                                        array (
                                            0 =>
                                                array (
                                                    'type' => 'items',
                                                    'id' => '839',
                                                ),
                                            1 =>
                                                array (
                                                    'type' => 'items',
                                                    'id' => '840',
                                                ),
                                        ),
                                ),
                        ),
                ),
            1 =>
                array (
                    'type' => 'checklists',
                    'id' => '510',
                    'attributes' =>
                        array (
                            'object_domain' => 'deals',
                            'object_id' => 2,
                            'description' => 'my checklist',
                            'is_completed' => false,
                            'due' => '2019-02-16T03:07:10+00:00',
                            'urgency' => 0,
                            'completed_at' => NULL,
                            'updated_by' => NULL,
                            'created_by' => 556396,
                            'created_at' => '2019-02-16T00:07:10+00:00',
                            'updated_at' => '2019-02-16T00:07:10+00:00',
                        ),
                    'links' =>
                        array (
                            'self' => 'http://localhost:8000/api/v1/checklists/510',
                        ),
                    'relationships' =>
                        array (
                            'items' =>
                                array (
                                    'links' =>
                                        array (
                                            'self' => 'http://localhost:8000/api/v1/checklists/510/relationships/items',
                                            'related' => 'http://localhost:8000/api/v1/checklists/510/items',
                                        ),
                                    'data' =>
                                        array (
                                            0 =>
                                                array (
                                                    'type' => 'items',
                                                    'id' => '841',
                                                ),
                                            1 =>
                                                array (
                                                    'type' => 'items',
                                                    'id' => '842',
                                                ),
                                        ),
                                ),
                        ),
                ),
            2 =>
                array (
                    'type' => 'checklists',
                    'id' => '511',
                    'attributes' =>
                        array (
                            'object_domain' => 'deals',
                            'object_id' => 3,
                            'description' => 'my checklist',
                            'is_completed' => false,
                            'due' => '2019-02-16T03:07:10+00:00',
                            'urgency' => 0,
                            'completed_at' => NULL,
                            'updated_by' => NULL,
                            'created_by' => 556396,
                            'created_at' => '2019-02-16T00:07:10+00:00',
                            'updated_at' => '2019-02-16T00:07:10+00:00',
                        ),
                    'links' =>
                        array (
                            'self' => 'http://localhost:8000/api/v1/checklists/511',
                        ),
                    'relationships' =>
                        array (
                            'items' =>
                                array (
                                    'links' =>
                                        array (
                                            'self' => 'http://localhost:8000/api/v1/checklists/511/relationships/items',
                                            'related' => 'http://localhost:8000/api/v1/checklists/511/items',
                                        ),
                                    'data' =>
                                        array (
                                            0 =>
                                                array (
                                                    'type' => 'items',
                                                    'id' => '843',
                                                ),
                                            1 =>
                                                array (
                                                    'type' => 'items',
                                                    'id' => '844',
                                                ),
                                        ),
                                ),
                        ),
                ),
        ),
    'included' =>
        array (
            0 =>
                array (
                    'type' => 'items',
                    'id' => '839',
                    'attributes' =>
                        array (
                            'description' => 'my foo item',
                            'is_completed' => false,
                            'completed_at' => NULL,
                            'due' => '2019-02-16T00:47:10+00:00',
                            'urgency' => 2,
                            'updated_by' => NULL,
                            'user_id' => 556396,
                            'checklist_id' => 509,
                            'deleted_at' => NULL,
                            'created_at' => '2019-02-16T00:07:10+00:00',
                            'updated_at' => '2019-02-16T00:07:10+00:00',
                        ),
                    'links' =>
                        array (
                            'self' => 'http://localhost:8000/api/v1/items/839',
                        ),
                ),
            1 =>
                array (
                    'type' => 'items',
                    'id' => '840',
                    'attributes' =>
                        array (
                            'description' => 'my bar item',
                            'is_completed' => false,
                            'completed_at' => NULL,
                            'due' => '2019-02-16T00:37:10+00:00',
                            'urgency' => 3,
                            'updated_by' => NULL,
                            'user_id' => 556396,
                            'checklist_id' => 509,
                            'deleted_at' => NULL,
                            'created_at' => '2019-02-16T00:07:10+00:00',
                            'updated_at' => '2019-02-16T00:07:10+00:00',
                        ),
                    'links' =>
                        array (
                            'self' => 'http://localhost:8000/api/v1/items/840',
                        ),
                ),
            2 =>
                array (
                    'type' => 'items',
                    'id' => '841',
                    'attributes' =>
                        array (
                            'description' => 'my foo item',
                            'is_completed' => false,
                            'completed_at' => NULL,
                            'due' => '2019-02-16T00:47:10+00:00',
                            'urgency' => 2,
                            'updated_by' => NULL,
                            'user_id' => 556396,
                            'checklist_id' => 510,
                            'deleted_at' => NULL,
                            'created_at' => '2019-02-16T00:07:10+00:00',
                            'updated_at' => '2019-02-16T00:07:10+00:00',
                        ),
                    'links' =>
                        array (
                            'self' => 'http://localhost:8000/api/v1/items/841',
                        ),
                ),
            3 =>
                array (
                    'type' => 'items',
                    'id' => '842',
                    'attributes' =>
                        array (
                            'description' => 'my bar item',
                            'is_completed' => false,
                            'completed_at' => NULL,
                            'due' => '2019-02-16T00:37:10+00:00',
                            'urgency' => 3,
                            'updated_by' => NULL,
                            'user_id' => 556396,
                            'checklist_id' => 510,
                            'deleted_at' => NULL,
                            'created_at' => '2019-02-16T00:07:10+00:00',
                            'updated_at' => '2019-02-16T00:07:10+00:00',
                        ),
                    'links' =>
                        array (
                            'self' => 'http://localhost:8000/api/v1/items/842',
                        ),
                ),
            4 =>
                array (
                    'type' => 'items',
                    'id' => '843',
                    'attributes' =>
                        array (
                            'description' => 'my foo item',
                            'is_completed' => false,
                            'completed_at' => NULL,
                            'due' => '2019-02-16T00:47:10+00:00',
                            'urgency' => 2,
                            'updated_by' => NULL,
                            'user_id' => 556396,
                            'checklist_id' => 511,
                            'deleted_at' => NULL,
                            'created_at' => '2019-02-16T00:07:10+00:00',
                            'updated_at' => '2019-02-16T00:07:10+00:00',
                        ),
                    'links' =>
                        array (
                            'self' => 'http://localhost:8000/api/v1/items/843',
                        ),
                ),
            5 =>
                array (
                    'type' => 'items',
                    'id' => '844',
                    'attributes' =>
                        array (
                            'description' => 'my bar item',
                            'is_completed' => false,
                            'completed_at' => NULL,
                            'due' => '2019-02-16T00:37:10+00:00',
                            'urgency' => 3,
                            'updated_by' => NULL,
                            'user_id' => 556396,
                            'checklist_id' => 511,
                            'deleted_at' => NULL,
                            'created_at' => '2019-02-16T00:07:10+00:00',
                            'updated_at' => '2019-02-16T00:07:10+00:00',
                        ),
                    'links' =>
                        array (
                            'self' => 'http://localhost:8000/api/v1/items/844',
                        ),
                ),
        ),
);
