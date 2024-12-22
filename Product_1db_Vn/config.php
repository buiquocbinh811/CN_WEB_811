<?php
return [
    'channels' => [
        'model' => \App\Models\Channel::class,
        'primary_key' => 'ChannelID',
        'columns' => [
            'ChannelName' => [
                'label' => 'Channel Name',
                'type' => 'text',
                'required' => true
            ],
            'Description' => [
                'label' => 'Description', 
                'type' => 'textarea'
            ],
            'SubscribersCount' => [
                'label' => 'Subscribers Count',
                'type' => 'number'
            ],
            'URL' => [
                'label' => 'URL',
                'type' => 'url'
            ]
        ]
    ]
];