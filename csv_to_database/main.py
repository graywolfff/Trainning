from datetime import datetime

import csv
import mysql.connector
from mysql.connector import errorcode

DB_NAME = "db_test"
config = {
    'user': 'root',
    'password': 'admin@2019',
    'host': '127.0.0.1',
    'database': DB_NAME,
    'raise_on_warnings': True
}

TABLES = {'customer': (
    "CREATE TABLE `customer` ("
    "  `customerid` int NOT NULL,"
    "  `firstname` varchar(20) NOT NULL,"
    "  `lastname` varchar(20) NULL,"
    "  `companyname` varchar(50) NULL,"
    "  `billingaddress1` varchar(100) NULL,"
    "  `billingaddress2` varchar(100) NULL,"
    "  `city` varchar(50) NULL,"
    "  `state` varchar(5) NULL,"
    "  `postalcode` varchar(20) NULL,"
    "  `country` varchar(30) NULL,"
    "  `phonenumber` varchar(20) NULL,"
    "  `emailaddress` varchar(100) NOT NULL,"
    "  `createddate` datetime NOT NULL,"
    "  PRIMARY KEY (`customerid`)"
    ") ENGINE=InnoDB")}


def insert_db(cursor, cnx):
    line_count = 0
    try:
        with open("customer.csv") as csv_file:
            csv_reader = csv.reader(csv_file, delimiter=',')
            for row in csv_reader:
                if line_count == 0:
                    line_count += 1
                else:
                    add_employee = ("INSERT INTO customer "
                                    "(customerid, firstname, lastname, companyname, billingaddress1, billingaddress2, city,"
                                    "state , postalcode, country, phonenumber,emailaddress, createddate)"
                                    "VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)")
                    row[-1] = datetime.strptime(row[-1], '%m/%d/%Y %H:%M').strftime('%y-%m-%d %H:%M:%S')
                    cursor.execute(add_employee, row)
                    cnx.commit()
                    line_count += 1
    except mysql.connector.Error as err:
        print(f"Error:  {err}")
        exit(1)
    except FileNotFoundError as notFound:
        print(f"Error: {notFound}")
        exit(1)
    else:
        print(f"{line_count} row inserted.")


def create_database(my_cursor):
    try:
        my_cursor.execute(
            f"CREATE DATABASE {DB_NAME} DEFAULT CHARACTER SET 'UTF8MB4'"
        )
    except mysql.connector.Error as err:
        print(f"Failed creating database:  {err}")
        exit(1)


try:
    cnx = mysql.connector.connect(**config)
    cursor = cnx.cursor()
    # create_database(cursor)
    for table_name in TABLES:
        table_description = TABLES[table_name]
        try:
            print("Creating table {}: ".format(table_name), end='')
            cursor.execute(table_description)
        except mysql.connector.Error as err:
            if err.errno == errorcode.ER_TABLE_EXISTS_ERROR:
                print("already exists.")
            else:
                print(err.msg)
        else:
            print("OK")
    insert_db(cursor, cnx)
    cursor.close()

except mysql.connector.Error as err:
    if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
        print("Something is wrong with your user name or password")
    else:
        print(err)
else:
    cnx.close()
