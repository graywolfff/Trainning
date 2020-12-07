import requests
from bs4 import BeautifulSoup

url = 'http://45.79.43.178/source_carts/wordpress/wp-login.php'
# url = 'http://localhost:8080/wp-login.php'
username = 'admin'
password = '123456aA'

with requests.Session() as s:
    params = {
        'log': username,
        'pwd': password
    }
    resp = s.post(url, data=params)

soup = BeautifulSoup(resp.content, 'html.parser')
names = soup.find_all('span', {"class": "display-name"})

for name in set([item.text for item in names]):
    print(f"Found: {name}")
