<x-mail::message>
# Envio de formulário de contato

## Name: {{ $contactData['name'] }}

## Email: {{ $contactData['email'] }}

## Mensagem: {{ $contactData['message'] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
