<?php
class validateEvents
{
    public function title($title)
    {
        if ($title == "") {
            return "Enter Title";
        } else {
            return "";
        }
    }

    public function type($type)
    {
        if ($type == "") {
            return "Choose Type";
        } else {
            return "";
        }
    }

    public function keyword($keyword)
    {
        if ($keyword == "") {
            return "Enter Title";
        } else {
            return "";
        }
    }

    public function organizer($org)
    {
        if ($org == "") {
            return "Enter Organizer Name";
        } else {
            return "";
        }
    }

    public function address($ad)
    {
        if ($ad == "") {
            return "Enter Organizer Name";
        } else {
            return "";
        }
    }

    public function date($date)
    {
        if ($date == "") {
            return "Choose Date";
        } else {
            return "";
        }
    }

    public function startTime($start)
    {
        if ($start == "") {
            return "Choose Start Time";
        } else {
            return "";
        }
    }

    public function endTime($end)
    {
        if ($end == "") {
            return "Choose End Time";
        } else {
            return "";
        }
    }

    public function type_event($event)
    {
        if ($event == "") {
            return "Choose Type of Event";
        } else {
            return "";
        }
    }

    public function seats($s)
    {
        if ($s == "") {
            return "Enter Seats";
        } else {
            return "";
        }
    }
}
?>