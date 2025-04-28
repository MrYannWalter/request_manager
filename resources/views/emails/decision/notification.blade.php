@component('mail::message')
# Bonjour {{ $request->user->name ?? '' }},

Votre requête **{{ $request->request_title }}** a été **{{ strtolower($decision) }}** par les responsables.

@if(!empty($response_text))
> **Commentaire du responsable :**  
> {{ $response_text }}
@endif

Merci pour votre confiance.

{{-- @component('mail::button', ['url' => route('login')])
Voir votre compte
@endcomponent --}}
Cordialement,  
L'équipe Administration
@endcomponent
