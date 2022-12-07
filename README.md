Jeg opgave jeg fik i samhæng med en samtale

# Patient-code-challenge

Jeg har valgt at gå med PHP og MySQL til min backend, på grund jeg har mest erfæring i dem når jeg skal lave backend og api'er
Desværre ved jeg ikke noget om Docker, så jeg kan ikke sige om min kode vil virke der.

Til frontend valgte jeg at gå med vue2 og axios. Det er på groudn af dem har jeg mest erfæring. Jeg kunne også have bruge jquery i stedet for axios men det er bare mange år siden jeg sidst programmerede med jquery. 

Inden jeg begyndte på at kode laver jeg altid diagrammer. De diagrammer jeg har lavet er er-digram og class-diagram.
Det giver mig et hurtiger overblik, og ved hvad jeg skal lave.

POSTMAN har jeg brugt til at se om mine endpoint virkede.
- Ved POST's body har jeg valgt at bruge raw

Så jeg valgt at gå med det jeg har mest erfaring i samtidig med det jeg synes jeg kan vise mest i.

# Opsætning af vue og axios
Vue
 - Terminalen: npm i

Axios
- Terminalen: npm install axios --save

# EndPoints
headers
- Accept: application/json

GET
- http://localhost/kode-challenges/API/index.php/api/docter/all-docter-too-patiant-with-name/<id>
- http://localhost/kode-challenges/API/index.php/api/medical-journal/get-patient?patientId=<id>&dockerId=<id>
- http://localhost/kode-challenges/API/index.php/api/medical-journal/all-patiant-from-depatment/<id>
- http://localhost/kode-challenges/API/index.php/api/docter/all-docter-from-department-with-id/<id>

POST
- http://localhost/kode-challenges/API/index.php/api/admission
    body skal have variablerne "journal", "department", "docter"
