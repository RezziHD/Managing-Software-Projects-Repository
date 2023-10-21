from faker import Faker
import pymysql
import random
conn = pymysql.connect(host='localhost', port=3306 , user='my_app', passwd='Henni4henni4', db='goto_gro_database')
cursor = conn.cursor()

fake = Faker()

# Generate fake staff data
for i in range(50):
    first_name = fake.first_name()
    last_name = fake.last_name()
    email = f'{first_name.lower()}.{last_name.lower()}@example.com'
    password = fake.password()
    date_of_birth = fake.date_of_birth()
    street = fake.street_address()
    city = fake.city()
    state = fake.state_abbr()
    zip_code = fake.zipcode()

    sql = f"INSERT INTO staff (first_name, last_name, email, password, date_of_birth, street, city, state, zip) VALUES ('{first_name}', '{last_name}', '{email}', BINARY('{password}'), '{date_of_birth}', '{street}', '{city}', '{state}', '{zip_code}')"

    cursor.execute(sql)

# Generate fake member data
for i in range(100):
    first_name = fake.first_name()
    last_name = fake.last_name()
    email = f'{first_name.lower()}.{last_name.lower()}@example.com'
    date_of_birth = fake.date_of_birth()
    street = fake.street_address()
    city = fake.city()
    state = fake.state_abbr()
    zip_code = fake.zipcode()

    sql = f"INSERT INTO members (first_name, last_name, email, date_of_birth, street, city, state, zip) VALUES ('{first_name}', '{last_name}', '{email}', '{date_of_birth}', '{street}', '{city}', '{state}', '{zip_code}')"

    cursor.execute(sql)

# Generate fake product data
for i in range(500):
    name = fake.color_name()
    supplier = fake.company()
    stock = random.randint(0, 200)
    price = round(random.uniform(1, 100), 2)
    description = fake.paragraph()

    sql = f"INSERT INTO products (name, supplier, price, stock, description) VALUES ('{name}', '{supplier}', {price}, {stock} ,'{description}')"

    cursor.execute(sql)

# Generate fake sales data
for i in range(1000):
    member_id = random.randint(1, 100)
    staff_id = random.randint(1, 50)
    sale_date = fake.date_between('-1y', 'today')

    sql = f"INSERT INTO sales (member_id, staff_id, sale_date) VALUES ({member_id}, {staff_id}, '{sale_date}')"

    cursor.execute(sql)

    # Generate fake sale lines
    num_lines = random.randint(1, 10)
    for j in range(num_lines):
        product_id = random.randint(1, 500)
        quantity = random.randint(1, 5)

        sql = f"INSERT INTO sale_lines (sale_id, line_number, product_id, quantity) VALUES ((SELECT LAST_INSERT_ID()), {j+1}, {product_id}, {quantity})"

        cursor.execute(sql)

# Generate some fake roles
roles = ['Manager', 'Cashier', 'Stocker']
for role in roles:
    sql = f"INSERT INTO roles (name) VALUES ('{role}')"
    cursor.execute(sql)

# Assign roles to staff
for i in range(1, 51):
    role_id = random.choice([1, 2, 3])
    sql = f"INSERT INTO staff_roles (staff_id, role_id) VALUES ({i}, {role_id})"
    cursor.execute(sql)

conn.commit()
conn.close()