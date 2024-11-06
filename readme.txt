criar na pasta o arquivo: tarefas.json

curl -X GET http://localhost/rest/index.php

curl -X POST -H "Content-Type: application/json" -d "{\"titulo\": \"Estudar PHP\"}" http://localhost/rest/index.php

curl -X PUT -H "Content-Type: application/json" -d "{\"titulo\": \"Estudar PHP\", \"status\": \"concluido\"}" http://localhost/rest/index.php?indice=0

curl -X DELETE http://localhost/api_rest/index.php?indice=0


