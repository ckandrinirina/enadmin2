<?php

namespace App\EventListener;

// ...
use App\Repository\SchoolRepository;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use CalendarBundle\Event\CalendarEvent;
use CalendarBundle\Entity\Event;

class CalendarListener
{
    private $schoolRepository;
    private $router;

    public function __construct(SchoolRepository $schoolRepository,UrlGeneratorInterface $router) 
    {
        $this->schoolRepository = $schoolRepository;
        $this->router = $router;
    }

    public function load(CalendarEvent $calendar): void
    {
        $start = $calendar->getStart();
        $end = $calendar->getEnd();
        $filters = $calendar->getFilters();

        // Modify the query to fit to your entity and needs
        // Change booking.beginAt by your start date property
        $schools = $this->schoolRepository
            ->createQueryBuilder('school')
            ->where('school.beginAt BETWEEN :start and :end')
            ->setParameter('start', $start->format('Y-m-d H:i:s'))
            ->setParameter('end', $end->format('Y-m-d H:i:s'))
            ->getQuery()
            ->getResult()
        ;

        foreach ($schools as $school) {
            // this create the events with your data (here booking data) to fill calendar
            $schoolEvent = new Event(
                $school->getTitle(),
                $school->getBeginAt(),
                $school->getEndAt() // If the end date is null or not defined, a all day event is created.
            );

            /*
             * Add custom options to events
             *
             * For more information see: https://fullcalendar.io/docs/event-object
             * and: https://github.com/fullcalendar/fullcalendar/blob/master/src/core/options.ts
             */

            $schoolEvent->setOptions([
                'backgroundColor' => 'red',
                'borderColor' => 'red',
            ]);
            $schoolEvent->addOption(
                'url',
                $this->router->generate('school_show', [
                    'id' => $school->getId(),
                ])
            );

            // finally, add the event to the CalendarEvent to fill the calendar
            $calendar->addEvent($schoolEvent);
        }
    }
}
