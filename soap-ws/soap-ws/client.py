from suds.client import Client
url = 'http://localhost/projet_news/soap-ws/soap-ws/server.php?wsdl'
client = Client(url)
print client

result1 = client.service.hello("Mariama")
print(result1)

result2 = client.service.addUser('seck','abdou','abdou','passer','0','2')
print(result2),

result3 = client.service.updateUser('sow','alpha','alpha','passer','8')
print(result3)

result4 = client.service.delete('9')
print(result4)
