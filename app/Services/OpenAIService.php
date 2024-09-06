<?php

namespace App\Services;

use App\Models\MessageGeneration;
use App\Models\Product;
use GuzzleHttp\Client;

class OpenAIService
{
    protected $client;
    
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . config('app.openai_api_token'),
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    public function getResponse($full_message,$shift_id)
    {
        $payload = [
            "model" => "gpt-4o-mini",
            "messages" => [ 
                [
                    "role" => "user",
                    "content" => $full_message
                ]
            ],
            "functions" => $this->getTools(),
            "function_call" => ["name" => "message_transfer"],
            "temperature" => 1,
            "max_tokens" => 2000,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0,
        ];

        $response = $this->client->post('chat/completions', [
            'json' => $payload,
        ]);

        $result = json_decode($response->getBody(), true);
        
        return $this->formatResponse($result,$full_message,$shift_id);
    }

    private function getTools(){
        $product_names = array_unique(Product::pluck('name')->toArray());  
        $product_predictions = array_unique(explode(',',implode(',',Product::pluck('predictions')->toArray())));  
        $product_colors = array_unique(explode(',',implode(',',Product::pluck('colors')->toArray()))); 
        $product_sizes = array_unique(explode(',',implode(',',Product::pluck('sizes')->toArray())));  
        
        return  [
                    [ 
                        "name" => "message_transfer",
                        "description" => "Get User Info And Order Info",
                        "parameters" => [
                            "type" => "object",
                            "properties" => [
                                "customer_name" => [
                                    "type" => "string",
                                    "description" => "The Customer Name From message"
                                ],
                                "customer_phones" => [
                                    "type" => "object",
                                    "properties" => [
                                        "phone" => [
                                            "type" => "string",
                                            "description" => "The Customer Phone Number"
                                        ],
                                        "another_phone" => [
                                            "type" => "string",
                                            "description" => "The Customer Second Phone Number"
                                        ]
                                    ],
                                    "required" => ["phone", "another_phone"],
                                    "additionalProperties" => false
                                ],
                                "customer_address" => [ 
                                    "type" => "object",
                                    "properties" => [
                                        "country" => [
                                            "type" => "string",
                                            "description" => "in english Country Of Shipping"
                                        ],
                                        "city" => [
                                            "type" => "string",
                                            "description" => "City Of Shipping"
                                        ],
                                        "district" => [
                                            "type" => "string",
                                            "description" => "District Of Shipping"
                                        ],
                                        "full_address" => [
                                            "type" => "string",
                                            "description" => "Full Address of Shipping"
                                        ]
                                    ],
                                    "required" => ["country", "city", "district", "full_address"],
                                    "additionalProperties" => false 
                                ],
                                "products" => [
                                    "type" => "array",
                                    "items" => [
                                        "type" => "object",
                                        "properties" => [
                                            "product_name" => [
                                                "type" => "string",
                                                "description" => "Name of the product e.g. " . implode(',',$product_names) . ',' . implode(',',$product_predictions)
                                            ],
                                            "product_quantity" => [
                                                "type" => "integer",
                                                "description" => "Quantity of the product"
                                            ],
                                            "product_colors" => [
                                                "type" => "array",
                                                "items" => [
                                                    "type" => "string",
                                                    "description" => "Selected Color For The Product e.g. " . implode(',',$product_colors)
                                                ],
                                            ],
                                            "product_size" => [
                                                "type" => "string",
                                                "description" => "Selected Size For The Product it can be number or strings e.g. " . implode(',',$product_sizes)
                                            ]
                                        ],
                                        "required" => ["product_name", "product_quantity", "product_colors", "product_size"],
                                        "additionalProperties" => false
                                    ]
                                ],
                                "total" => [
                                    "type" => "number",
                                    "description" => "Total Order Cost"
                                ]
                            ],
                            "required" => ["customer_name", "customer_phones", "customer_address", "products", "total"],
                            "additionalProperties" => false
                        ], 
                    ]
                ];
    }

    private function formatResponse($result,$full_message,$shift_id)
    {
        $messageGeneration = MessageGeneration::create([
            'full_message' => $full_message,
            'response' => json_encode($result),
            'tokens' => $result['usage']['total_tokens'],
            'shift_id' => $shift_id, 
        ]);

        tenant()->update(['tokens' => tenant('tokens') - $result['usage']['total_tokens']]);
        
        return [
            'message_generation_id' => $messageGeneration->id,
            'usage' => $result['usage'],
            'order' => json_decode($result['choices'][0]['message']['function_call']['arguments'])
        ]; 
    }
}
