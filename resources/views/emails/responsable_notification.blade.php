@component('mail::message')
# Nouvelle requête recu

Bonjour,

Une nouvelle requête intitulée **{{ $request->request_title }}** vous a été affectée.  
Veuillez prendre une décision dès que possible.

Merci.

@endcomponent
