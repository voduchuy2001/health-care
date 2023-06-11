<x-mail::message>
    <h2>Hi, {{ $data['name'] }}</h2>
    <p>Thanks for your appointment,</p>
    <p>Customer: {{ $data['name']}}, appointment at {{ $data['date_time']}}</p>
    <p>We'll soon be able to get back to you.</p>
    <p>Best regard,</p>
    <p>{{ config('app.name') }}</p>
</x-mail::message>