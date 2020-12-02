<?php

return array (
    'meta' =>
        array (
            'count' => 1,
            'total' => 1,
        ),
    'data' =>
        array (
            0 =>
                array (
                    'name' => 'foo template',
                    'checklist' =>
                        array (
                            'description' => 'my checklist',
                            'due_interval' => 3,
                            'due_unit' => 'hour',
                        ),
                    'items' =>
                        array (
                            0 =>
                                array (
                                    'description' => 'my foo item',
                                    'urgency' => 2,
                                    'due_interval' => 40,
                                    'due_unit' => 'minute',
                                ),
                            1 =>
                                array (
                                    'description' => 'my bar item',
                                    'urgency' => 3,
                                    'due_interval' => 30,
                                    'due_unit' => 'minute',
                                ),
                        ),
                ),
        ),
);
