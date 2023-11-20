CREATE DATABASE hotel;

/*  \c hotel; Para usar base de datos hotel */

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

/* Insercion de datos */

INSERT INTO EmployeeRole (name) VALUES
    ('Manager'),
    ('Supervisor'),
    ('Empleado');

INSERT INTO UserRole (name) VALUES
    ('Admin'),
    ('Cliente'),
    ('Empleado');

INSERT INTO RoomType (name, price) VALUES
    ('Simple', 100.00),
    ('Doble', 150.00),
    ('Suite', 200.00);

INSERT INTO TransactionType (name) VALUES
    ('Tarjeta Credito'),
    ('Tarjeta Debito'),
    ('Efectivo');

INSERT INTO Room (rate, available, room_type) VALUES
    (3.99, true, 1),
    (4.50, true, 2),
    (5.00, true, 3);

INSERT INTO Employee (first_name, last_name, employee_role_id, shift_start_time, shift_end_time) VALUES
    ('Diego', 'Maldonado', 1, '06:00:00', '15:00:00'),
    ('Karin', 'Monterroso', 2, '08:00:00', '17:00:00'),
    ('Edwin', 'Maldonado', 3, '10:00:00', '20:00:00');

INSERT INTO Users (username, email, password, employee_id, user_role_id) VALUES
    ('Dieguitox', 'dmaldonado@mail.com', 'admin123', 1, 1),
    ('Kmonte', 'kmonterroso@mail.com', 'karin123', 3, 3),
    ('SepaSan', 'jsanchez@example.com', 'sepa123', null, 2);

INSERT INTO Task (employee_id, task_description, task_date, task_completed) VALUES
    (3, 'Limpieza de habitaciones', '2023-11-25 09:00:00', false),
    (1, 'Revisar tareas de empleados', '2023-11-26 10:30:00', false),
    (3, 'Atender a capacitacion mensual', '2023-11-28 14:00:00', true);

INSERT INTO Transaction (employee_id, transaction_type, transaction_date, amount) VALUES
    (3, 1, '2023-11-20 12:30:00', 50.00),
    (3, 2, '2023-11-21 15:45:00', 75.00),
    (3, 3, '2023-11-22 18:00:00', 100.00);

INSERT INTO Reservation (check_in_date, check_out_date, created_by_customer, transaction_id, employee_id, user_id, room_id) VALUES
    ('2023-12-01', '2023-12-05', true, 1, 3, 3, 1),
    ('2024-01-21', '2024-01-28', false, 2, 3, 3, 2),
    ('2024-06-09', '2024-06-20', false, 3, 3, 3, 3);
