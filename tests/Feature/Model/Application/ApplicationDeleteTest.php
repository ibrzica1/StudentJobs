<?php

use App\Models\Application;

it('cant delete application as unauthorised user', function(){

    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $application = application($employer->id);
    $response = $this->actingAs($employer)->delete('application/delete/'.$application->id);
    $response->assertRedirect('/');
});

it('cant delete application as unauthicated user', function(){

    germanLocationSeeder();
    $employer = employer();
    $application = application($employer->id);
    $response = $this->delete('application/delete/'.$application->id);
    $response->assertRedirect('/login');
});

it('cant delete application as authorised user', function(){

    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $student = student();
    $application = application($student->id);
    $response = $this->actingAs($student)->delete('application/delete/'.$application->id);
    $response->assertSessionHasNoErrors()
             ->assertRedirect(route('application.my-applications'));
    $this->assertModelMissing($application);
});