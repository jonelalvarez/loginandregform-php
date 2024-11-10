CREATE TABLE Customers (
    customer_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    contact_num VARCHAR(100),
    product INT,
    quantity INT,
    date_added timestamp
    );

CREATE TABLE Orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    order_date DATE NOT NULL,
    product INT,
    quantity INT,
    date_added timestamp
    FOREIGN KEY (customer_id) REFERENCES Customers(customer_id)
);

CREATE TABLE user_passwords (
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(50),
	password VARCHAR(50),
	date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);