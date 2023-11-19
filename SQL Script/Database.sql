CREATE DATABASE hotel;

\c hotel; /* Para usar base de datos hotel */

CREATE TABLE EmployeeRole(
    id SERIAL,
    name VARCHAR(25) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE UserRole(
    id SERIAL,
    name VARCHAR(25) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE Employee(
    id SERIAL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    employee_role_id bigint NOT NULL,
    shift_start_time TIME NOT NULL,
    shift_end_time TIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(employee_role_id) REFERENCES EmployeeRole(id)
);

CREATE TABLE Users(
    id SERIAL,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    employee_id bigint,
    user_role_id bigint NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(employee_id) REFERENCES Employee(id),
    FOREIGN KEY(user_role_id) REFERENCES UserRole(id)
);

CREATE TABLE Task(
    id SERIAL,
    employee_id bigint NOT NULL,
    task_description VARCHAR(255) NOT NULL,
    task_date timestamp NOT NULL,
    task_completed boolean NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(employee_id) REFERENCES Employee(id)
);

CREATE TABLE RoomType(
    id SERIAL,
    name VARCHAR(100) NOT NULL,
    price Decimal(10,2) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE Room(
    id SERIAL,
    rate DECIMAL(3, 2) NOT NULL,
    available boolean NOT NULL,
    room_type bigint NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(room_type) REFERENCES RoomType(id)
);

CREATE TABLE TransactionType(
    id SERIAL,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE Transaction(
    id SERIAL,
    employee_id bigint NOT NULL,
    transaction_type bigint NOT NULL,
    transaction_date timestamp NOT NULL,
    amount Decimal(10, 2) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(employee_id) REFERENCES Employee(id),
    FOREIGN KEY(transaction_type) REFERENCES TransactionType(id)
);

CREATE TABLE Reservation(
    id SERIAL,
    check_in_date timestamp NOT NULL,
    check_out_date timestamp NOT NULL,
    created_by_customer boolean NOT NULL,
    transaction_id bigint NOT NULL,
    employee_id bigint,
    user_id bigint NOT NULL,
    room_id bigint NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(employee_id) REFERENCES Employee(id),
    FOREIGN KEY(user_id) REFERENCES Users(id),
    FOREIGN KEY(room_id) REFERENCES Room(id),
    FOREIGN KEY(transaction_id) REFERENCES Transaction(id)
);

