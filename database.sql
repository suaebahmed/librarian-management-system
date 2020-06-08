
CREATE DATABASE library_MS;


CREATE TABLE librarian(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fname varchar(50) NOT NULL,
    lname varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    username varchar(50) NOT NULL,
    password varchar(80) NOT NULL,
    datetime date NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE students(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fname varchar(50) NOT NULL,
    lname varchar(50) NOT NULL,
    reg varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    username varchar(50) NOT NULL,
    password varchar(80) NOT NULL,
    datetime date NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE books(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    book_name varchar(50) NOT NULL,
    book_image varchar(50) NOT NULL,
    book_auth_name varchar(50) NOT NULL,
    book_publication_name varchar(50) NOT NULL,
    book_purchase_date varchar(50) NOT NULL,
    book_price int NOT NULL,
    book_qty int NOT NULL,
    book_available_qty int NOT NULL,
    librarian_username varchar(50) NOT NULL,
    datetime date NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE issue_books(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    student_id int NOT NULL,
    book_id int NOT NULL,
    book_issue_date varchar(20),
    book_return_date varchar(20),
    datetime date NOT NULL DEFAULT CURRENT_TIMESTAMP
);

