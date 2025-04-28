@component('mail::message')
# Requête envoyée au responsable

La requête **{{ $request->request_title }}** a ete envoyer au responsable **{{ $responsable->name }}** avec succes.

Merci pour votre travail.

@endcomponent
