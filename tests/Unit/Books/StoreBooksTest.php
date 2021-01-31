<?php

namespace Tests\Unit\Books;


use App\Enums\ResponseCode;

class StoreBooksTest extends BaseBookTest
{

    /**
     * @group books
     * @group books-store
     */
    public function testStoringBookWithoutInput()
    {
        $response = [
            'message' => "The given data was invalid.",
            'errors' => [
                'title' => [
                    trans(
                        'validation.required',
                        ['attribute' => 'title']
                    )
                ],
                'description' => [
                    trans(
                        'validation.required',
                        ['attribute' => 'description']
                    )
                ],
                'rating' => [
                    trans(
                        'validation.required',
                        ['attribute' => 'rating']
                    )
                ]
            ]
        ];


        $this->post('/books', [], $this->headers)
            ->assertStatus(ResponseCode::UNPROCESSABLE_ENTITY)
            ->assertJson($response);
    }


    /**
     * @group books
     * @group books-store
     */
    public function testStoringBookWithNotExistingTitle()
    {
        $input = [
            'description' => 'Digital Fortress is a techno-thriller novel written by American author Dan Brown and published in 1998 by St. Martin\'s Press. The book explores the theme of government surveillance of electronically stored information on the private lives of citizens, and the possible civil liberties and ethical implications of using such technology.',
            'author_id' => 1,
            'rating' => 6
        ];

        $response = [
            'message' => "The given data was invalid.",
            'errors' => [
                'title' => [
                    trans(
                        'validation.required',
                        ['attribute' => 'title']
                    )
                ]
            ]
        ];

        $this->post('/books', $input, $this->headers)
            ->assertStatus(ResponseCode::UNPROCESSABLE_ENTITY)
            ->assertJson($response);
    }


    /**
     * @group books
     * @group books-store
     */
    public function testStoringBookWithRatingThatIsNotInteger()
    {
        $input = [
            'title' => 'Digital Fortress',
            'description' => 'Digital Fortress is a techno-thriller novel written by American author Dan Brown and published in 1998 by St. Martin\'s Press. The book explores the theme of government surveillance of electronically stored information on the private lives of citizens, and the possible civil liberties and ethical implications of using such technology.',
            'author_id' => 1,
            'rating' => 'INVALID_FIELD'
        ];

        $response = [
            'message' => "The given data was invalid.",
            'errors' => [
                'rating' => [
                    trans(
                        'validation.max.numeric',
                        [
                            'attribute' => 'rating',
                            'max'=> 6
                        ]
                    ),
                    trans(
                        'validation.numeric',
                        ['attribute' => 'rating']
                    )
                ]
            ]
        ];

        $this->post('/books', $input, $this->headers)
            ->assertStatus(ResponseCode::UNPROCESSABLE_ENTITY)
            ->assertJson($response);
    }
}
