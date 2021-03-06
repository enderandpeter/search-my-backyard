<?php

namespace Tests\Browser\EventPlanner;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Models\EventPlanner\User;
use App\Models\EventPlanner\CalendarEvent;
use Throwable;

class IndexCalendarEventTest extends DuskTestCase
{
	use DatabaseMigrations;

    /**
     * Check that a user's calendar events are shown on the index page
     *
     * @group index
     * @group loginas
     * @return void
     * @throws Throwable
     */
    public function testIndexEvents()
    {
        $this->browse( function ( Browser $browser ) {
        	$caldendarEvents = CalendarEvent::factory()->count(5)->create();
        	$user = User::find($caldendarEvents[0]->user_id );

            $browser->loginAs( $user, 'eventplanner' )
            	->visit( route( 'event-planner.events.index' ) );

            foreach( $caldendarEvents as $calendarEvent ){
            	$browser->assertSee( $calendarEvent->name )
            	->assertSee( htmlentities(preg_replace( '/\R/', ' ', $calendarEvent->location )) )
            	->assertSee( $calendarEvent->type )
            	->assertSee( $calendarEvent->showStartDate() );

            	if( $calendarEvent->start_date->format( 'Y m d' ) !== $calendarEvent->end_date->format( 'Y m d' ) ){
            		$browser->assertSee( $calendarEvent->showEndDate() );
            	}
            }
        });
    }
}
