<?php
// This class represents an event object, which
// contains relevant information about the event
// and contains method to extract data from
// link tables.

class Event
{
    //These variables will be assigned during generation
    public $id;
    public $name;
    public $confType;
    public $date;
    public $startTime;
    public $finishTime;
    public $price;
    public $description;
    public $venueId;
    public $eManagerId;
    public $noOfAvailBooking;
    //These variables are set up by public methods
    //that retrieve data from mysql
    public $managerName;
    public $venueInformation;
    public $confTypeName;
    public $listOfTech;

    //These methods just retrieve relative data from mysql
    //Since this information is stored in other tables
    public function retrieveStringConfType()
    {
        //This method gets name of conference type from mysql
        //and stores it to $confTypeName;
    }

    public function retrieveManagerName()
    {
        //This method gets a string name from User table, whose
        //is a person who created the event.
    }

    public function retrieveVenueInfo()
    {
        //This method retrieves address of a venue
        //from mysql and concatenates them into a string
        //for venueInformation variable
    }

    public function retrieveListOfTech()
    {
        //This method gets a list of technologies
        //that will be covered in the event and
        // then they will be assigned to a variable
        // of listOfTech as a variable
    }
}
?>
