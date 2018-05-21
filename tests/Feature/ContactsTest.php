<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Mail;

class ContactsTest extends TestCase
{
    /**
     * @group canSendContactMail
     *
     */
    public function testCanSendContactMail()
    {
        Mail::fake();

        $payload = [];

        $response = $this->post('/contact', $payload);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors',
        ]);

        $payload = [
            'name'  => 'test',
            'email' => 'test@example.com',
        ];

        $response = $this->post('/contact', $payload);

        Mail::assertSent(\App\Mail\Contact::class, 1);
        Mail::assertSent(\App\Mail\ContactCopy::class, 1);

        $response->assertStatus(200);

        $this->assertEmpty($response->getData());
    }

    /**
     * @group canApplyForMembershop
     *
     */
    public function testApplyForMembershop()
    {
        Mail::fake();

        $payload = [];

        $response = $this->post('/member', $payload);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors',
        ]);

        $payload = [
            'name'  => 'test',
            'email' => 'test@example.com',
            'mobileNumber' => '1234567',
        ];

        $response = $this->post('/member', $payload);

        Mail::assertSent(\App\Mail\Member::class, 1);
        Mail::assertSent(\App\Mail\MemberCopy::class, 1);

        $response->assertStatus(200);

        $this->assertEmpty($response->getData());
    }
}
