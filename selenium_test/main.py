from selenium import webdriver

url = 'http://45.79.43.178/source_carts/wordpress/wp-admin'
USERNAME = "admin"
PASSWORD = "123456aA"

try:
    driver = webdriver.Chrome()
    driver.get(url)
    username = driver.find_element_by_id("user_login")
    password = driver.find_element_by_id("user_pass")
    username.send_keys(USERNAME)
    password.send_keys(PASSWORD)
    driver.find_element_by_name("wp-submit").click()
    display_name = driver.find_element_by_class_name("display-name")

except:
    print("Error")
else:
    print(f'Found: {display_name.text}')
    driver.close()
