<?php

namespace App\EventPlanner;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    protected $table = 'eventplanner_calendarevents';
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [ 'id', 'created_at', 'updated_at' ];
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [ 'start_date', 'end_date' ];
    
    /**
     * Get the user that owns the comment.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
    	return $this->belongsTo('App\EventPlanner\User');
    }
}
