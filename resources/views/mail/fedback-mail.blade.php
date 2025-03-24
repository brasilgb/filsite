<x-mail::message>
# Envio de formulário de contato

## Name: {{ $contactData['name'] }}

## Email: {{ $contactData['email'] }}

## Mensagem: {{ $contactData['mensagem'] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
