<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use App\Applicant;
use App\Detail;

class ApplicantsTest extends TestCase
{
    /**
     * @group postApplicant
     *
     */
    public function testPostApplicantWithEmptyPayloadShouldReturn422()
    {
        $this->assertEmpty(Applicant::all());

        $payload = [];

        $response = $this->post('/applications', $payload);

        $this->assertEmpty(Applicant::all());

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors',
        ]);
    }

    /**
     * @group postApplicant
     *
     */
    public function testPostApplicant()
    {
        Mail::fake();
        
        $this->assertEmpty(Applicant::all());
        $this->assertEmpty(Detail::all());

        $payload = [
            'name'  => 'Test',
            'age'   => 16,
            'email' => 'test@example.com',
            'mobileNumber' => '01234567',
            'teacherName' => 'test',
            'teacherMobileNumber' => '01234567',
            'participateMasterclass' => 1,
            'participateConcert' => 0,
            'type' => Applicant::ADULT,
        ];

        $response = $this->post('/applications', $payload);

        $this->assertNotEmpty(Applicant::all());
        $this->assertNotEmpty(Detail::all());

        $response->assertStatus(200);
        
        Mail::assertSent(\App\Mail\ApplicantAdult::class, 1);
        Mail::assertSent(\App\Mail\ApplicantAdultCopy::class, 1);

        $this->assertEmpty($response->getData());
    }
}
