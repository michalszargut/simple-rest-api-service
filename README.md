###Wymagania zadania

Napisz serwis we frameworku Symfony 5, który stanowi backend API dla aplikacji
frontendowej.
Napisz następujące endpointy:
1. Endpoint do rejestracji nowego użytkownika z rolą ROLE_USER z polami:
   a. email jako login, powtórzony email, hasło, imię, nazwisko, telefon,
   numer pesel.
   b. Endpoint powinien mieć walidację na wszystkie pola, np. nie powinien
   przyjmować danych, które nie są poprawnym emailem, czy peselem
2. Endpoint do logowania - w payloadzie przekazujemy email oraz hasło - system
   powinien zwrócić JWT token przy poprawnych danych logowania lub odpowiedni
   komunikat i status o błędzie logowania.
3. Endpoint zwracający dane tylko zalogowanego użytkownika.
   Dodaj do projektu .docker aby można było ją uruchomić jednym poleceniem docker-
   compose up. Wykorzystaj bazę danych mysql.