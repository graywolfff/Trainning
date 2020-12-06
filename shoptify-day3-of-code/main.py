import requests

url = 'https://phongdh-store.myshopify.com'
customer_url = url + "/admin/api/2020-10/customers.json"

response = requests.get(url=customer_url,
                        headers={'X-Shopify-Access-Token': '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'})

header = [key for key in response.json()["customers"][4] if key != 'default_address' and key != 'addresses']
data = ','.join(header)
for customer in response.json()["customers"]:
    row = []
    for head in header:
        row.append(str(customer[head]))
    data += "\n" + ",".join(row)
with open(file="customer.csv", mode='w') as input_file:
    input_file.write(data)

