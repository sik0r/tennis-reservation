import React from "react";
import FullCalendar from "@fullcalendar/react";
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'

const Calendar = () => {
    return (
        <FullCalendar
            plugins={[dayGridPlugin, timeGridPlugin, interactionPlugin]}
            locale='pl'
            headerToolbar={{
                left: 'prev,next',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            }}
            buttonText={{
                month: 'Miesiąc',
                week: 'Tydzień',
                day: 'Dzień'
            }}
            weekNumberCalculation='ISO'
            initialView='timeGridWeek'
            titleFormat={{
                month: 'long',
                year: 'numeric',
                day: 'numeric',
            }}
            slotLabelFormat={{
                hour: 'numeric',
                minute: 'numeric',
                omitZeroMinute: false,
                meridiem: 'narrow'
            }}
            slotDuration='01:00:00'
            allDaySlot={false}
            expandRows={true}
        />
    )
};

export default Calendar