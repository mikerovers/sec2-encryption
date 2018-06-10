# Security 2 - Encrypt-R-us - Mike Rovers - 2096288

Als framework heb ik Laravel 5.6 gebruikt. Ik heb openssl gebruikt als encryptor/decryptor.
De code voor het encrypten en decrypt staat in ```App\Http\Controllers\SecretController```.

Hierbij lever ik een een hash van de naam en wachtwoord. Deze wordt gebruikt als key.
Het geencrypte bericht wordt opgeslagen in de database.

Tijdens het decrypten wordt een hash van de naam en wachtwoord weer gebruikt als key.
Als de hash niet overeenkomt, zal het bericht dus ook niet goed gedecrypt worden.
